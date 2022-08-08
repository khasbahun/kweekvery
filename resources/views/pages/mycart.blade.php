@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}
    

@endsection

@section('content')
<style>
h3 {
    text-align: center;
}
</style>

<div class="container">
	<div class="col-xs-12  col-md-12 ">
		<div class="card border-0"  >
			<div class="card-header ">
				<h5>My Bag </h5>
			</div>
			
                @if(Cart::count() == 0) 
                <div class="card-body">
				<div class="row">
                <div class="col-md-4 mx-auto mt-6">
                    <h2 class="text-muted"  >Your Jhola is Empty</h2>
                    </div>
                    </div>
                    </div>
               @else 
               
				<div  style="overflow-x:auto;align-content: center; ">
                 <table class="table table-borderless">
                    <thead style="text-align:center;">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th ></th>
                        </tr>
                    </thead>
               
                    <tbody style="text-align:center;">
    
                        <?php foreach(Cart::content() as $row) :?>
    
                            <tr>
                                <td>
                                    <p><em><?php echo $row->name; ?></em></strong></p>
                                    
                                </td>
                                <td><?php echo $row->qty;  ?> <?php echo ($row->options->has('priceper') ? $row->options->priceper : ''); ?>(s)</td>
                                <td>₹<?php echo $row->subtotal() ?></td>
                                <td>
                                   <div >
                                        <a href="/mycart/remove/{{$row->rowId}}" class="btn btn-danger "><i class="fa fa-close" aria-hidden="true"></i></a> 
                                    </div>
                                    
                                </td>
                            </tr>
    
                        <?php endforeach;?>
                        <hr/>
                        <tr>
                    <td></td>
                    <td><strong>Delivery Charge *</strong></td>
                            <td>
                             <!--   <a href="#" data-toggle="modal" data-target="#rate">Click to check.</a> -->
                             
                                    ₹100
                            </td>
                    <td></td>
                    </tr>
                    </tbody>
                
                    <tfoot style="text-align:center;">
                        
                        <tr>
                            <td colspan="1">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td><strong>₹<?php echo Cart::total();  ?></strong> + Delivery</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
            
            @endif 
            
		</div>
		@if(Cart::count() != 0)
		<div class="card-header border-0">
		    <span>Note: Delivery Charge is only applicable to orders less than ₹2000. </span>
		 </div>
		 @endif
		<div class="row">
			<div class="col-md-4 mx-auto mt-4">
				<a href="/" class="btn btn-success btn-lg btn-block">Continue Shopping</a>
			</div>
            @if(Cart::count() != 0) 
            <div class="col-md-4 mx-auto mt-4">
				<a href="/checkout/details" class="btn btn-primary btn-lg btn-block">Checkout</a>
			</div>
            @endif 
		</div>
	</div>	
    </div>
<!-- Guidelines Popup Message -->
					<div class="modal fade" id="rate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Delivery Rate</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<div class="columns">
                                  <ul class="price">
                                    <li>Gangtok Area - Rs. 50</li>
                                    <li>Rangpo Area - Rs. 60</li>
                                    <li>Ranipool Area - Rs. 60</li>
                                    
                                    
                                  </ul>
                                </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-dark" data-dismiss="modal">Got it</button>
								</div>
							</div>
						</div>
					</div>
@endsection