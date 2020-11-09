@extends('layouts.app')

@section('content')
 
@if($products)
	@foreach($products as $product)
		<hr />
        <div class='row'>
        <div class='col-md-8'>
        <table >
            <tr><td style="text-align:center"><h3>{{ $product['title'] }}</h3>
        </td><tr>
            <tr><td style="text-align:center"><img src="{{ $product['image'] }}" width=200px; />
		</td><tr>
            
            <tr>
            <td style="text-align:center"><b>&#8377; {{ $product['price'] }} 
            <!-- <a alt="View" href="/products/show/{{ $product['id'] }}">View Details</a> -->
            <a alt="View" href="products/show/{{ $product['id'] }}">View Details</a>
            </b> 
            </td>
            <tr>
            
            <tr><td style="text-align:center"> <p>{{ $product['description'] }}</p>
		</td><tr>
            <tr><td style="text-align:center"><b>{{ $product['category'] }}</b></td><tr>
        </table>
		
		
		</div>
        </div>
	@endforeach
@endif

 
 
@endsection
