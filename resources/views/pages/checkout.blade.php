@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="/" class="btn btn-primary btn-block">Back to Home</a>
			</div>
		</div>
		<hr/>
	    <div class="col-xs-12  col-md-12 ">
			<div class="card" style="background-color:#cfe7e3;">
				<div class="card-header">
					Product Details
					@if($product->discount != 0)<span style="color:green;float:right;">Discount Price Added</span> @endif
				</div>
				<div class="card-body">
				<form role="form" action="{{ route('addtocart',$product->id) }}" method="post">
  					{{csrf_field()}}
					<div class="row">
						<div class="col-md-4">
							<img src="/public/img/{{ $product->image }}" class="w-100" height="280px" style="border-radius: 10px;">
							
							<hr/>
								<div class="row">
									<div class="col-md-12">
									
										<div class="input-group mb-3">
											<div class="input-group-prepend">
										    	<button class="btn btn-outline-secondary" type="button" id="button-addon2">
										    		<i class="fa fa-minus"></i>
										    	</button>
										  	</div>
										  	<input type="text" name="qty" id="qty" class="form-control" value="1" style="text-align: center;" >
										  	<div class="input-group-append">
										    	<button class="btn btn-outline-secondary" type="button" id="button-addon1">
										    		<i class="fa fa-plus"></i>
										    	</button>
										  	</div>	
											  <div class="input-group-append" style="font-weight: bold;margin-top: 5px;margin-left: 5px;">
										    	<em><label>{{ $product->price_per }}</label></em>
										  	</div>	
										</div>
										
									</div>
									
									<div class="col-md-12">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
										    	<span class="input-group-text">₹</span>
										  	</div>
										  	<input type="text" class="form-control" name="amount" id="amount" disabled="true" value="@if($product->discount == 0){{ $product->price }}@else{{ $product->discount }} @endif">
										  	<div class="input-group-append">
										    	<span class="btn btn-warning">.00</span>
										  	</div>
										</div>
									</div>
								</div>
							
						</div>
						<div class="col-md-6">
						<h2 class="card-title">{{ $product->name }} 	@if($product->discount != 0)<span style="color:red;font-size:15px;"> <?php echo round(100 -($product->discount * 100)/ $product->price) ?>% OFF</span>@endif</h2>
							<p>{{ $product->description }}</p>
							<p>Category: {{ $product->category->name }}</p>
							
							<div class="input-group mb-3 ">
											
											{{ Form::submit('Add to Bag', ['class' => 'btn btn-success btn-block']) }}
											 
							</div>
							
							@if( $product->price_per != 'KG')
							<hr/>
							<div class="card-header border-0"><span class="input-group-text">Note: 2 250gm = 500gm</span></div>
							@endif
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script')

	<script type="text/javascript">
		
		$(document).ready(function(){

			var qty = 1;
			var amt = $("#amount").val();

			$("#button-addon1").click(function(){
				qty=qty + 0.5;	
				$("#qty").val(qty);
				$("#amount").val(qty*amt);
			});

			$("#button-addon2").click(function(){
			    if(qty!=0)
			    {
			    qty = qty - 0.5;	
				$("#qty").val(qty);
				$("#amount").val(qty*amt);
			    }
			    else
			    {
			        $("#qty").val(qty);
				    $("#amount").val(qty*amt);
			    }
			
			});
		});

	</script>

@endsection