@extends('master_layout')

@section('content')


<h3 class="headingClass">Search Results</h3>

<div class=" container product-card">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-5 inner-card">
             <a href="/detail/{{$product['id']}}">
                       <div class="card ">
                      
                          <img class="card-img-top card-image img-fluid img-thumbnail"  src="{{ $product['img-url']}}" alt="Card image">
                                  <div class="card-body ">
                                      <h4 class="card-title">{{ $product['name']}}</h4>
                                      <p class="card-text">{{ $product['price']}}</p>
                                      <p class="card-text">{{ $product['description']}}</p>
                                  </div>
                       </div>
              </a>         
             </div> 
          
             
        @endforeach
    </div>     
</div>    



@endsection