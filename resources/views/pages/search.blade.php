@extends('layouts.app')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="css/new.css">
	<style>
    form {
  outline: 0;
  float: left;
  
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

form > .textbox {
  outline: 0;
  height: 42px;
  width: 85%;
  line-height: 42px;
  padding: 0 16px;
  background-color: rgba(255, 255, 255, 0.8);
  color: #212121;
  border: 0;
  float: left;
  -webkit-border-radius: 4px 0 0 4px;
  border-radius: 4px 0 0 4px;
}

form > .textbox:focus {
  outline: 0;
  background-color: #FFF;
}

form > .button {
  outline: 0;
  background: none;
  background-color: rgba(38, 50, 56, 0.8);
  float: left;
  height: 42px;
  width: 15%;
  text-align: center;
  line-height: 42px;
  border: 0;
  color: #FFF;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: 16px;
  text-rendering: auto;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  -webkit-transition: background-color .4s ease;
  transition: background-color .4s ease;
  -webkit-border-radius: 0 4px 4px 0;
  border-radius: 0 4px 4px 0;
}

form > .button:hover {
  background-color: rgba(0, 150, 136, 0.8);
}
    .space { clear: both; height: 25px; }
	</style>

@endsection

@section('content')
<div class="space">&nbsp;</div>
<div class="container">
<div class="row">
    <div class="col-md-6 mx-auto">
		<form action="/search"  method="post" style="width:100%;" >
		    {{ csrf_field() }}
          <input type="text" class="textbox" name="q" placeholder="e.g: Tamatar / Tomato / Saag / साग" value="{{$q}}" autocomplete="off">
          <input title="Search" value="" type="submit" class="button">
        </form>
    </div>
</div>
  <hr/>
			<div class="row">
			@if(empty($q))
			
			@else
			@if(!$result->isEmpty())
			@foreach($result as $product)
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
			@else
			        <div class="col mb-4  mx-auto">
						 <h3>No match found.</h3>
				     </div>
			@endif
			@endif
		</div>	


 </div>  
@endsection