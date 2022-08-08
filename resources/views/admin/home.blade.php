@extends('admin.layouts.app')

@section('main-content')

	
<div class="content-wrapper">
	<div class="container">				
  <h2>All time</h2><hr/>
     <div class="row text-center">
            <div class="col-sm-3">
     
        <div class="card bg-dark text-white">
                                        <div class="card-header">
                                            <h5 >No. of Unique Visitors</h5>
                                        </div>
                                        <div class="card-body">
                                        <h3  style="text-align:center;"><!-- hitwebcounter Code START -->
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
                                        <em><h3  style="text-align:center;">Rs. {{ $total_amount}}</h3></em>
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
                                        <em><h3  style="text-align:center;"> {{ $total_orders}}</h3></em>
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
                                        <em><h3  style="text-align:center;">{{ $users }}</h3></em>
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
                                    <em><h3  style="text-align:center;"> {{ $delivered_today}}</h3></em>
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
                                    <em><h3  style="text-align:center;"> {{ $working }}</h3></em>
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
                                    <em><h3  style="text-align:center;">{{ $ordered_today}}</h3></em>
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
	<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
	</div>	
</div>



	<!--Import jQuery before export.js-->
	
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="/public/img/js/app.js"></script>
    
    

  

@endsection


	


	
    