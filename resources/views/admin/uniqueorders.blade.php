@extends('admin.layouts.app')

@section('main-content')
	

<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
			<p><span>
			<a href="/order-list">Kweekvery Order</a>
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
								<th>Order Id</th>
								<th>Name</th>
								<th>No. of Products Ordered</th>
								<th>Total</th>
								
                                <th>Address</th>
                                <th>Contact No.</th>
								<th>Ordered</th>
								<th>View Detail</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($orders as $order)
							<tr>
								<td>{{ $order->token }}</td>
							    <td>{{ $order->user_name }}</td>
								<td>{{ $order->qty }}</td>
								<td>₹ {{ $order->amount }}</td>
								
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->number }}</td>
								<td>{{ $order->created_at->diffForHumans() }}</td>
								 <td><a href="/orders/{{$order->token}}">View</a></td>
								@if($order->status == 'working')
								<td>
									<div class="input-group mb-3 ">
									    
									
									<button class="btn btn-success" id="delivered" onclick="setDelivered('{{ $order->token }}')"><i class="fa fa-check" aria-hidden="true"></i></button>
								
									<button class="btn btn-danger" id="cancelled" onclick="setCancelled( '{{ $order->token }}' )"><i class="fa fa-close" aria-hidden="true"></i></button>
									</div>
								</td>
								@else
								<td>
									<div class="input-group mb-3 ">
									    <button class="btn btn-danger" id="delete" onclick="deleteOrder('{{ $order->token}}')"><i class="fa fa-close" aria-hidden="true"></i></button>
										
									</div>
								</td>
								@endif
								
							</tr>
                        @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
</div>

        

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
         function setDelivered(id) {
           
             
                 var path = "/delivered/" + id;
             
             
            
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
          function setCancelled(id) {
           
             
                 var path = "/cancel/" + id;
             
             
            
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
                extend: 'pdf',
                className: 'btn btn-danger',
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
					

@endsection