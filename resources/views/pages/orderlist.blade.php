@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">


	<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
				<p>Orders</p>
			</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
								<th>Ordered</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($orders as $order)
							<tr>
								<td>{{ $order->token }}</td>
								<td>{{ $order->product_name }}</td>
								<td>{{ $order->qty }}</td>
								<td>₹ {{ $order->amount }}</td>
								<td>{{ $order->user_name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->number }}</td>
								<td>{{ $order->created_at->diffForHumans() }}</td>
								<td>
                                <div class="input-group mb-3 ">
                                        <a href="" class="btn btn-success "><i class="fa fa-check" aria-hidden="true"></i></a>
                                    
                                   
                                        <a href="" class="btn btn-danger "><i class="fa fa-close" aria-hidden="true"></i></a> 
                                    </div>
								</td>
							</tr>
                        @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>	
	<!--Import jQuery before export.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    <!--Export table buttons-->
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
    <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script>
  $(document).ready(function() {
    $('#example1').DataTable();
	});
        
	
    
    
    
  </script>

@endsection