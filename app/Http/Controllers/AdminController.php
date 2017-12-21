<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function getAdmin()
    {
    	return view('admin.page.index');
    }
    
    public function home()
    {
        $products = Product::all();
        return view('admin.page.home', ['products' => $products]);
    }

    public function getOrders()
    {
        // $orders = Order::all();
        // return view('admin.page.home', ['products' => $products]);

        return view('admin.page.orders');
    }

    public function getUsers()
    {
		$users = User::all();
        return view('admin.page.users', ['users'=>$users]);
	}
	
	public function editUsers($id)
    {
		$user = User::find($id);
        return view('admin.page.edit-user', ['user'=> $user]);
    }

    public function updateUsers(Request $request, $id)
    {
		$user = User::find($id);
		$user->fullname = $request->fullname;
		$user->address = $request->address;
		$user->city = $request->city;
		$user->state = $request->state;
		$user->country = $request->country;
		$user->zipcode = $request->zipcode;
		$user->phone = $request->phone;
		$user->birthdate = $request->birthdate;

        $user->save();

        return redirect()->route('user.admin.users');
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.admin.users');
    }
}
