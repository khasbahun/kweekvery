@extends('layouts.app')

@section('title', '| Contact us')

@section('stylesheets')

<style>
    .card-img-80 {
    width: 100%;
    height: 80%;
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}
</style>
@endsection

@section('content')
 <div id="map">
<div class="container">
   
        <div sytle="width:100%;height:70%;">
			 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3544.123721578558!2d88.60366071505412!3d27.340600282945182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e6a54315538fc1%3A0x290b782df4adf8b3!2sKweekvery!5e0!3m2!1sen!2sin!4v1629524677165!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>   
		</div>
		
	</div>
</div>
	<hr/>	
	<div id="contact">
    <div class="container">

		<p style="text-align:center;">
											<a href="https://wa.me/9178640 89725" target="_blank">
                               <span style="font-size: 1.5rem;padding:20px;">
                                   <span style="color: green;">
                                      <i class="fa fa-whatsapp fa-2x"></i>
                                   </span>
                               </span>
                            </a>	
						    <a href="https://www.facebook.com/kweekvery" target="_blank">
                               <span style="font-size: 1.5rem;padding:20px;">
                                   <span style="color: blue;">
                                      <i class="fa fa-facebook fa-2x"></i>
                                   </span>
                               </span>
                            </a>
                            <a href="mailto: bibek.timsina@gmail.com" target="_blank">
                               <span style="font-size: 1.5rem;padding:20px;">
                                   <span style="color: #D44638;">
                                      <i class="fa fa-envelope-o fa-2x"></i>
                                   </span>
                               </span>
                            </a>
			 </p>
	</div>
</div>



@endsection