<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;
use App\Models\Paymethod;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    private $cart;
    private $user;
    private $paymethod;

    public function __construct(Cart $cart, User $user, Paymethod $paymethod)
    {
        $this->cart = $cart;
        $this->user = $user;
        $this->paymethod  = $paymethod;
    }

    public function index()
    {
        $carts = $this->cart->all();
        $user = $this->user->findOrFail(Auth::user()->id);
       
        return view('users.carts.index')->with('carts', $carts)->with('user', $user);
    }

    public function store($item_id, Request $request)
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        $this->cart->user_id  = Auth::User()->id;
        $this->cart->item_id  = $item_id;
        $this->cart->quantity = $request->quantity;
        
        $this->cart->save();

        return redirect()->route('cart.index', $user->id);
        
    }

    public function store_direct($item_id, Request $request)
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        $this->cart->user_id  = Auth::User()->id;
        $this->cart->item_id  = $item_id;
        $this->cart->quantity = $request->quantity;
        
        $this->cart->save();

        return redirect()->route('cart.show', $user->id);
        
    }

    public function destroy($id)
    {
        $this->cart->destroy($id);
        return redirect()->back();
    }

    public function show(Request $request)
    {
        $carts = Cart::findMany($request->id);
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.carts.checkout')->with('carts',$carts)->with('user',$user);
    }

    public function show_pay(Request $request)
    {
        $carts = Cart::findMany($request->id);
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.carts.paymethod')->with('carts',$carts)->with('user',$user);
    }

    public function buyCartItems(Request $request){

        $this->paymethod->user_id  = Auth::User()->id;
        $this->paymethod->credit_number    = $request->credit_number;
        $this->paymethod->expiration_month = $request->expiration_month;
        $this->paymethod->expiration_year  = $request->expiration_year;
        $this->paymethod->password         = Hash::make($request->password);
        $this->paymethod->save();

        $ids            = $request->id;
        $quantity       = $request->quantity;
        $transaction_id = Str::uuid();

        foreach($ids as $key => $val):
           $cart = $this->cart->findOrFail($val);
           $cart->status = "paid";
           $cart->quantity = $quantity[$key];
           $cart->transaction_id = $transaction_id;

           $cart->save();
        endforeach;

       $recent_order = Cart::findMany($ids);

       foreach($recent_order as $order):
          $item =  Item::findOrFail($order->item_id);
          $item->stock = $item->stock - $order->quantity;

          $item->save();
       endforeach;

        $total = 0;

        return view('users.carts.receipt')
                    ->with('paid_items',$recent_order)
                    ->with('total',$total);
    }
}
