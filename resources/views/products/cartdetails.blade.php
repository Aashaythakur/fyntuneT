@extends('layouts.app')

@section('content')
 
@if($allcartdetails)
<div class='row'>
        <div style="text-align:center;" class='col-md-12'>
        <h2 style="text-align:center;" ><u>Cart Details</u></h2>
        <form method="post" action="{{route('placeorder')}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="allcartdetails" value="<?php  json_encode($allcartdetails); ?>">
            <table  style="margin-left:25%;text-align:center;" >
<?php
$productList=\App\Components\ProductData::getProductList();
 $total_price = 0;
foreach($allcartdetails as $product){
    $pDetails=$productList[$product['pid']];

   $total_price=$total_price + ($pDetails['price'] * $product['myNumber']);
?>
	  
            <tr><td style="text-align:center"><h3>{{ $pDetails['title'] }}</h3></td><tr>
            <tr><td style="text-align:center"><img src="{{ $pDetails['image'] }}" width=100px; /></td></tr>    
            <tr><td style="text-align:center"><b>Quantity : {{ $product['myNumber'] }}</b></td><tr>
            <tr><td style="text-align:center"><b>Price : &#8377; {{ $pDetails['price'] * $product['myNumber'] }}</b></td><tr>
        
<?php } ?>

<tr><td><h3><hr />Total Price : {{$total_price}} </h3></td></tr>

<tr><td><button class="btn btn-primary" id="place" >Place Order</button></td></tr>
        
</table>
</form>
		</div>
        </div>
        
@endif	
@endsection

