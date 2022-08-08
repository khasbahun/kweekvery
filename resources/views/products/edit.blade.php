@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <hr/>
	<div class="container">
		<div class="card mb-4">
			
		{!! Form::open(['action' => ['App\Http\Controllers\ProductsController@update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
	

  			
			
			<div class="card mb-4">
			<h5 class="card-header">Edit Product</h5>
		
				<div class="card-body">
				<div class=" col-lg-8">
						<div class="form-group">
							<label for="username">Product Name</label>
							<input type="text" class="form-control" id="name" name="name" value=" {{$product->name}} ">
						</div>
						
						<div class="form-group">
							<label for="email">Description</label>
							<input type="textarea" class="form-control" id="description" name="description" value=" {{$product->description}} ">
						</div>

						<div class="form-group">
							<label for="phone">Price</label>
							<input type="text" class="form-control" id="price" name="price" value=" {{$product->price}} ">
						</div>
						<div class="form-group">
							<label for="category">Price Per</label>
								<select class="form-control" name="per"
								      <option value="50gm"   {{ ($product->price_per == "50gm") ? "selected" : "" }}>50gm</option>
								    <option value="100gm"   {{ ($product->price_per == "100gm") ? "selected" : "" }}>100gm</option>
								     <option value="120gm" {{ ($product->price_per == "120gm") ? "selected" : "" }}>120gm</option>
                                      <option value="130gm" {{ ($product->price_per == "130gm") ? "selected" : "" }}>130gm</option>
                                       <option value="140gm" {{ ($product->price_per == "140gm") ? "selected" : "" }}>140gm</option>
								      <option value="150gm"   {{ ($product->price_per == "150gm") ? "selected" : "" }}>150gm</option>
								        <option value="160gm" {{ ($product->price_per == "160gm") ? "selected" : "" }}>160gm</option>
                                          <option value="170gm" {{ ($product->price_per == "170gm") ? "selected" : "" }}>170gm</option>
                                           <option value="180gm" {{ ($product->price_per == "180gm") ? "selected" : "" }}>180gm</option>
                                            <option value="190gm" {{ ($product->price_per == "190gm") ? "selected" : "" }}>190gm</option>
                                    <option value="200gm"   {{ ($product->price_per == "200gm") ? "selected" : "" }}>200gm</option>
                                    <option value="220gm"  {{ ($product->price_per == "220gm") ? "selected" : "" }}>220gm</option>
                                      <option value="230gm"  {{ ($product->price_per == "230gm") ? "selected" : "" }}>230gm</option>
                                       <option value="240gm"  {{ ($product->price_per == "240gm") ? "selected" : "" }}>240gm</option>
								    <option value="250gm" 	{{ ($product->price_per == "250gm") ? "selected" : "" }}>250gm</option>
								    <option value="260gm" {{ ($product->price_per == "260gm") ? "selected" : "" }}>260gm</option>
                                      <option value="270gm" {{ ($product->price_per == "270gm") ? "selected" : "" }}>270gm</option>
                                       <option value="280gm" {{ ($product->price_per == "280gm") ? "selected" : "" }}>280gm</option>
							        <option value="500gm" 	{{ ($product->price_per == "500gm") ? "selected" : "" }}>500gm</option>
							        <option value="750gm" 	{{ ($product->price_per == "750gm") ? "selected" : "" }}>750gm</option>
									<option value="KG" 	    {{ ($product->price_per == "KG")    ? "selected" : ""    }}>Kilogram</option>
									<option value="5KG"     {{ ($product->price_per == "5KG")    ? "selected" : ""    }}>5 KG</option>
									<option value="25KG"    {{ ($product->price_per == "25KG")    ? "selected" : ""    }}>25 KG</option>
									<option value="200mL"	{{ ($product->price_per == "200mL") ? "selected" : "" }}>200mL</option>
									<option value="250mL"	{{ ($product->price_per == "250mL") ? "selected" : "" }}>250mL</option>
									<option value="500mL"	{{ ($product->price_per == "500mL") ? "selected" : "" }}>500mL</option>
									<option value="750mL"	{{ ($product->price_per == "750mL") ? "selected" : "" }}>750mL</option>
									<option value="Litre"	{{ ($product->price_per == "Litre") ? "selected" : "" }}> Litre</option>
									<option value="2L" 	{{ ($product->price_per == "2L") ? "selected" : "" }}>2L</option>
									<option value="5L" 	{{ ($product->price_per == "5L") ? "selected" : "" }}>5L</option>
									<option value="Dozen"   {{ ($product->price_per == "Dozen") ? "selected" : "" }}>Dozen</option>
									<option value="Packet"  {{ ($product->price_per == "Packet") ? "selected" : "" }}>Packet</option>
                                      <option value="Piece"	{{ ($product->price_per == "Piece") ? "selected" : "" }}>Piece</option>
                                      <option value="Bundle"{{ ($product->price_per == "Bundle")? "selected" : "" }}>Bundle</option>
                                      <option value="Unit"	{{ ($product->price_per == "Unit")  ? "selected" : "" }}>Unit</option>
            						 <option value="Tray" {{ ($product->price_per == "Tray")  ? "selected" : "" }}>Tray</option>
            						 <option value="0.5 Pound" {{ ($product->price_per == "0.5 Pound")  ? "selected" : "" }}>0.5 Pound</option>
                                         <option value="1 Pound" {{ ($product->price_per == "1 Pound")  ? "selected" : "" }} >1 Pound</option>
                                         <option value="1.5 Pound" {{ ($product->price_per == "1.5 Pound")  ? "selected" : "" }}>1.5 Pound</option>
                                          <option value="2 Pound" {{ ($product->price_per == "2 Pound")  ? "selected" : "" }}>2 Pound</option>
                                           <option value="Slice" {{ ($product->price_per == "Slice")  ? "selected" : "" }}>Slice</option>
                                            <option value="Nos" {{ ($product->price_per == "Nos")  ? "selected" : "" }}>Nos</option>
                                             <option value="Box" {{ ($product->price_per == "Box")  ? "selected" : "" }}>Box</option>
								</select>
						</div>
						<div class="form-group">
							<label for="category">Category</label>
										<select class="form-control" name="category_id">
								@foreach($categories as $category)
									<option value="{{ $category->id }}"
									{{ ($product->category_id == $category->id) ? "selected" : "" }}
									>{{ $category->name }}</option>
								@endforeach
								</select>
						</div>
						<div class="form-group">
							{{ Form::file('product-image') }}
						</div>
						
						<div class="card-footer">
						{{ Form::submit('Update Product', ['class' => 'btn btn-primary']) }}
							<a href="{{ route('allproducts')}}" class="btn btn-danger">Back</a>
						</div>
				</div>    
		</div>
    </div>
    {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection