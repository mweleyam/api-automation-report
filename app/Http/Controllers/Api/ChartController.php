<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ChartController extends Controller
{
    public function total_scenario(){
        $chart = DB::select("SELECT DISTINCT concat (concat (squad, ' ( ', service), ' )') as service, total_scenario FROM automations a;");

        if($chart){
            $data = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $chart
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'status' => 404,
                'message'=> 'no records found!',
                'data'=> $chart
            ];
            return response()->json($data, 404);
        }
    }
}
