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
<div class="container-fluid">
  <div class="row formWrapper">
      <div class="col-sm-6 col-md-4">
          <h3 class="headingClass">Login Page</h3>
          <form method='POST' action='login' class="formClass" data-parsley-validate>
            <div class="mb-3">
            @csrf
              <label for="exampleInputEmail1" class="form-label">Email Id</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp" required data-parsley-type="email" data-parsley-trigger="keyup">
          
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name='password' required data-parsley-length="[4,12]" >
            </div>

            <button type="submit" class="btn btn-primary block">Login </button>
      

          </form>
      </div>  
   </div>   
</div>
@endsection

