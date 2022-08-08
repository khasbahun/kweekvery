@extends('layouts.app')

@section('title', '| My Profile')

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
		<div  class="content justify-content-center">
			<div class="card ">
				<div class="card-header">
					My Profile
				</div>
				
				<div class="card-body  ">
				<form role="form" action="{{ route('placeorder') }}" method="post">
  					{{csrf_field()}}
					<div class="row justify-content-center">
						<div class="col-md-6">
						<div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" disabled="true" class="form-control" id="name" name="name" value="{{$user->name}}">
                      </div>
                    
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"  disabled="true" class="form-control" id="email" name="email" value="{{$user->email}}">
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text"  disabled="true" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                      </div>

                      <div class="form-group">
                        <label for="text">Address</label>
                        
						<textarea class="form-control"  disabled="true" id="address" name="address" value="">{{$user->address}}</textarea>

                      </div>

                    
					  <div class="form-group">
					  	<button type="submit"  disabled="true" class="btn btn-danger">Edit</button>
					  </div>
						</div>
						
					</div>
									
								
						</div>
						
						
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection