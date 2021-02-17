@extends('master_layout')

@section('content')
<h3 style="text-align:center;">Sign Up Page</h3>
<form method='POST' action='signUP'>

        <div class="mb-3">
            @csrf
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName" name='name' >
        </div>
        <div class="mb-3">
        
            <label for="exampleInputEmail1" class="form-label">Email Id</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
        
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name='password' >
        </div>

        <button type="submit" class="btn btn-primary">SignUp </button>
</form>

@endsection