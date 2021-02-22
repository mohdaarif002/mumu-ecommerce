<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_model;  //using eloquent model
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;


class product_controller extends Controller
{

    public function index(Request $req){
     
        $products=product_model::all();
        // return  $req->session()->all();
        // Session::forget(['alert-type', 'message']); 
// return $products;
        return view('product',['products'=> $products ]);
    }

    public function detail($id){
       $product= product_model::find($id);

       return view('detail',['product'=>$product]);
    }

    public function search(Request $req){
        $products= product_model::where('name','like','%'.$req->input('query').'%')->get();
//  return $products;
        return view('search',['products'=>$products]);
     }

     public function add_to_cart(Request $req){
// return $req->input();
        if( $req->session()->has('user')){
             
            $cart_item= new Cart;
            $cart_item->user_id=$req->session()->get('user')->id;
            $cart_item->product_id=$req->input('product_id');
            $cart_item->save();

            // $notification=[
            //     'alert-type'=>'success',
            //     'message'=>'Item is added to cart successfully.'
            // ];

            // $req->session()->put($notification);

            $req->session()->flash('alert-type','success');
            $req->session()->flash( 'message','Item is added to cart successfully.');

            return redirect('/');

        }else{
            return redirect('/login');
        }
     
     }

     public static function cart_items(){
        // return  Session::get('user')->id;// object we are getting   
        if( Session::has('user')){
            $total=Cart::where('user_id','=',Session::get('user')->id)->count();
           if($total){return $total;
           }else{
               return 0;
           }


        }
     }

     public function logout(Request $request){
        if( Session::has('user')){
            //     '
            //   Session::forget('user');
              $request->session()->pull('user');

            //   $notification=[
            //     'alert-type'=>'success',
            //     'message'=>'You have successfully Logged Out.'
            // ];
            // $request->session()->put($notification);

            $request->session()->flash('alert-type','success');
            $request->session()->flash( 'message','You have successfully Logged Out.');
            
            
            return redirect('/'); //stored in session as key=value
    
    
            }

     }

     public function cartList(Request $req){
        // return $req->session()->all();

      $list= DB::table('cart')
              ->join('products','cart.product_id','products.id')
              ->select('products.*','cart.id as cartId')
              ->where('cart.user_id',Session::get('user')->id)
              ->get();
            
// return count($list);
Session::forget(['alert-type', 'message']);

// return $req->session()->all();

             return view('cart_list',['products'=>$list]); 
     }

     public function removeProduct(Request $request, $cartId){
       
          Cart::destroy($cartId);
        //   $notification=[
        //     'alert-type'=>'error',
        //     'message'=>'Your cart Item is removed.'
        // ];
        // Session::put($notification);

            $request->session()->flash('alert-type','error');
            $request->session()->flash( 'message','Your cart Item is removed.');
        
          return redirect('/cart-list');

     }

     public function orderNow(){
        $total= DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',Session::get('user')->id)
        ->sum('products.price');


       return view('order',['total'=>$total]); 

     }

     public function orderPlace(Request $req){
        //  return $req->all();

        // return $req->input();

        $req->validate([
            'paymentOption' => 'required',
            'deliveryAddress' => 'required',
           
            
        ]);
      
        $user=Session::get('user');
         $userId=Session::get('user')->id;
        // return $req->input();
        $carts=Cart::where('user_id','=', $userId)->get();

        // return $carts;
if(empty($req->input('ProductId'))){
        foreach($carts as $cart){

            $order= new Order;
            $order->user_id =$cart['user_id'];
            $order->product_id =$cart['product_id'];
            $order->status ='pending';//or placed
            $order->paymentAddress =$req->deliveryAddress;
            $order->paymentOption =$req->paymentOption;
            if($req->paymentOption=='online'){
                
                $order->paymentStatus ='paid';  // because COD
            }else{
                $order->paymentStatus ='pending';  // because COD
            }
           
           
            $order->save();

        }
        Cart::where('user_id','=', $userId)->delete();

    }else{
        $order= new Order;
            $order->user_id =$user->id;
            $order->product_id =$req->input('ProductId');
            $order->status ='pending';//or placed
            $order->paymentAddress =$req->deliveryAddress;
            $order->paymentOption =$req->paymentOption;
            if($req->paymentOption=='online'){
                
                $order->paymentStatus ='paid';  // because COD
            }else{
                $order->paymentStatus ='pending';  // because COD
            }
           
           
            $order->save();


    }   

        // $notification=[
        //     'alert-type'=>'success',
        //     'message'=>'Your order placed successfully.'
        // ];
        // $req->session()->put($notification);

            $req->session()->flash('alert-type','success');
            $req->session()->flash( 'message','Your order placed successfully.');

        
        return redirect('/');
     }


     public function myOrder(){

       $orders= DB::table('orders')
        ->join('products','orders.product_id','products.id')
        ->where('orders.user_id',Session::get('user')->id)
        ->get();


       return view('my_order',['products'=>$orders]); 


     }

     public function buyNow(Request $req){
        
        
        $ProductId=$req->input('product_id');
        // return $ProductId;
             
        $total= DB::table('products')->find($req->input('product_id'));

       return view('order',['total'=>$total->price,
                            'ProductId'=>$ProductId
                           ]); 
     }
}
