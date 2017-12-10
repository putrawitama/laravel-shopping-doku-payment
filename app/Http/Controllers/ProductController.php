<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{
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

        // WORDS = sha1 (AMOUNT + MALLID + Shared Key + TRANSIDMERCHANT) 

        /**
        <form action="http://staging.doku.com/Suite/Receive" method="post" id="form1" name="form1">
            <input name="MALLID" type="hidden" value="2045" >
            <input name="BASKET" type="hidden" value="testing item,10000.00,1,10000.00" >
            <input name="CHAINMERCHANT" type="hidden" value="NA" >
            <input name="AMOUNT" type="hidden" value="10000.00" >
            <input name="PURCHASEAMOUNT" type="hidden" value="10000.00" >
            <input name="TRANSIDMERCHANT" type="hidden" value="SaZyxLAvBJT9" >
            <input name="WORDS" type="hidden" value="bf60356e2e41eff0d561c88e8b4386dc496b48ff" >
            <input name="CURRENCY" type="hidden" value="360" >
            <input name="PURCHASECURRENCY" type="hidden" value="360" >
            <input name="COUNTRY" type="hidden" value="ID" >
            <input name="SESSIONID" type="hidden" value="234asdf234" >
            <input name="REQUESTDATETIME" type="hidden" value="20151212000000" >
            <input name="NAME" type="hidden" value="Customer Name" >
            <input name="EMAIL" type="hidden" value="customer@domain.com">
             <input name="PAYMENTCHANNEL" type="hidden" value="15" >
        </form>
        **/

     //    $amount = "50000"; // 5rb
        $mallid = "10956732";
        $skey = "L7G4u6g8K2F9";
        $tmerchant = "1"; //product_id di database

    	return view('shop.checkout', [
            'total' => $total,
            'WORDS' => sha1($total . $mallid . $skey . $tmerchant),
            'amount' => $total,
            'mallid' => $mallid,
            'skey' => $skey,
            'tmerchant' => $tmerchant,
            'basket' => $basket
        ]);
    }

    public function postCheckout(Request $req)
    {
      $all = $req->all();

      dd($all);

      if ( $WORDS == $WORDS_GENERATED )
        {
            echo "CONTINUE";
            if ($RESULTMSG == 'SUCCESS')
                {
                //Flag the transaction to success.
                }
            else
                {
                //Flag the transaction to failed
                }
        }
        else
        {
            echo "STOP - WORDS NOT MATCH";
        }
    }
}
