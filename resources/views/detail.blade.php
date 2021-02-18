@extends('master_layout')

@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-6">
     <img class='detail-img' src="{{$product['img-url']}}" alt="">
    </div>
    <div class="col-sm-6  detail-text" >
        <a href="/">Go Back</a>
        <h3>{{$product['name']}}</h3>
        <h3>{{$product['price']}}</h3>
        <h3>{{$product['description']}}</h3>

        <div class='row detail-buy-options'>
          <div class="col-6">
          <form action="/add_to_cart" method='POST'>
              @csrf
              <input type="hidden" name="product_id" value='{{$product['id']}}' id="">
          
              <button class="btn btn-primary">Add to Cart</button>
            </form>
          </div>
            
            <div class="col-6">
              <form action="/buy-now" method='POST'>
                @csrf
                <input type="hidden" name="product_id" value='{{$product['id']}}' id="">
            
                <button class="btn btn-success detail-btn">Buy Now</button>
              </form>
            
            </div>
           
        </div>
    </div>

</div>

</div>
 
  
   


@endsection