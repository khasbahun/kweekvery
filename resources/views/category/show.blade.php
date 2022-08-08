@extends('layouts.app')

@section('title', '| Category Show')

@section('stylesheets')

	{{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="container">
		<div class="card">
			<h5 class="card-header">All Categories</h5>
			<div class="card-body p-0">
		    	<ul class="list-group list-group-flush">
		    	    <li class="list-group-item"><a class="category-item" href="/top-sellers">Best Sellers</a></li>
		    	    <li class="list-group-item"><a class="category-item" href="/offers">Offers<span class="badge badge-secondary ml-2">{{$offer}}</span></a></li>
		    	    
		    		@foreach($categories as $category)
			    		<li class="list-group-item"><a class="category-item" href="/category/{{ $category->id }}/{{ str_replace(' ', '-', strtolower($category->name)) }}">{{ $category->name }} <span class="badge badge-secondary ml-2">{{$category->products->count()}}</span></a></li>
			    	@endforeach	
			  	</ul>
		  	</div>
		</div>
	</div>	

@endsection