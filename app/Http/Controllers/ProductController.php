<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{
    public $mallid;
    public $sKey;

    function __construct()
    {
        $this->mallid = "10956732";
        $this->skey = "L7G4u6g8K2F9";
    }

    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
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

       // dd($cart);

        $basket = array_map(function($item) {

            return $item['item']->title . "," . $item['item']->price . ",".$item['qty']."," . ($item['price']);
        }, $cart->items);

        $basket = implode(";", $basket);
        $tmerchant = "1"; //product_id di database

    	return view('shop.checkout', [
            'total' => $total,
            'WORDS' => sha1($total . $this->mallid . $this->skey . $tmerchant),
            'amount' => $total,
            'mallid' => $this->mallid,
            'skey' => $this->skey,
            'tmerchant' => $tmerchant,
            'basket' => $basket
        ]);
    }

    public function postRedirect(Request $req)
    {
      $all = $req->all();

      $notify = Session::get('status');
      dd($notify);
    }

    public function postNotify(Request $req)
    {
      $all = $req->all();
      if (!Session::has('cart')) {
            return redirect()->route('product.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $tmerchant = 1;

      $WORDS_GENERATED = sha1($total . $this->mallid . $this->skey . $tmerchant);
      if ( $all->WORDS == $WORDS_GENERATED )
        {
            echo "CONTINUE";
            if ($all->RESULTMSG == 'SUCCESS')
                {
                    $req->session()->put('status', 'Payment Success');
                }
            else
                {
                    $req->session()->put('status', 'Payment Failed');
                }
        }
        else
        {
            // echo "STOP - WORDS NOT MATCH";
            $req->session()->put('status', 'masuk gagal');
        }
    }
}
