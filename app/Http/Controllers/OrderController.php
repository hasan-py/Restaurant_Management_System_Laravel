<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Session;


class OrderController extends Controller
{
    function allOrder() {
        $index = 1;
    	$orders = Order::all();
    	return view('orders.all-order',["orders"=>$orders,"index"=>$index]);
    }

    function getAddOrder(){
    	return view('orders.add-order');
    }

    function postAddOrder(Request $request){
    	$newOrder = new Order;
    	$newOrder->customer_name = $request->input('customer_name');
    	$newOrder->customer_phone = $request->input('customer_phone');
    	$newOrder->order_accept_employee = $request->input('order_accept_employee');
    	$newOrder->table_name = $request->input('table_name');
    	$newOrder->total_food = $request->input('total_food');
    	$newOrder->total_price = $request->input('total_price');
        $newOrder->created_at = date("Y-m-d h:i:sa");
    	$newOrder->save();
    	Session()->flash('message',"Order added successfully.");
    	return redirect('orders/all-orders');
    }

}
