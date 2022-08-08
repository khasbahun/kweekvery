@extends('layouts.app')

@section('title', '| Category Product')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')
<div class="container">
        <div class="row">
    			
    		
    			<div class="col-md-5">
    			    <h1 class="text-center "> {{$name}} </h1>
    			</div>
    			<div class="col-md-3">
    			    <div class="dropdown">
    		    <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Category
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li ><a href="/category/1/vegetables">Vegetables</a></li>
                                   <li ><a href="/category/3/fruits">Fruits</a></li>
                                   <li ><a href="/category/2/dairy">Dairy</a></li>
                                   <li ><a href="/category/5/meat">Meat</a></li>
                                   <li ><a href="/category/13/grocery">Grocery</a></li>
                                    <li ><a href="/category/11/indoors-plants-and-flowers">Indoor Plants</a></li>
                                     <li ><a href="/category/14/bakery">Bakery</a></li>
                                 
                                 
                  </div>              </ul>
    		</div>
    		<div class="col-md-1">&nbsp;</div>
                <div class="col-md-3">
    			<button class="btn btn-dark btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Sort by
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                   <li {{ Request()->sortby == 'Available' ? ' selected' : '' }}><a href="/{{ Request()->path()}}?sortby=instock">Available</a></li>
                                    <li {{ Request()->sortby == 'Discount' ? ' selected' : '' }}><a href="/{{ Request()->path()}}?sortby=discount">Discount</a></li>
                                  <li {{ Request()->sortby == 'Cheapest' ? ' selected' : '' }}><a href="/{{ Request()->path()}}?sortby=cheapest">Cheapest</a></li>
                                  <li {{ Request()->sortby == 'Expensive' ? ' selected' : '' }}><a href="/{{ Request()->path()}}?sortby=expensive">Expensive</a></li>
                                 
                                </ul>
    			</div>
    				
		</div>
	</div>
	<hr/>
	<div class="container">
			<div class="row">
			@foreach($p as $product)
			<div class="col-md-4 mb-4">
						<div class="card" style="width: 18rem;">
							<img src="/public/img/{{$product->image}}" class="card-img-top w-100" height="200px" alt="...">
							
							
							<div class="card-body" style="width: 18rem;background-color:#cfe7e3;">
							<div class="row">
						    	    <div class="col-md-6 col-xs-6"><h5 class="card-title">{{ $product->name }}</h5></div>
						    	    <div class="col-md-6 col-xs-6"><p class="text-right"><strong>@if($product->in_stock == 1)<span style="color:green">In Stock</span>  @else<span style="color:red">Out of Stock</span>   @endif</p></strong></div>
						    </div>
						    	<div class="row">
						    		<div class="col-md-6">
						    			<h5 >
						    			@if($product->discount == 0)₹{{ $product->price }}@else <span style='color:red;text-decoration:line-through' >₹ {{ $product->price }}</span><span style="padding:4px;" > ₹{{ $product->discount}}</span> 
						    			    <p class="text-left">
    							                <span style="color:red;font-size:12px;"> <?php echo round(100 -($product->discount * 100)/ $product->price) ?>% OFF</span>
    							            </p>
						    			@endif</h5><h6>Per {{ $product->price_per }} </h6>
						    		</div>
						    		<div class="col-md-6">
									@if($product->in_stock == 1)
										<a href="/buy/{{ $product->id }}/checkout" disable="false" class="btn btn-primary btn-block">Buy Now</a> 
									@else 
								
										<button class="btn btn-primary btn-block" disabled>Buy Now</button>
									@endif
						    		</div>
						    	</div>
						  	</div>
						</div>
					</div>
			@endforeach
		</div>	

	</div>

@endsection