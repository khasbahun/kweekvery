<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<head>
<title> Kweekvery Orders</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Styles -->
<link href="/public/img/css/app.css" rel="stylesheet">
<link href="/public/img/css/new.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<style>.clear { clear: both; height: 40px; }</style>
</head>

<body style="background-color: #cfe7e3">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-4" >
    <div class="container">
   
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="/public/kweekvery.png" width="110" height="75" alt="kweekvery_logo" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/category/show">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/feedback">Review</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('mycart') }}">  <i class="fa fa-shopping-bag" aria-hidden="true"> </i> Bag @if(Cart::count()!=0) {{Cart::content()->count()}} @endif </a>
                </li>
                @if (Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name}} <span class="caret"></span>
                        </a>
                        @if (Auth::user()->is_admin)
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                             <a href="/dashboard" class="dropdown-item">Dashboard</a>
                            <a href="/all-products" class="dropdown-item">Products</a>
                            
                            <a href="/category" class="dropdown-item">Category</a>
                            <a href="/order-list" class="dropdown-item">Orders</a>
                            <a href="/users" class="dropdown-item">Users</a>
                           
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @else
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a href="/myaccount" class="dropdown-item">My Profile</a>
                            
                            <a href="/myorders" class="dropdown-item">My Orders</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
			<p><span>
			<a href="/order-list">Orders</a>
			</span>
			
			<span style="float:right;margin:5px;">
				<a href="/orders/cancelled-list">Cancelled</a>
			</span>
			<span style="float:right;margin:5px;">
				<a href="/orders/delivered-list">Delivered</a>
			</span>
			</p>
				
				
			</div>
            <div class="card-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Item</th>
								<th>Quantity</th>
								<th >Price</th>
								<th>Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
								<th>Ordered</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($orders as $order)
							<tr>
								<td>{{ $order->id}}</td>
								<td>{{ $order->product_name }}</td>
								<td>{{ $order->qty }} {{ $order->price_per}}</td>
								<td  style="width: 10%;" >₹ {{ $order->amount }}</td>
								 @if($loop->index == 0)  
                                    <td style="width: 10%;">{{ $order->user_name }}</td>
                                @else
                                    <td style="text-align: center; vertical-align: middle;"><strong>,,</strong>  </td>
                                @endif
								
								@if($loop->index == 0)  
                                    <td>{{ $order->address }}</td>
                                @else
                                    <td style="text-align: center; vertical-align: middle;"> <strong>,,</strong> </td>
                                @endif
                                @if($loop->index == 0)  
                                    <td>{{ $order->number }}</td>
                                @else
                                    <td style="text-align: center; vertical-align: middle;"> <strong>,,</strong> </td>
                                @endif
                                @if($loop->index == 0)  
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                @else
                                    <td style="text-align: center; vertical-align: middle;"> <strong>,,</strong> </td>
                                @endif
								
								@if($order->status == 'working')
								<td>
									<div class="input-group mb-3 ">
									    
										<button class="btn btn-success" id="delivered" onclick="setStatus('d',{{ $order->id }})"><i class="fa fa-check" aria-hidden="true"></i></button>
									
								
									<button class="btn btn-danger" id="cancelled" onclick="setStatus('c',{{ $order->id }})"><i class="fa fa-close" aria-hidden="true"></i></button>
									</div>
								</td>
								@else
								<td>
									<div class="input-group mb-3 ">
									    <button class="btn btn-danger" id="delete" onclick="deleteOrder({{ $order->id }})"><i class="fa fa-close" aria-hidden="true"></i></button>
										
									</div>
								</td>
								@endif
								
							</tr>
                        @endforeach
						</tbody>
						<tfoot>
                           <tr id="tfooter">
                               <th colspan="2" style="border:0px;"></th>
                               <th colspan="1" style="border:0px;"><strong>TOTAL</strong></th>
                               <th colspan="1" style="border:0px;">₹ {{ $total }}</th>
                               <th  colspan="5"  style="border:0px;"></th>
                           </tr>
                        </tfoot>
					</table>
				</div>
			</div>
		</div>
</div>
</div>
 <div class="clear"></div>
        <footer class="navbar navbar-expand-lg navbar-dark fixed-bottom">
			<div  style="width:100%">
				
				<div style="float: left;"><span >Made with<span style="font-size:130%;color:red;"> &hearts; </span> in Sikkim</span></div>
				<div style="float: right;"><span style="font-size:90%;" >&copy; 2020 Kweekvery</span></div>
				
			</div>
	</footer>

	<!--Import jQuery before export.js-->
	
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <!--Data Table-->
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="/public/img/js/app.js"></script>
    
      <script type = "text/javascript">
         function setStatus(a,id) {
             if(a == 'd')
             {
                 var path = "/delivered/" + id;
             }
             else
             {
                  var path = "/cancel/" + id;
             }
            
            $.ajax({
                    /* the route pointing to the post function */
                    url: path,
                    type: 'POST',
                    success: function(callback)
                    {
                        alert('Success Reload page to verify.');
                    },
                    error: function(status)
                    {
                        console.log(status);
                    }
                    
                });
             
                
         }
         function deleteOrder(id) {
           
            var table = $('#example1').DataTable(); 
            var path = "/orders/delete/" + id;
            $.ajax({
                    /* the route pointing to the post function */
                    url: path,
                    type: 'POST',
                    success: function(callback)
                    {
                        alert('Deleted Refresh Page to Verify.');
                    },
                    error: function(status)
                    {
                        console.log(status);
                    }
                    
                }); 
                
                
         }
       
</script>
    <script>
   
    
    $(document).ready(function() {
        $.noConflict();
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'pdf', footer: true ,
                className: 'btn-danger',
                exportOptions: {
                columns: 'th:not(:last-child)'
                }
            }
                 
            ]
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
	});
    

    
  </script>
  


</body>

</html>

	


	
    