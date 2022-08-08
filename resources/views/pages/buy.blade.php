@extends('layouts.app')

@section('title', '| Buy Product')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="/mycart" class="btn btn-primary btn-block">Back to My Bag</a>
			</div>
			
		</div><hr/>
		@if (Auth::guest())
		<div class="content justify-content-center">
		            <span class="mx-auto btn btn-warning ">You are not registered with us. </span>
					<a href="/register"><span class="mx-auto btn btn-success ">Registering will auto-fill this form and keep track of your records. </span></a>
		</div>
		<hr/>
		@endif
		<div  class="content justify-content-center">
			<div class="card ">
				<div class="card-header">
				Enter Details for Delivery
				</div>
		
				@if (Auth::guest())
				<div class="card-body  ">
				<form role="form" action="{{ route('placeorder') }}" method="post">
  					{{csrf_field()}}
					<div class="row justify-content-center">
						<div class="col-md-6">
						<div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                      </div>

                      <div class="form-group">
                        <label for="text">Address</label>
                        
						<textarea class="form-control" id="address" name="address" placeholder="Full Address"></textarea>

                      </div>

					  <div class="form-group">
						<label for="payment">Payment Method:</label><br/>

							<select name="payment" id="payment">
							<option value="COD">Cash on Delivery</option>
							</select>

                      </div>

                    
					  <div class="form-group">
					  	<button type="submit" class="btn btn-success">Place Order</button>
					  </div>
						</div>
						
					</div>
									
								
						</div>
						
						
					</div>
					
				</div>
				@else
				<div class="card-body  ">
				<form role="form" action="{{ route('placeorder') }}" method="post">
  					{{csrf_field()}}
					<div class="row justify-content-center">
						<div class="col-md-6">
						<div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                      </div>
                    
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                      </div>

                      <div class="form-group">
                        <label for="text">Address</label>
                        
						<textarea class="form-control" id="address" name="address" >{{Auth::user()->address}}</textarea>

                      </div>
					  
					  <div class="form-group">
						<label for="payment"> Payment Method:</label><br/>

							<select name="payment" id="payment">
							<option value="COD">Cash on Delivery</option>
							</select>

                      </div>

                    
					  <div class="form-group">
					  	<button type="submit" class="btn btn-success">Place Order</button>
					  </div>
						</div>
						
					</div>
									
						</form>		
						</div>
						
						
					</div>
					
			
				@endif
				<div class="card-header">
					<span class="btn btn-warning ">Note: Email is optional but Invoice is sent via Email. </span>
				</div>
			</div>
			
		</div>
	</div>

@endsection