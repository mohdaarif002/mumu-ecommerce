@extends('master_layout')

@section('content')
<div class="container">

            <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Total Amount</th>
                            <th scope="col">GST(12.5%)</th>
                            <th scope="col">Delivery Charges(Fixed)</th>
                            <th scope="col">Grand Total</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                <th scope="row">{{$total}}</th>
                                <td>{{.125*($total)}}</td>
                                <td>40</td>
                                <td>{{.125*($total) + $total + 40}}</td>
                                </tr>
                            
                            </tbody>
                    </table>
            
                
             </div>
             <div class="row"> 

               <form method='POST' action='/order-place'> 
               @csrf      
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Payment Address</label>
                            <textarea class="form-control" name="paymentAddress" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>            
                       
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Payment Options</label>
                            <select class="form-control" name="paymentOption" id="exampleFormControlSelect1">
                            <option value='cod'>Cash on delivery</option>
                            <option value='online'>Online</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Order Place</button>
                        
                 </form>
             
             
             
             </div>
   



</div>
 
  
   


@endsection