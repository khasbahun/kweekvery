@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')
<div class="container-fluid">
		
			<div class="card-header">
				<strong><p>Order Summary</p></strong>
			</div>
			
				<div style="overflow-x:auto;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th> Order Id</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($orders as $order) :?>
							<tr>
								<td>{{ $order->token }}</td>
								<td>{{ $order->product_name }}</td>
								<td>{{ $order->qty }}</td>
								<td>{{ $order->amount }}</td>
								<td>{{ $order->address }}</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div>
			
		
		<div class="row">
			<div class="col-md-4 mx-auto mt-4">
				<a href="/" class="btn btn-primary btn-lg btn-block">Continue Shopping</a>
			</div>
		</div>
	</div>	

@endsection