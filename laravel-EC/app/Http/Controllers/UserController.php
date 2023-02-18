<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_users = $this->user->latest()->paginate(5);

        return view('users.index')->with('all_users', $all_users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'       => 'required|max:255|unique:users,email,',
            'password'    => 'required|min:8',
            'contact'     => 'max:255',
            'name'        => 'required|max:50',
            'location'    => 'max:255',
            'age'         => 'max:255',
        ]);


        $this->user->email       = $request->email;
        $this->user->password    = Hash::make($request->password);
        $this->user->contact     = $request->contact;
        $this->user->name        = $request->name;
        $this->user->location    = $request->location;
        $this->user->age         = $request->age;
        $this->user->save();

        return redirect()->back();
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email'       => 'required|max:255|',
            'contact'     => 'max:255',
            'name'        => 'required|max:50',
            'location'    => 'max:255',
            'age'         => 'max:255',
        ]);

        $user              = $this->user->findOrFail($id);
        $user->email       = $request->email;
        $user->contact     = $request->contact;
        $user->name        = $request->name;
        $user->location    = $request->location;
        $user->age         = $request->age;
        $user->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->user->destroy($id);
        return redirect()->back();
    }
}
