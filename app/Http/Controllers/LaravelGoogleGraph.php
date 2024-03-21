<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
        $data = DB::table('orders')
            ->select(
                DB::raw('delivery_status as delivery_status'),
                DB::raw('count(*) as number'))
            ->groupBy('delivery_status')
            ->get();
    
            $array[] = ['delivery_status' , 'Number'];
            
            foreach($data as $key => $value)
            {
                $array[++$key] = [$value->delivery_status, $value->number];
            }
            return view('google_pie_chart')->with('delivery_status', json_encode($array));
    }
}
