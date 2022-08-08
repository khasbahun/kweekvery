@extends('admin.layouts.app')

@section('main-content')

	
<div class="content-wrapper">
 <div class="container">

        <div class="row">
            <div class="col-md-3">
                <a href="/products/create" class="btn btn-primary">Add New Product</a>
                
            </div>
            
            <div class="col-md-9 text-right px-4 pt-2">
                <h5 class="d-inline total-cats mt-3">Total Products: <span class="badge badge-secondary">{{ $products->count() }}</span></h5>
            </div>
        </div>
        <hr/>
        <div class="row" style="overflow-x:auto;">
            <table id="table" class="table ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        
                        <th>Action <span class="btn btn-warning" style="align:left;">Click on View to Manage Discount</sapn></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td style="width: 15%;">
                                @if($product->image)
                                    <img src="/public/img/{{$product->image}}" width="150px" height="100px" style="border-radius: 10px;">
                                @else
                                    <img src="/storage/img/preview.jpg" width="150px" height="100px" style="border-radius: 10px;">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td><h3>Rs.{{ $product->price }}</h3></td>
                            <td>{{ $product->category->name }}</td>
                           
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-block">View</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/products/{{$product->id}}/edit" class="btn btn-success btn-block">Edit</a> 
                                    </div>
                                    <div class="col-md-4">
                                       {!! Form::open(['action' => ['App\Http\Controllers\ProductsController@destroy', $product->id], 'method' => 'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
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
    $('#table').DataTable();
    } );

    
  </script>
					

@endsection