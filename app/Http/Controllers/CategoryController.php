<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Session;

class CategoryController extends Controller
{

    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user == null)
        {
            return redirect()->route('home');
        }
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $categories = Category::all();
        return view('category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('category.create');
    }

    public function show()
    {
        
        $offer =  Product::where('discount', '!=', 0)->get()->count();
        $categories = Category::all();
        return view('category.show',compact('categories','offer'));
        
    }

    public function view($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $category->id)->first();
        return view('category.view')->withCategory($category)->withProducts($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255|min:3'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'New Category Added');

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $this->middleware('auth');
        $category = Category::find($id);
        return view('category.edit')->withCategory($category);
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
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255|min:3'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();

        Session::flash('success', 'Category Updated');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        if($user->is_admin == 0)
        {
            return redirect()->route('home');
        }
        $this->middleware('auth');
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('category.index');
    }
}
