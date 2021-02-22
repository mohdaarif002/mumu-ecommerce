<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\user_model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;


class user_controller extends Controller
{
    public function login(Request $req){
       
         $req->validate([
            'email' => 'required|email|min:5',
            'password' => 'required',
        ]);
       
        $validator = Validator::make($req->all(), [ 'email' => 'required|email', 'password' => 'required', ]);
        
        if($validator->fails()) {
            // $err=$validator->errors();

            // $messages = $validator->messages();
// return var_dump($messages);
        //    return  implode('',$messages->messages );
            // return $messages;
    return redirect('/login');
            
         

            // foreach ($validator->errors() as $key=>$value) {
            //     return 2345;
            // }
        //    return $validator->errors();
            // $notification=[
            //     'alert-type'=>'error',
            //     'message'=>$err
            // ];

            // $req->session()->put($notification);

          
            // return redirect('/login');
        }
 
        // return $req->input();
        $user=DB::table('users')->where('email','=', $req->input('email'))->first();//object returned
       

        if (!empty($user)  && Hash::check($req->password,$user->password)){
            $req->session()->put('user',$user);

            
            $notification=[
                'alert-type'=>'success',
                'message'=>'You have successfully Logged In.'
            ];

            // $req->session()->flash('alert-type','success');
            // $req->session()->flash('message','You have successfully Logged In.');
            // $req->session()->put($notification);

            $req->session()->flash('alert-type','success');
            $req->session()->flash( 'message','You have successfully Logged In.');

            // return  $req->session()->all();
            // return redirect('/')->with('type','success'); //stored in session as key=value
            return redirect('/');

        }else{

            $notification=[
                'alert-type'=>'error',
                'message'=>'User not found.'
            ];
            $req->session()->put($notification);
            return redirect('/');
        }
  
    }

    public function signup(Request $req){
        $req->validate([
            'name'=>'required',
            'email' => 'required|email|min:5|unique:users',
            'password' => 'required',
        ]);
       

        $validator = Validator::make($req->all(), [ 'email' => 'required|email', 'password' => 'required',
                                             'name'=>'required'
        ]);
        
        if($validator->fails()) {
            // $err=$validator->errors();
            
            // $notification=[
            //     'alert-type'=>'error',
            //     'message'=>$err
            // ];

            // $req->session()->put($notification);

            return redirect('/signup');
        }  

        // return $req->input();

        $user= new user_model;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();

        // $notification=[
        //     'alert-type'=>'success',
        //     'message'=>'You have successfully Signed up.'
        // ];
        // $req->session()->put($notification);
            $req->session()->flash('alert-type','success');
            $req->session()->flash( 'message','You have successfully Signed up.');
      return redirect('/');

    }
}
