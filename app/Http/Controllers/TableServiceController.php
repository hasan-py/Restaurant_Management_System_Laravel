<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table_Service;
use Session;


class TableServiceController extends Controller
{
    function tableList() {
        $index = 1;
    	$tables = Table_Service::all();
    	return view('table_service.table-service',["tables"=>$tables,"index"=>$index]);
    }

    function postAddTable(Request $request) {
    	$newTable = new Table_Service;
    	$newTable->table_name = $request->input('table_name');
    	$newTable->total_customer = $request->input('total_customer');
        $newTable->created_at = date("Y-m-d h:i:sa");
    	$newTable->save();
    	Session()->flash('message',"Table added successfully.");
    	return redirect()->route('all-table');
    }

    function deleteTable($id){
    	$delete = Table_Service::find($id)->delete();
    	if($delete){
    		Session()->flash('message',"Table Delete successfully.");
    		return redirect()->route('all-table');
    	}else{
    		return redirect()->route('all-table');
    	}
    }

    function getEditTable($id){
        $table = Table_Service::find($id);
        return view('table_service.edit-table',["table"=>$table]);
    }

    function postEditTable(Request $request){
        $table = Table_Service::find($request->input('id'));
        $table->table_name = $request->input('table_name');
        $table->total_customer = $request->input('total_customer');
        $table->updated_at = date("Y-m-d h:i:sa");
        $table->save();
        Session()->flash('message',"Table edit successfully.");
        return redirect()->route('all-table');
    }
}
