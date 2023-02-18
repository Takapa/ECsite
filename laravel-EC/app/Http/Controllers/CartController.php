<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cart;
    private $user;
    private $item;

    public function __construct(Cart $cart, User $user, Item $item)
    {
        $this->cart = $cart;
        $this->user = $user;
    }

    public function index()
    {
        $carts = $this->cart->all();
        $user = $this->user->findOrFail(Auth::user()->id);
        $tatal = 0;
       
        return view('users.carts.index')->with('carts', $carts)->with('user', $user)->with('tatal', $tatal);
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


}
