@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <hr/>
	<div class="container">
  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
		<div class="card mb-4">
			<h5 class="card-header">Add Product</h5>
    
			<div class="card-body">
			<div class=" col-lg-8">
                      <div class="form-group">
                        <label for="username">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="email">Description</label>
                        <input type="textarea" class="form-control" id="description" name="description" placeholder="Description about product">
                      </div>

                      <div class="form-group">
                        <label for="phone">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                      </div>
                                            <div class="form-group">
                        <label for="category">Category</label>
						              <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
		                    </select>
                      </div>
                      <div class="form-group">
                        <label for="category">Price Per</label>
                        
						              <select class="form-control" name="per">
						            <option value="50gm">50gm</option>
                                    <option value="100gm">100gm</option>
                                     <option value="120gm">120gm</option>
                                      <option value="130gm">130gm</option>
                                       <option value="140gm">140gm</option>
                                        <option value="150gm">150gm</option>
                                         <option value="160gm">160gm</option>
                                          <option value="170gm">170gm</option>
                                           <option value="180gm">180gm</option>
                                            <option value="190gm">190gm</option>
                                    
                                    <option value="200gm">200gm</option>
                                     <option value="220gm">220gm</option>
                                      <option value="230gm">230gm</option>
                                       <option value="240gm">240gm</option>
                                    <option value="250gm">250gm</option>
                                     <option value="260gm">260gm</option>
                                      <option value="270gm">270gm</option>
                                       <option value="280gm">280gm</option>
							        <option value="500gm">500gm</option>
							        <option value="750gm">750gm</option>
									<option value="KG">Kilogram</option>
									<option value="5KG">5 KG</option>
									<option value="25KG">25 KG</option>
									<option value="200mL">200mL</option>
									<option value="250mL">250mL</option>
									<option value="500mL">500mL</option>
									<option value="750mL">750mL</option>
									<option value="Dozen">Dozen</option>
									<option value="Packet">Packet</option>
									<option value="Litre"> Litre</option>
									<option value="2L">2L</option>
									<option value="5L">5L</option>
                                      <option value="Piece">Piece</option>
                                      <option value="Bundle">Bundle</option>
                                      <option value="Unit">Unit</option>
                                       <option value="Tray">Tray</option>
                                        <option value="0.5 Pound">0.5 Pound</option>
                                         <option value="1 Pound">1 Pound</option>
                                         <option value="1.5 Pound">1.5 Pound</option>
                                          <option value="2 Pound">2 Pound</option>
                                           <option value="Slice">Slice</option>
                                            <option value="Nos">Nos</option>
                                             <option value="Box">Box</option>
                           
		                    </select>
                      </div>

                      <div class="form-group">
                        {{ Form::file('product-image') }}
                      </div>
                      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('allproducts')}}" class="btn btn-danger">Back</a>
                    </div>
		  	</div>    
    </div>
    </div>
    </form>
	</div>
</div>
@endsection