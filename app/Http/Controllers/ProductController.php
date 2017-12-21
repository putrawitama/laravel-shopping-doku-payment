<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Fpdf;
use Auth;

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

        $user = Auth::user();
        $basket = implode(";", $basket);
        $invoice = Order::orderBy('id', 'desc')->first(); //product_id di database
        $tmerchant = $invoice['id']+1;

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'total' => number_format($total, 2, ".", ""),
            'WORDS' => sha1($total . $this->mallid . $this->skey . $tmerchant),
            'amount' => number_format($total, 2, ".", ""),
            'mallid' => $this->mallid,
            'skey' => $this->skey,
            'tmerchant' => $tmerchant,
            'basket' => $basket 
        ];

    	return view('shop.checkout', $data);
    }


    public function getCartDelete()
    {
        Session::forget('cart');
        return redirect()->route('product.shoppingCart');
    }

    public function postRedirect(Request $req)
    {
      $all = $req->all();
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $order = new Order();
      $order->cart = serialize($cart);    

      $notify = Session::get('status');
      //dd($all);
      if (isset($all['STATUSCODE'])) {
          if($all['STATUSCODE'] == "0000") {
            $order->status = 'sudah dibayar';
            Auth::user()->orders()->save($order);
            return redirect("/payment/success");
          } else {
            $order->status = 'belum dibayar';
            Auth::user()->orders()->save($order);
            return redirect("/payment/failed");
          }
      }
    }

    public function postNotify(Request $req)
    {
        $all = $req->all();
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
            // $order->user_id = $user->id;
            // $order->save();

            // Session::forget('cart');
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
        $file       = $request->file('imagePath')->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $request->file('imagePath')->move($destination, $file);
        $products->imagePath = '/uploads/'.$file;

        $products->save();

        return view('admin.page.manage-product');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.page.edit-product', ['product'=> $products]);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->title = $request->title;
        $products->price = $request->price;
        $products->description = $request->description;
        if ($request->file('imagePath') != null) {
            $file       = $request->file('imagePath')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $request->file('imagePath')->move($destination, $file);
            $products->imagePath = '/uploads/'.$file;
        }

        $products->save();

        return redirect()->route('user.admin.product.view');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('user.admin.product.view');
    }
	
	public function pdf(){
		Fpdf::AddPage();

        //set font to arial, bold, 14pt
        Fpdf::SetFont('Arial','B',14);

        //Cell(width , height , text , border , end line , [align] )

        Fpdf::Cell(130 ,5,'GEMUL APPLIANCES.CO',0,0);
        Fpdf::Cell(59 ,5,'INVOICE',0,1);//end of line

        //set font to arial, regular, 12pt
        Fpdf::SetFont('Arial','',12);

        Fpdf::Cell(130 ,5,'[Street Address]',0,0);
        Fpdf::Cell(59 ,5,'',0,1);//end of line

        Fpdf::Cell(130 ,5,'[City, Country, ZIP]',0,0);
        Fpdf::Cell(25 ,5,'Date',0,0);
        Fpdf::Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

        Fpdf::Cell(130 ,5,'Phone [+12345678]',0,0);
        Fpdf::Cell(25 ,5,'Invoice #',0,0);
        Fpdf::Cell(34 ,5,'[1234567]',0,1);//end of line

        Fpdf::Cell(130 ,5,'Fax [+12345678]',0,0);
        Fpdf::Cell(25 ,5,'Customer ID',0,0);
        Fpdf::Cell(34 ,5,'[1234567]',0,1);//end of line

        //make a dummy empty cell as a vertical spacer
        Fpdf::Cell(189 ,10,'',0,1);//end of line

        //billing address
        Fpdf::Cell(100 ,5,'Bill to',0,1);//end of line

        //add dummy cell at beginning of each line for indentation
        Fpdf::Cell(10 ,5,'',0,0);
        Fpdf::Cell(90 ,5,'[Name]',0,1);

        Fpdf::Cell(10 ,5,'',0,0);
        Fpdf::Cell(90 ,5,'[Company Name]',0,1);

        Fpdf::Cell(10 ,5,'',0,0);
        Fpdf::Cell(90 ,5,'[Address]',0,1);

        Fpdf::Cell(10 ,5,'',0,0);
        Fpdf::Cell(90 ,5,'[Phone]',0,1);

        //make a dummy empty cell as a vertical spacer
        Fpdf::Cell(189 ,10,'',0,1);//end of line

        //invoice contents
        Fpdf::SetFont('Arial','B',12);

        Fpdf::Cell(130 ,5,'Description',1,0);
        Fpdf::Cell(25 ,5,'Taxable',1,0);
        Fpdf::Cell(34 ,5,'Amount',1,1);//end of line

        Fpdf::SetFont('Arial','',12);

        //Numbers are right-aligned so we give 'R' after new line parameter

        Fpdf::Cell(130 ,5,'UltraCool Fridge',1,0);
        Fpdf::Cell(25 ,5,'-',1,0);
        Fpdf::Cell(34 ,5,'3,250',1,1,'R');//end of line

        Fpdf::Cell(130 ,5,'Supaclean Diswasher',1,0);
        Fpdf::Cell(25 ,5,'-',1,0);
        Fpdf::Cell(34 ,5,'1,200',1,1,'R');//end of line

        Fpdf::Cell(130 ,5,'Something Else',1,0);
        Fpdf::Cell(25 ,5,'-',1,0);
        Fpdf::Cell(34 ,5,'1,000',1,1,'R');//end of line

        //summary
        Fpdf::Cell(130 ,5,'',0,0);
        Fpdf::Cell(25 ,5,'Subtotal',0,0);
        Fpdf::Cell(4 ,5,'$',1,0);
        Fpdf::Cell(30 ,5,'4,450',1,1,'R');//end of line

        Fpdf::Cell(130 ,5,'',0,0);
        Fpdf::Cell(25 ,5,'Taxable',0,0);
        Fpdf::Cell(4 ,5,'$',1,0);
        Fpdf::Cell(30 ,5,'0',1,1,'R');//end of line

        Fpdf::Cell(130 ,5,'',0,0);
        Fpdf::Cell(25 ,5,'Tax Rate',0,0);
        Fpdf::Cell(4 ,5,'$',1,0);
        Fpdf::Cell(30 ,5,'10%',1,1,'R');//end of line

        Fpdf::Cell(130 ,5,'',0,0);
        Fpdf::Cell(25 ,5,'Total Due',0,0);
        Fpdf::Cell(4 ,5,'$',1,0);
        Fpdf::Cell(30 ,5,'4,450',1,1,'R');//end of line

		Fpdf::Output();
		exit;
	}
}
