<?php
use App\Http\Controllers\product_controller;

$total_items=product_controller::cart_items();// static function is called

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
  @if(Session::has('user'))       
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/my-order">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart-list">Cart Items({{$total_items?$total_items:0}})</a>
        </li>
  @endif      
        <li class="nav-item dropdown">
          
@if(Session::has('user'))
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Session::get('user')->name}}
                      </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>   
@else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                      </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/login">Login</a></li>
                <li><a class="dropdown-item" href="/signup">Sign Up</a></li>
              </ul>

@endif
            
        </li>
       
      </ul>
      <form class="d-flex" action='/search' method='GET'>
        <input class="form-control me-2" type="search" name='query' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>