@extends('admin.layouts.app')

@section('main-content')

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="https://kweekvery.com/all-products" class="btn btn-primary btn-block">Back to All Products</a>
			</div>
		</div>
		<hr/>
		<div  class="d-flex justify-content-center">
			<div class="card">
				<div class="card-header">
					Product Details
				</div>
				<div class="card-body">
				<form role="form" action="{{ route('discount',$product->id) }}" method="post">
  					{{csrf_field()}}
					<div class="row">
						<div class="col-md-4">
							<img src="/public/img/{{ $product->image }}" class="w-100" height="280px" style="border-radius: 10px;">
							
						</div>
						<div class="col-md-6">
						<h2>{{ $product->name }}</h2>
							<p>{{ $product->description }}</p>
							<p>Category: {{ $product->category->name }}</p>
							<p>Price Per: {{ $product->price_per }}</p>
							<p>Original Price: {{ $product->price }}</p>
							
							<p>Discount Price <span class="badge badge-warning">Set value to 0 to remove offer</span></span><input type="text" name="offer" id="offer" class="form-control col-lg-3 " value="{{ $product->discount }}" ></p>
							<p>In Stock  <input type="checkbox" id="in_stock" name="in_stock" value="1" @if ($product->in_stock == 1) {{'checked'}} @endif></p>
							<input type="hidden" name="pid" id="pid" class="form-control" value="{{$product->id}}" >
							<div class="input-group mb-3 ">
											
											{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
											 
						</div>
				</form>
				</div>
			</div>
		</div>
	</div>

@endsection

