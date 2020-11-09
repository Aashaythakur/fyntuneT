@extends('layouts.app')

@section('content')
 
@if($product)


<div class='row'>
        <div class='col-md-8'>
        <form method="post" action="{{route('addtocart')}}">
    
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div style="text-align:center">
		<button type='button' class="remove_from_cart" onclick=" down('0')" id="{{ $product['id']}}" amt="{{ $product['price']}}"> - </button>
		<input type="text" id="myNumber" name="myNumber" value="1">
        <input type="hidden" id="pamount" name="pamount" value="{{ $product['price']}}">
        <input type="hidden" id="pid" name="pid" value="{{ $product['id']}}">
		<button type='button'  class="add_to_cart" onclick="up('10')" id="{{ $product['id']}}" amt="{{ $product['price']}}"> + </button>
	    </div>
        <table >
            <tr><td style="text-align:center"><h3>{{ $product['title'] }}</h3>
        </td><tr>
            <tr><td style="text-align:center"><img src="{{ $product['image'] }}" width=200px; />
		</td><tr>
            <tr><td style="text-align:center"><b>&#8377; {{ $product['price'] }}</b></td><tr>
            <tr><td style="text-align:center"> <p>{{ $product['description'] }}</p></td><tr>
            <tr><td style="text-align:center"><b>{{ $product['category'] }}</b></td><tr>
            <tr><td style="text-align:center">
            <b><button class="btn btn-primary" id="addtocart" >Add To Cart </button></b>
            
            </td>
            <tr><td style="text-align:center"><h3>
            <div   class="total-title" id="TPrice" >
            <input type="hidden" value="{{ $product['price'] }}" name="totalAmount" id="totalAmount" >
            Total Amount :{{ $product['price'] }}
            </div>
            </h3></td></tr>
            <tr>
        </table>
		</form>
		</div>
        </div>
        
@endif

<script type="text/javascript" src="{{ URL::asset('js/product.js') }}"></script>	
@endsection