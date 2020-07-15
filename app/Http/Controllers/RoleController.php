<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class RoleController extends Controller
{
    function allEmployee(){
    	$index = 1;
    	$users = User::where("role","employee")->get();
    	return view('employee.all-employee',["users"=>$users,"index"=>$index]);
    }

    function allCustomer(){
    	$index = 1;
    	$users = User::where("role","customer")->get();
    	return view('customer.all-customer',["users"=>$users,"index"=>$index]);
    }
}
