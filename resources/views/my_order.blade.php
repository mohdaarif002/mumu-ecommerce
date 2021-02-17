@extends('master_layout')

@section('content')

<h3>My Orders</h3>
<?php
$imageURL='img-url';
?>
@if(count($products)!=0)
<div class=" container product-card">

    <div class="row">
   
          @foreach($products as $product)
                    <div class="col-sm-3 inner-card">
                    
                                <div class="card ">
                                
                                    <img class="card-img-top card-image img-fluid img-thumbnail"  src="{{$product->$imageURL}}" alt="Card image">
                                            <div class="card-body ">
                                            
                                                <h4 class="card-title">{{ $product->name}}</h4>
                                                <p class="card-text">&#8377 {{ $product->price}}</p>
                                                <p class="card-text">Payment Option:{{ $product->paymentOption}}</p>
                                                <p class="card-text">Payment Status:{{ $product->paymentStatus}}</p>
                                                <p class="card-text">Order Status: {{ $product->status}}</p>
                                                <p class="card-text">Address : {{ $product->paymentAddress}}</p>
                                            </div>

                                </div>
                            
                    </div> 
            
              
          @endforeach
        
      </div>     


@else
 <h5>No Order placed yet.</h5>
 @endif 


@endsection