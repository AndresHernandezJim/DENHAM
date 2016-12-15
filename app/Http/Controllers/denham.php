<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class denham extends Controller
{
    private function num_to_date($num){
        switch($num){
            case 1:
                return 'ENE';
                break;
            case 2:
                return 'FEB';
                break;
            case 3:
                return 'MAR';
                break;
            case 4:
                return 'ABR';
                break;
            case 5:
                return 'MAY';
                break;
            case 6:
                return 'JUN';
                break;
            case 7:
                return 'JUL';
                break;
            case 8:
                return 'AGO';
                break;
            case 9:
                return 'SEP';
                break;
            case 10:
                return 'OCT';
                break;
            case 11:
                return 'NOV';
                break;
            default:
                return 'DIC';
        }
    }

    public function index2(){
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
    	//dd($data);
    	return view('welcome',$data);
    }

    public function index(){
    	return view('index');
    }

    public function ventas(){
        $data = [
            'anio' => \DB::table('facturacion_media_view as f')
                ->select(\DB::raw('YEAR(fecha) as anio'))
                ->orderBy('anio')
                ->groupBy(\DB::raw('YEAR(f.fecha)'))
                ->get()
        ];
    	return view('ventas',$data);
    }

    public function query_venta(Request $request){
        if($request->ajax()){
            $data = \DB::table('facturacion_media_view as f')
               ->select(
                   \DB::raw('ROUND(AVG(media),2) as media'),
                   \DB::raw('MONTH(f.fecha) as mes')
               )
               ->where(\DB::raw('YEAR(f.fecha)'),$request->input('id'))
               ->groupBy(\DB::raw('MONTH(f.fecha)'))
               ->orderBy('mes')
               ->get();
            foreach($data as $val)
                $anual[] = $val->media;
            $anual = array_sum($anual) / count($anual);

            $resp = [['Mes','Media','ANUAL']];
            foreach($data as $key => $val){
                $resp[] = [
                    $this->num_to_date($val->mes),
                    (float)$val->media,
                    (float)$anual
                ];
            }
            $data = [
                'data' => $resp
            ];
            echo json_encode($data);
        }
        else
            abort(403);
    }

    public function productos(){
        $data = [
            'productos_max'=>\DB::table('venta_producto_view as v')
                ->select(
                    'id',
                    \DB::raw('SUM(cantidad) as cantidad'),
                    'producto'
                )
                ->groupBy('producto')
                ->groupBy('id')
                ->limit(10)
                ->orderby('cantidad','desc')
                ->get(),
            'productos_min'=>\DB::table('venta_producto_view as v')
                ->select(
                    'id',
                    \DB::raw('SUM(cantidad) as cantidad'),
                    'producto'
                )
                ->groupBy('producto')
                ->groupBy('id')
                ->limit(10)
                ->orderby('cantidad','asc')
                ->get()
        ];
    	return view('productos',$data);
    }

    public function query_producto(Request $request){
        $id = $request->input('ids');
        $res = \DB::table('venta_producto_view')
            ->select(
                'producto',
                'fecha',
                \DB::raw('SUM(cantidad) as cantidad')
            )
            ->whereIn('id',$id)
            ->groupBy('fecha')
            ->groupBy('producto')
            ->orderBy('fecha')
            ->get();

        foreach($res as $item)
            $structure[$item->producto][] = [(int)$item->cantidad,date('d/m/y',strtotime($item->fecha))];

        $data[] = 'FECHA';
        $data2 = [];
        foreach($structure as $header => $content){
            $data[] = $header;
            foreach($content as $key => $item){
                $data2[$key][0] = $item[1];
                $data2[$key][array_search($header, $data)] = $item[0];

            }
        }
        $ret[] = (array)$data;
        foreach ($data2 as $item)
            if(count($item) == count($data))
                $ret[] = (array)$item;

        echo json_encode($ret);

    }

    public function categorias(){
        $data = [
            'categorias' => \DB::table('venta_categoria_view')->get()
        ];
    	return view('categorias',$data);
    }

   public function clientes(){
        $data = [
            'clientes' => \DB::table('mayor_consumo_view')
            ->orderBy('precio','DESC')
            ->limit(10)
            ->get()
        ];
    	return view('clientes',$data);
    }

    public function query_cliente(Request $request){
        $id = $request->input('id');
        $data = \DB::table('mayor_compra_view')
            ->where('id',$id)
            ->orderBy('cantidad','DESC')
            ->get();
        echo json_encode($data);
    }
}
