@extends('layouts.app')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="css/new.css">

@endsection

@section('content')
	
<div class="container">
    @if($products->count() == 0)
    
    <div class="row">
    			<div class="col-md-3">
    				<a href="/" class="btn btn-primary btn-block">Back to Home</a>
    			</div>
    			<div class="col-md-1">&nbsp;</div>
    			<div class="col-md-6">
    			    <h3 class="text-center mb-5">Sorry!! No offers available right now.</h3>
    			</div>
    				
		</div>
    
    @else
    
	 <div class="row">
    			<div class="col-md-3">
    				<a href="/" class="btn btn-primary btn-block">Back to Home</a>
    			</div>
    			<div class="col-md-3">&nbsp;</div>
    			<div class="col-md-3">
    			    <h1 class="text-center mb-5">All Offers</h1>
    			</div>
    				
		</div>
	</div>
		<div class="container">
		   
			<div class="row">
			@foreach($products as $product)
					<div class="col-md-4 mb-4">
						<div class="card" style="width: 18rem;background-color:#cfe7e3;">
							<img src="/public/img/{{$product->image}}" class="card-img-top w-100" height="200px" alt="...">
						
							<div class="card-body">
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
		@endif
	</div>

@endsection