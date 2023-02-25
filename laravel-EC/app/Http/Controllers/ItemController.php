<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $item;
    private $user;

    public function __construct(Item $item, User $user)
    {
        $this->item = $item;
        $this->user = $user;
    }

    public function index()
    {
        $all_items = $this->item->latest()->paginate(3);

        return view('items.index')->with('all_items', $all_items);
    }

    public function show()
    {
        $all_items = $this->item->latest()->paginate(8);
        $user = $this->user->findOrFail(Auth::user()->id);
        
        return view('items.show')->with('all_items', $all_items)->with('user', $user);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name'        => 'required|max:50',
        //     'price'       => 'required',
        //     'description' => 'required|max:200',
        //     'stock'       => 'required',
        // ]);

        $this->item->uuid        = Str::uuid();
        $this->item->name        = $request->name;
        $this->item->price       = $request->price;
        $this->item->description = $request->description;
        $this->item->stock       = $request->stock;

        if($request->image1){
            $this->item->image1 = $this->saveImage1($request);
        }
        if($request->image2){
            $this->item->image2 = $this->saveImage2($request);
        }

        $this->item->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $item = $this->item->findOrFail($id);

        return view('items.edit')->with('item', $item);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|max:50',
            'price'       => 'required',
            'description' => 'required|max:200',
            'image1'      => 'mimes:jpg,jpeg,png,gif|max:3000',
            'image2'      => 'mimes:jpg,jpeg,png,gif|max:3000',
            'stock'       => 'required'
        ]);

        $item               = $this->item->findOrFail($id);
        $item->name         = $request->name;
        $item->price        = $request->price;
        $item->description  = $request->description;
        $item->stock        = $request->stock;

        if($request->image1){
            $this->deleteImage1($item->image1);
            $item->image1 = $this->saveImage1($request);
        }
        if($request->image2){
            $this->deleteImage2($item->image2);
            $item->image2 = $this->saveImage2($request);
        }

        $item->save();

        return redirect()->route('index');
    }

    private function saveImage1($request){
        $image_name1 = time() . "." . $request->image1->extension();

        $request->image1->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name1);

        return $image_name1;
    }

    private function saveImage2($request){
        $image_name2 = time() . ".." . $request->image2->extension();

        $request->image2->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name2);

        return $image_name2;
    }

    private function deleteImage1($image_name1){
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name1;

        if(Storage::disk('local')->exists($image_path)):
            Storage::disk('local')->delete($image_path);
        endif;
    }

    private function deleteImage2($image_name2){
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name2;

        if(Storage::disk('local')->exists($image_path)):
            Storage::disk('local')->delete($image_path);
        endif;
    }

    public function destroy($id)
    {
        $this->item->destroy($id);
        return redirect()->back();
    }

    public function detail($id)
    {
        $item = $this->item->findOrFail($id);
        
        return view('items.detail')
            ->with('item', $item);
    }


}
