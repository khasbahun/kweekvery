<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Session;
use Cart;
use Auth;
use Mail;
use DB;
use Redirect;
use Request as HR;
class PagesController extends Controller
{
    public function home() 
    {
        
    	$msg=  DB::table('msg')->select('message')->where('id', 1)->get(); 
    	foreach($msg as $object)
        {
            $x[] =  (array) $object;
        }
    	$message = $x[0]['message'] ;
    	
    	return view('pages.home',compact('message'));
	}
	public function search() 
    {
        $q = "";
    	return view('pages.search',compact('q'));
    }
    public function searchquery(Request $request)
    {
        
        
        $q = "";
        $q = $request->q;
        $result = Product::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        
        
            return view('pages.search',compact('result','q'));
        
    }
	public function about() 
    {
    	return view('pages.about');
    }
	public function contact() 
    {
    	
    	return view('pages.contact');
    }
    public function feedback() 
    {
        	
        return view('pages.reviews');
    }


    public function proceed() 
    {
		
    	return view('pages.buy');
	}
	public function offers() 
    {
		$products = Product::where('discount', '!=', 0)->get();
    	
    	return view('pages.offers')->withProducts($products);
		
    	
    }
    public function topsellers() 
    {
		$products = Product::where('is_top', '!=', 0)->get();
    	
    	return view('pages.bestseller')->withProducts($products);
		
    	
    }

    public function checkout($id) 
    {
		$product = Product::find($id);
		//$cart = new Cart;
		
		
    	return view('pages.checkout')->withProduct($product);
	}
	public function mycart() 
    {
		Cart::setGlobalTax(0);
		return view('pages.mycart');
	}
	
	public function addtocart(Request $request, $id) 
    {
        //return gettype($request->qty); 
		$product = Product::find($id);
		
		//Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99]);
		if($product->discount == 0)
		{
			Cart::add($product->id,  $product->name, $request->qty, $product->price, 0 ,['priceper' => $product->price_per ]);
		}
		else
		{
			Cart::add($product->id,  $product->name, $request->qty, $product->discount, 0 ,['priceper' => $product->price_per ]);
		}
		
		return redirect()->route('mycart');
		
	}
	public function removefromcart($id)
	{
		Cart::remove($id);
		return redirect()->route('mycart');
	}
	
	public function vieworder($token)
    {
		Session::flash('success', 'Order Placed Successfully');
		//$posts = post::where('status',1)->get();
		$orders = Order::where('token',$token)->get();
    	return view('pages.order',compact('orders'));
	}
    public function placeorder(Request $request)
    {
		
		$this->validate($request, [
    		'name' => 'required|max:255',
    		
    		'address' => 'required|max:191',
    		'phone' => 'required|digits:10'
    	]);
    	
            $ip = $request->ip();  


    	$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPMNBVCZXALSKDJGF1234098675!$*';
		$token = str_shuffle($token);
		$token = substr($token, 0, 10);

		foreach (Cart::content() as $row){ 
			
			$order = new Order();
			$order->product_name = $row->name;
			$order->user_name = $request->name;
			
			if(Auth::user() != null){
				$order->user_id = Auth::user()->id;
			}
			else
			{
			    $order->user_id = 0;
			}
			
			$order->email = $request->email;
			$order->address = $request->address;
			$order->number = $request->phone;
			$order->qty = $row->qty;
			$order->amount = $row->subtotal;
			$order->token = $token;
			$order->ip = $ip;
			
			$order->save();
			
			
		}
		if($request->email != null)
		{
		    $total = 0;
			$orders = Order::where('token',$token)->get();
			foreach ($orders as $row)
			{
			        $total = $total + $row->amount;
			}
			PagesController::send_email($order->user_name,$orders,$request->email,$total, $token,$order->address);
		}
		
		Cart::destroy();
		return redirect()->route('vieworder',$token);
    	

		

    }

    public function singleCategory($id) 
    {
        $p = Product::where('category_id', $id)->get();
        $category = Category::find($id);
        $name = $category->name;
        if(HR::get('sortby')=='instock')
        {
            $p = Product::where('category_id', $id)->where('in_stock',1)->get();
       
                return view('pages.singleCategory',compact('p','name'));
        }
        if(HR::get('sortby')=='discount')
        {
            $p = Product::where('category_id', $id)->where('discount','!=' , 0)->get();
       
                return view('pages.singleCategory',compact('p','name'));
        }
        if(HR::get('sortby')=='cheapest')
        {
            $p = Product::where('category_id', $id)->orderBy('price','asc')->get();
       
                return view('pages.singleCategory',compact('p','name'));
        }
        if(HR::get('sortby')=='expensive')
        {
            $p = Product::where('category_id', $id)->orderBy('price','desc')->get();
       
                return view('pages.singleCategory',compact('p','name'));
        }
        
        return view('pages.singleCategory',compact('p','name'));
	}
	
	public function send_email($customer_name,$orders,$to,$total, $order_id,$address) 
	{
	    $sendto = $to;	
		$data = [
			'name'=> $customer_name,
			'orders'=> $orders,
			'total' => $total,
			'order_id' => $order_id,
			'address' => $address
			
		];
	 
		//Mail::send('mail', $data, function($message) use ($sendto) {
		  // $message->to($sendto)->subject
			 // ('Order Invoice- Kweekvery ');
		   //$message->from('orders@kweekvery.com','Kweekvery Team');
		//});
		 
	 }

}
