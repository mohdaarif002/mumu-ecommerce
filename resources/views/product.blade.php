@extends('master_layout')

@section('content')
<div class="container-fluid product-container">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">


 
    <div class="carousel-inner">
          @foreach($products as $product)
          <div class="carousel-item {{$product['id']==4?'active':''}}"> 
                  <a href="/detail/{{$product['id']}}">
                      <img src="{{ $product['img-url']}}" class="d-block w-100" alt="">
                          <div class="carousel-caption d-none d-md-block">
                              <h5>{{ $product['name']}}</h5>
                              <p>{{ $product['description']}}</p>
                          </div>
                      </a>     
              </div>
              
          @endforeach
    
    </div>
   
    <div class="carousel-indicators">
      <?php $count=0; ?>
    
      @foreach($products as $product)
      
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$count}}" class="{{$count==0?'active':''}}" aria-current="true" ></button>
      <?php $count+=1; ?> 
      @endforeach
    </div>
  

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<h3 class="headingClass">Trending Products</h3>

<div class=" container product-card">
  <div class="row">
        @foreach($products as $product)
            <div class="col-sm-3 inner-card">
             <a href="/detail/{{$product['id']}}">
                       <div class="card ">
                      
                          <img class="card-img-top card-image img-fluid img-thumbnail"  src="{{ $product['img-url']}}" alt="Card image">
                                  <div class="card-body ">
                                      <h4 class="card-title">{{ $product['name']}}</h4>
                                      <p class="card-text">&#8377 {{ $product['price']}}</p>
                                      <p class="card-text">{{ $product['description']}}</p>
                                  </div>
                       </div>
              </a>         
             </div> 
          
             
        @endforeach
    </div>     
  </div> 
</div>    



@endsection