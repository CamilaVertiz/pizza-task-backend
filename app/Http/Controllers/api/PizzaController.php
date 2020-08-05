<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Order;
use App\OrderProducts;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pizzas = Pizza::get();
        
        return response()->json($pizzas, 200);
    }

    public function order(Request $request) {
        $input = $request->all();
        $cart = $input['cart'];
        $client = $input['client'];        
        $errores = array();

        $rules = array(
            'email'       => 'required|min:3|max:255',
            'firstname'   => 'required|min:3|max:255',
            'lastname'    => 'required|min:3|max:6',
            'address'     => 'required|min:3|max:1024',
            'phone'       => 'required|min:3|max:1024',
            'city'        => 'required|min:3|max:1024',
            'clientstate' => 'required|min:3|max:1024',
            'zip'         => 'required|min:3|max:1024',
            'quantity'    => 'required',
            'total'       => 'required'
        );

        $validator = Validator::make($client, $rules);

        if($validator->fails() || sizeof($errores) > 0) {
          $response['status'] = 'false';
          return response()->json($response);
        } 

        $order = new Order();
        $order->email = $client['email'];    
        $order->firstname = $client['firstname'];    
        $order->lastname = $client['lastname'];      
        $order->address = $client['address'];         
        $order->phone = $client['phone'];   
        $order->city = $client['city'];    
        $order->state = $client['clientstate'];    
        $order->zip = $client['zip'];    
        $order->total_products = $client['quantity'];    
        $order->total = $client['total'];           
        $order->save();

        foreach ($cart as $key => $cart) {
             $orderProducts = new OrderProducts();
             $orderProducts->order_id = $order->id;        
             $orderProducts->pizza_id = $cart['id'];        
             $orderProducts->quantity = $cart['qty'];        
             $orderProducts->save();
        }

        /* fake payment process  */
        $paymentResult = true;
        $payment = new Payment();

        if($paymentResult){
            $payment->status = 'paid';
            $payment->order_id = $order->id;       
            $payment->save();

            return response()->json('Order has been processed!', 200);
        }else{            
            $payment->status = 'failed';
            $payment->order_id = $order->id;       
            $payment->save();     

            return response()->json('Oops theres been a problem with the payment.', 200);
        }        
    }
}
