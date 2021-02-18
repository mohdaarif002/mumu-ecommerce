@extends('master_layout')

@section('content')
@if($errors->any())
    <!-- {{ implode('', $errors->all()) }} -->
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3 style="text-align:center;">Login Page</h3>
<form method='POST' action='login'>
  <div class="mb-3">
  @csrf
    <label for="exampleInputEmail1" class="form-label">Email Id</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password' >
  </div>

  <button type="submit" class="btn btn-primary">Login </button>
  

</form>

@endsection

