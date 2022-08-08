@extends('layouts.app')

@section('title', '| dashboard')

@section('stylesheets')

    <style>
        .card {
        
        margin: 2em;
        padding: 1em;
        }
    </style>

@endsection

@section('content')
<div class="container-fluid text-center bg-grey">
  <h2>All time</h2><hr/>
     <div class="row text-center">
            <div class="col-sm-3">
     
        <div class="card bg-dark text-white">
                                        <div class="card-header">
                                            <h5 >No. of Unique Visitors</h5>
                                        </div>
                                        <div class="card-body">
                                        <h3 class="card-title" style="text-align:center;"><!-- hitwebcounter Code START -->
<a href="https://www.hitwebcounter.com" target="_blank">
<img src="https://hitwebcounter.com/counter/counter.php?page=7694787&style=0006&nbdigits=5&type=ip&initCount=73" title="Total Website Hits" Alt="Web Hits"   border="0" /></a>             </h3>
                                        <p class="card-text" style="text-align:center;">Total Number of Unique Views of Site</p>
                                        </div>
                                    </div>
      </div>
		<div class="col-sm-3">
		
			<div class="card text-white bg-success ">
                                        <div class="card-header">
                                            <h5 >Total Business till date</h5>
                                        </div>
                                        <div class="card-body">
                                        <em><h3 class="card-title" style="text-align:center;">Rs. {{ $total_amount}}</h3></em>
                                        <p class="card-text" style="text-align:center;">Amount Earned</p>
                                        </div>
                                    </div>
			
  					
		
		</div>
    <div class="col-sm-3">
      
        <div class="card text-white bg-info ">
                                        <div class="card-header">
                                            <h5 >Total No. of Orders Delivered</h5>
                                        </div>
                                        <div class="card-body">
                                        <em><h3 class="card-title" style="text-align:center;"> {{ $total_orders}}</h3></em>
                                        <p class="card-text" style="text-align:center;">Products Sold Till Date</p>
                                        </div>
                                    </div>
      </div>
   
    <div class="col-sm-3">
     
        <div class="card text-black bg-warning ">
                                        <div class="card-header">
                                            <h5 >Total No. of Registered Customers</h5>
                                        </div>
                                        <div class="card-body">
                                        <em><h3 class="card-title" style="text-align:center;">{{ $users }}</h3></em>
                                        <p class="card-text" style="text-align:center;">Number of Registered Users</p>
                                        </div>
                                    </div>
      </div>
   
	</div>
	<hr/>
	<h2>Today</h2>
	<div class="row text-center">
		
    <div class="col-sm-4">
      
        <div class="card text-white bg-primary ">
                                    <div class="card-header">
                                        <h5 >Products Delivered Today</h5>
                                    </div>
                                    <div class="card-body">
                                    <em><h3 class="card-title" style="text-align:center;"> {{ $delivered_today}}</h3></em>
                                    <p class="card-text" style="text-align:center;">Number of Deliveries Today</p>
                                    </div>
                                </div>
      </div>
   
    <div class="col-sm-4">
     
        <div class="card text-white bg-danger ">
                                    <div class="card-header">
                                        <h5 >No. of Products to be Dispatched</h5>
                                    </div>
                                    <div class="card-body">
                                    <em><h3 class="card-title" style="text-align:center;"> {{ $working }}</h3></em>
                                    <p class="card-text" style="text-align:center;">Total No. of Products to be Delivered</p>
                                    </div>
                                </div>
    </div>
      <div class="col-sm-4">
     
       <div class="card text-white bg-secondary">
                    <div class="card-header">
                        <h5 > No. of People Who Ordered Today</h5>
                    </div>
                                    <div class="card-body">
                                    <em><h3 class="card-title" style="text-align:center;">{{ $ordered_today}}</h3></em>
                                    <p class="card-text" style="text-align:center;"> Orders Placed Today Not Delivered</p>
                                    </div>
                                </div>
      </div>
	</div>
		
<div class="col-md-6 mx-auto">
		<div class="card">
			
			<div class="card-body">
		    	{!! Form::open(['action' => ['App\Http\Controllers\AdminController@msg'], 'method' => 'PUT']) !!}
					<div class="form-group">
				    	{{ Form::label('name', 'Message') }}
				    	{{ Form::text('name', $message, ['class' => 'form-control', 'placeholder' => 'Enter Message']) }}
				  	</div>
				  	{{ Form::submit('Update Message', ['class' => 'btn btn-primary']) }}
				  	

				{!! Form::close() !!}
		  	</div>
		</div>
	</div>
</div>
@endsection
