<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="{{URL::asset('css/custom.css')}}">


</head>
<body>
    @section('header')
      {{ View::make('header')}}
    @show
<div class="content">
@section('content')

 @show
</div>
    

@section('footer')
{{ View::make('footer')}}
@show
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

let type="{{Session::get('alert-type')}}";
let err_msg="";

// alert({{$errors}});
// @if ($errors->any())

// type='error';

//             @foreach ($errors->all() as $error)
//                 alert({{ $error }});
//             @endforeach
//                   
// @endif


//   alert(type);
  
//   toastr.success(type);
  if(type=="success"){
  		toastr.success("{{ Session::get('message') }}");
  }
 

 if(type=="warning"){
  		toastr.warning("{{ Session::get('message') }}");
 }


 if(type=="error"){
  		toastr.error("{{ Session::get('message') }}");
 }
type="";
  
   </script>
   <!-- {{Session::forget(['alert-type', 'message'])}}  -->
</body>
</html>