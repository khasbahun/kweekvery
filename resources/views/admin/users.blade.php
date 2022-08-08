@extends('admin.layouts.app')

@section('main-content')

	
<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
			<p>
			Registered Customers
		
			</p>
				
				
			</div>
            <div class="card-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Registered</th>
                                
							</tr>
						</thead>
						<tbody>
                        @foreach($users as $user)
							<tr>
								
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>
								<td>{{ $user->address }}</td>
								<td>{{ $user->created_at->diffForHumans() }}</td>
                                
								
							</tr>
                        @endforeach
						</tbody>
					</table>
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
    
    
    <script>
   
    
    $(document).ready(function() {
        $.noConflict();
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'print',
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


	


	
    