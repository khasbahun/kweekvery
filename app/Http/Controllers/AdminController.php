<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Discount;
use Session;
use Auth;
use DB;
use Cart;

class AdminController extends Controller
{

    public function __construct() {

         //$this->middleware('auth');
        
         $this->middleware('auth');
         
         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        //$user_id = auth()->user()->id;
        //$user = Admin::find($user_id);
        $orders = Order::where('status' ,'=', 'delivered')->get('amount');
        
        $total_orders = Order::where('status' ,'=', 'delivered')->distinct('token')->count();
        $working = Order::where('status' ,'=', 'working')->get()->count();
        $delivered_today = Order::whereDay('created_at', now()->day)->where('status' ,'=', 'delivered')->distinct('token')->count();
        
        $ordered_today = Order::select('token','status','created_at')->whereDay('created_at', now()->day)->where('status' ,'=', 'working')->distinct('token')->count();
        $users = User::where('is_admin','==','0')->get()->count();
        $total_amount = 0;
        if($orders != null)
        {
            foreach ($orders as $order){ 
                $total_amount = $order->amount + $total_amount;
            }
        }
       $msg=  DB::table('msg')->select('message')->where('id', 1)->get(); 
    	foreach($msg as $object)
        {
            $x[] =  (array) $object;
        }
    	$message = $x[0]['message'] ;
       
        $labels = DB::table('orders')->select(DB::raw('product_name'), DB::raw('count(*) as count'))
                ->groupBy('product_name')
                ->orderBy('count', 'desc')
                ->take(5)
                ->get();
        $z;
        $i =0;
        foreach($labels as $object)
        {
            
            $z[] =  (array) $object;
            $l[] =  $z[$i]['product_name'];
            $c[] = $z[$i]['count'];
            $i++;
        }      
        $label = json_encode($l);
        $data = json_encode($c);
        
        
        
        return view('admin.home',compact('total_amount','users','total_orders','delivered_today','ordered_today','working','message','label','data'));
    }
    public function msg(Request $request)
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        
        DB::table('msg')->where('id', 1)->update(array('message' =>  $request->name)); 
        Session::flash('success', 'Message Updated');
        return redirect()->route('dashboard');
    }
    public function products()
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        //$user_id = auth()->user()->id;
        //$user = Admin::find($user_id);
        $products = Product::all();
        return view('admin.products',compact('products'));
    }
    public function discount()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        //$user_id = auth()->user()->id;
        //$user = Admin::find($user_id);
        //$discounts = Discount::all();

       
        $products = Product::all();
      
        
        
        return view('admin.offer',compact('products'));
    }
    public function users()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }

       
        $users = User::where('is_admin','0')->get();
      
        
        
        return view('admin.users',compact('users'));
    }
    public function offer(Request $request, $id)
    {   
        //return $request->all();
        $in_stock = 0;
        $discount = $request->offer; 
        if($request->in_stock != null)
        {
            $in_stock = $request->in_stock;
        }
        
        //return $in_stock;
        Product::where('id',$request->pid)->update(['discount'=> $discount,'in_stock' => $in_stock]);
        Session::flash('success', 'Discount price added');
        
        return redirect()->route('allproducts');
    }
    public function orders()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
       $orders = Order::where('status','working')->get();
       
       foreach ($orders as $order){ 
                  $order->price_per = Product::select('price_per')->where('name' ,$order->product_name)->get();
                  
             }
        return view('admin.orderlist',compact('orders'));
    }
    public function productlist()
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        
      
       
      
        return view('admin.listdownload');
    }
    public function categorylist($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        
       $items = Product::select('name','price','price_per','category_id','in_stock')->where(['in_stock'=>'1' ,'category_id'=>$id])->get();
       
      
        return view('admin.categorydownload',compact('items'));
    }
    
    public function uniqueorders()
    {
        
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
       $orders = Order::select('status','token','user_name','address','number','created_at')->where('status','working')->distinct('token')->get();
        
        
        foreach ($orders as $order){ 
                $total = DB::table("orders")->where('token',$order->token)->get()->sum('amount');
                $count =  Order::where('token' ,$order->token)->count();
                $order->amount = $total;
                $order->qty = $count;
               
            }
      
        
        return view('admin.uniqueorders',compact('orders'));
    }
    public function filterorders($status)
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        if($status != 'working' ||$status != 'delivered' || $status != 'cancelled')
        {
          $total = 0.00;
          
          $orders = Order::where('token',$status)->get();
          foreach ($orders as $order){ 
                 $x = Product::select('price_per')->where('name' ,$order->product_name)->first();
                 
                 $order->price_per = $x['price_per'];
                 $total = DB::table("orders")->where('token',$order->token)->get()->sum('amount');
             }
           return view('admin.orderlist',compact('orders','total'));
        }
        $orders = Order::where('status',$status)->get();
        return view('admin.orderlist',compact('orders'));
    }
    public function orderdelete($id)
    {
        $len = strlen($id);
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        if($len<8)
        {
            Order::where('id', $id)->delete();
        }
        else
        {
            
            Order::where('token', $id)->delete();   
        }
         
        $orders = Order::where('status','working')->get();
        Session::flash('success', 'Order  Deleted Permanently');
        return redirect()->route('orders');
    }

    public function delivered($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        
        $len = strlen($id);
        if($len<8)
        {
            
            Order::where('id',$id)->update(['status'=>'delivered']);
        }
        //All
        else
        {
             
            //$token = trim($id,"order");
            //return $token;
            Order::where('token',$id)->update(['status'=>'delivered']);
           
        }
         
       
        
        
        Session::flash('success', 'Order  status set to delivered');
        return redirect()->route('orders');
    }
    public function deliveredlist()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        $orders = Order::select('status','token','user_name','address','number','created_at')->where('status','delivered')->distinct('token')->get();
        
        
        foreach ($orders as $order){ 
                $total = DB::table("orders")->where('token',$order->token)->get()->sum('amount');
                $count =  Order::where('token' ,$order->token)->count();
                $order->amount = $total;
                $order->qty = $count;
            }
      
        
        return view('admin.uniqueorders',compact('orders'));
    
    }
    public function cancelledlist()
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
        $orders = Order::select('status','token','user_name','address','number','created_at')->where('status','cancelled')->distinct('token')->get();
        
        
        foreach ($orders as $order){ 
                $total = DB::table("orders")->where('token',$order->token)->get()->sum('amount');
                $count =  Order::where('token' ,$order->token)->count();
                $order->amount = $total;
                $order->qty = $count;
            }
      
        
        return view('admin.uniqueorders',compact('orders'));
    
    }
    public function cancel($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0 || $user->is_admin == 2)
        {
            return redirect()->route('home');
        }
         $len = strlen($id);
         
        if($len<8)
        {
            //$orders = Order::all();
           Order::where('id',$id)->update(['status'=>'cancelled']);
        }
        else
        {
             
            //$token = trim($id,"order");
            //return $token;
            Order::where('token',$id)->update(['status'=>'cancelled']);
           
        }
         
        
        Session::flash('success', 'Order status set to cancelled ');
        return redirect()->route('orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
