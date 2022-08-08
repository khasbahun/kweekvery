@extends('layouts.app')

@section('title', '| dashboard')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

    <div class="col-md-11 mx-auto">
        <div class="row">
            <div class="col-md-3">
                <a href="/products/create" class="btn btn-primary">Create Offer</a>
            </div>
            <div class="col-md-9 text-right px-4 pt-2">
                <h5 class="d-inline total-cats mt-3">Total Offers: <span class="badge badge-secondary"></span></h5>
            </div>
        </div>
        <div class="row">
        <form action="{{ route('discount',1) }}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hovered mt-4 mx-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
						<th>Discount Price</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    
                        {{ csrf_field() }}
                        {{ method_field('POST')}}
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td style="width: 15%;">
                                @if($product->image)
                                    <img src="/storage/img/{{$product->image}}" width="150px" height="100px" style="border-radius: 10px;">
                                @else
                                    <img src="/storage/img/preview.jpg" width="150px" height="100px" style="border-radius: 10px;">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td><h3>Rs.{{ $product->price }}</h3></td>
                            
                            <td><h3>Rs.{{ $arr[1]['discount_price'] }}</h3></td>
                            <td>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                      
                                            
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                       
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
    </div>

@endsection
