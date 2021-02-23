@extends('master_layout')

@section('content')
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
                <h3 class="headingClass">Sign Up Page</h3>
                <form method='POST' id="signup_validate" action='signUP' class="formClass" data-parsley-validate>

                        <div class="mb-3">
                            @csrf
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" name='name' required data-parsley-pattern="^[a-zA-Z ]+$"
                             data-parsley-trigger="keyup" >
                        </div>
                        <div class="mb-3">
                        
                            <label for="exampleInputEmail1" class="form-label">Email Id</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp" required data-parsley-type="email" data-parsley-trigger="keyup">
                        
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name='password' required data-parsley-length="[4,12]" data-parsley-trigger="keyup">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name='password2' required data-parsley-minlength="4" data-parsley-equalto="#exampleInputPassword1" data-parsley-trigger="keyup">
                        </div>

                        <button type="submit" id="submitBtn"  class="btn btn-primary block">Submit </button>
                </form>
         </div>  
   </div>   
</div>              

@endsection