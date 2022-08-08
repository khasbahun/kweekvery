@extends('layouts.app')

@section('title', '| Reviews')

@section('stylesheets')

    
<style>
		/* Style the container with a rounded border, grey background and some padding and margin */
	.person {
	border: 2px solid #ccc;
	background-color: #eee;
	border-radius: 5px;
	padding: 16px;
	margin: 16px 0;
	}

	/* Clear floats after containers */
	.person::after {
	content: "";
	clear: both;
	display: table;
	}

	/* Float images inside the container to the left. Add a right margin, and style the image as a circle */
	.person img {
	float: left;
	margin-right: 20px;
	border-radius: 50%;
	}

	/* Increase the font-size of a span element */
	.person span {
	font-size: 20px;
	margin-right: 15px;
	}

	/* Add media queries for responsiveness. This will center both the text and the image inside the container */
	@media (max-width: 500px) {
	.person {
		text-align: center;
	}

	.person img {
		margin: auto;
		float: none;
		display: block;
	}
	}
</style>

@endsection

@section('content')




<div class="container">
	<div class="row">
		
		<h3 style="text-align:center;">Reviews</h3>
	</div>		
        <div class="person">
          <img src="public/reviews/roshan_dahal.jpg" alt="Avatar" style="width:120px">
          <p><span>Roshan Dahal</span> </p>
          <p>It's great to see local youths turning entrepreneurs with innovative business ideas delivering fresh organic vegetables at doorsteps. I recommend Kweekvery.</p>
        </div>
        
        <div class="person">
          <img src="public/reviews/user.jpg" alt="Avatar" style="width:120px">
          <p><span >Mita Zulca</span> </p>
          <p>I am so kicked after this early morning home delivery from a new startup called Kweekvery. Have no idea who runs this but they deliver fresh organic veggies straight from farms to homes. So I got myself Ningro, Iskus, Nakima and Avacados. All my top favourites and they look so good!</p>
        </div>
        	<div class="person">
          <img src="public/reviews/sristi.jpg" alt="Avatar" style="width:120px">
          <p><span >Sristi Sharma</span> </p>
          <p>I don't live in Sikkim. However I wanted to send my friends and family some vegetables, churpi and honey. I ordered with them, paid online and all the items were delivered the next day. I was impressed with the ease and speed of service. My family and friends were impressed with the high quality and authenticity of the items. 
            I would definitely recommend Kweekvery to those living in Gangtok and to those who don't live in Gangtok but want to send things over to friends and relatives.</p>
        </div>
		
</div>	
		
	

@endsection