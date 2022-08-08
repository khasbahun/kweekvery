@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="container">
		<div class="card">
			<div class="card-header">
				<p>Order History</p>
			</div>
			<div class="card-body">
				<div class="row">
				
				@if($orders->isEmpty()) 
                <div class="col-md-6 mx-auto mt-6">
                    <h3  class="text-muted" >You have not ordered anything.</h3>
                    </div>
               @else 
					<table class="table table-bordered mx-4 my-3">
						<thead>
							<tr>
								<th> Order Id</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Amount</th>
								
								<th>Ordered on</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($orders as $order) :?>
							<tr>
								<td>{{ $order->token }}</td>
								<td>{{ $order->product_name }}</td>
								<td>{{ $order->qty }}</td>
								<td>₹ {{ $order->amount }}</td>
								
								<td>{{ $order->created_at }}</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mx-auto mt-4">
				<a href="/" class="btn btn-primary btn-lg btn-block">Continue Shopping</a>
			</div>
		</div>
	</div>	

@endsection