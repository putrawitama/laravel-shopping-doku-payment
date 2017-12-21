<?php

namespace App\Http\Controllers;

use App\Product;
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
}
