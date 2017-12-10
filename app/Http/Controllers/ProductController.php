<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Fpdf;

class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getProduct()
    {
        $products = Product::all();
        // dd($products);
        return view('admin.page.product-list', ['products' => $products]);
    }

    public function getAddToCart(Request $req, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$req->session()->put('cart', $cart);
    	return redirect()->route('product.index');

    }

    public function getCart()
    {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout', ['total' => $total]);
    }

    public function create()
    {
        return view('admin.page.manage-product');
    }

    public function store(Request $request)
    {
        $products = new Product;
        $products->title = $request->title;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->imagePath = $request->imagePath;
        $file       = $request->file('imagePath');
        $request->file("/public/uploads", $file->getClientOriginalName());
        $products->save();

        return view('admin.page.manage-product');
    }
	
	public function pdf(){
		Fpdf::AddPage();
		Fpdf::SetFont('Courier', 'B', 18);
		Fpdf::Cell(50, 25, 'Hello World!');
		Fpdf::Output();
		exit;
	}
}
