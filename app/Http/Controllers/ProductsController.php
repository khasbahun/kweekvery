<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Session;
use App\Models\User;
use DB;
use Image;

class ProductsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->withProducts($user->products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('products.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'per' => 'required'
        ]);
        $product = new Product();

        if($request->hasFile('product-image'))
        {
           $file_with_extension = $request->file('product-image')->getClientOriginalName();
            $filename = pathinfo($file_with_extension, PATHINFO_FILENAME);
            $image = $request->file('product-image');
            $input['imagename'] = $filename.'.'.$image->extension();
            $destinationPath = '/home/oshbmjql/public_html/kweekvery.com/public/img' ;
            $img = Image::make($image->path());
             $img->resize(500,300)->save($destinationPath.'/'.$input['imagename']);
            $name =  $input['imagename'];
            $product->image = $name;
        }
        
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->price_per = $request->per;
      
        $product->category_id = $request->category_id;
        $product->user_id = auth()->user()->id;
        $product->save();

        Session::flash('success', 'Product added successfully.');

        return redirect()->route('allproducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        

        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

       

        $categories = Category::all();
        return view('products.edit')->withProduct($product)->withCategories($categories);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|integer'
        ]);
        $product = Product::find($id);
        
       
        
        if($request->hasFile('product-image'))
        {
            $file_with_extension = $request->file('product-image')->getClientOriginalName();
            $filename = pathinfo($file_with_extension, PATHINFO_FILENAME);
            $image = $request->file('product-image');
            $input['imagename'] = $filename.'.'.$image->extension();
            $destinationPath = '/home/oshbmjql/public_html/kweekvery.com/public/img' ;
            $img = Image::make($image->path());
            $img->resize(500,300)->save($destinationPath.'/'.$input['imagename']);
            $name =  $input['imagename'];
            $product->image = $name;
        }
        

      
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->price_per = $request->per;
        $product->category_id = $request->category_id;
        $product->update();

        Session::flash('success', 'Product updated successfully.');

        return redirect()->route('allproducts');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('dashboard');
    }

    
}
