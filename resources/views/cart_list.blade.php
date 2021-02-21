@extends('master_layout')



@section('content')

<h3 class="headingClass">Cart Items</h3>
<?php
$imageURL='img-url';
?>
@if(count($products)!=0)
<div class=" container product-card">

        <a class='btn btn-primary' href="/order-now">Order Now</a>
            <div class="row">
        
                @foreach($products as $product)
                            <div class="col-sm-3 inner-card">
                            
                                        <div class="card ">
                                        
                                            <img class="card-img-top card-image img-fluid img-thumbnail"  src="{{$product->$imageURL}}" alt="Card image">
                                                    <div class="card-body ">
                                                        <!-- <h4 class="card-title">{{print_r($product)}}</h4>
                                                        <h4 class="card-title">{{print_r($product->$imageURL)}}</h4> -->
                                                    
                                                        <h4 class="card-title">{{ $product->name}}</h4>
                                                        <p class="card-text">&#8377 {{ $product->price}}</p>
                                                        <p class="card-text">{{ $product->description}}</p>
                                                    </div>
                                        <a class="btn btn-danger" href="/remove-product/{{$product->cartId}}"> Remove From Cart  </a> 

                                        </div>
                                    
                            </div> 
                    
                    
                @endforeach
                
            </div>     
             
        <a class='btn btn-primary' href="/order-now" style="margin-top:10px;">Order Now</a>

@else
 <h5>Add Items to your cart.</h5>
@endif 

</div>
@endsection
