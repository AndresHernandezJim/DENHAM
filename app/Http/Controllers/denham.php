<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class denham extends Controller
{
    public function index(){
    	$data=array(

    	'uno'=>\DB::table('orders as O')
    		->join('order_details as od','od.OrderID','=','O.OrderID')
    		->join('Customers as C','O.CustomerID','=','C.CustomerID')
	    	->select(
	    		\DB::raw('Round(sum((OD.Quantity * OD.UnitPrice)-(OD.Quantity * OD.UnitPrice * OD.Discount)),2) as precio'),
	    		'C.CompanyName as Cliente'
	    		)
	    	->groupBy('C.CompanyName')
	    	->orderby(\DB::raw('Round(sum((OD.Quantity * OD.UnitPrice) - (OD.Quantity * OD.UnitPrice * OD.Discount)),2)'),'DESC')
	    	->limit(10)
	    	->get(),
	    	'dos'=>\DB::table('Orders as o')
	    			->join('order_details as od','o.OrderID','=','od.OrderID')
	    			->join('Products as p','p.ProductID','=','od.ProductID')
	    			->select(\DB::raw('Round(sum((OD.Quantity * OD.UnitPrice)-(OD.Quantity * OD.UnitPrice * OD.Discount)),2) as precio'),'p.ProductName')
	    			->groupBy('p.ProductName')
	    			->orderby(\DB::raw('Round(sum((OD.Quantity * OD.UnitPrice) - (OD.Quantity * OD.UnitPrice * OD.Discount)),2)'),'DESC')
	    			->limit(10)
	    			->get(),
	    	);
    	dd($data);
    	return view('welcome',$data);
    }
}