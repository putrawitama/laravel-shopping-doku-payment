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
    public $mallid;
    public $sKey;

    function __construct()
    {
        $this->mallid = "10956732";
        $this->skey = "L7G4u6g8K2F9";
    }

    public function getIndex(Request  $req)
    {
        if ($req->keyword == null) {
            $products = Product::all();
        } else {
            $products = Product::where('title', 'like', '%'.$req->keyword.'%')
                                ->orWhere('description', 'like', '%'.$req->keyword.'%')
                                ->get();
        }
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

       // dd($cart);

        $basket = array_map(function($item) {

            return $item['item']->title . "," . $item['item']->price . ",".$item['qty']."," . ($item['price']);
        }, $cart->items);

        $basket = implode(";", $basket);
        $tmerchant = "INVBUSET"; //product_id di database
        $total = number_format($total, 2, ".", "");

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


    public function getCartDelete()
    {
        Session::forget('cart');
        return redirect()->route('product.shoppingCart');
    }

    public function postRedirect(Request $req)
    {
      $all = $req->all();

      $notify = Session::get('status');
      //dd($all);

      if($all['STATUSCODE'] == "0000") {
        return redirect("/payment/success");
      } else {
        return redirect("/checkout");
      }
    }

    public function postNotify(Request $req)
    {
        $all = $req->all();

        $tmerchant = "INV012017";
        $total = number_format($all['AMOUNT'], 2, ".", "");

        $WORDS_GENERATED = sha1($all['AMOUNT'] . "10956732" .  "L7G4u6g8K2F9" . $all['TRANSIDMERCHANT'] . $all['RESULTMSG'] . $all['VERIFYSTATUS']);


        if ( $all['WORDS'] == $WORDS_GENERATED )
        {
            echo "CONTINUE";
            if ($all['RESULTMSG'] == 'SUCCESS'){
                    //$req->session()->put('status', 'Payment Success');
            } else{
                   // $req->session()->put('status', 'Payment Failed');
                }
        }
        else
        {
            echo "STOP - WORDS NOT MATCH";
        }
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

    public function pay()
    {
        return view('payment.successpayment');
    }
}
