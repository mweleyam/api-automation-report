<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Automations;
use Illuminate\Http\Request;
use Validator;

class AutomationController extends Controller
{
    public function index(){
        // return response()->json([]);
        // return 'weleyam here';
        $automations = Automations::orderBy("created_at","desc")->paginate(10);

        if($automations->count() > 0){
            $data = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $automations
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'status' => 404,
                'message'=> 'no records found!',
                'data'=> $automations
            ];
            return response()->json($data, 404);
        }

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'squad' => 'required',
            'service' => 'required',
            'environment' => 'required',
            'total_feature' => 'required|integer',
            'total_scenario' => 'required|integer',
            'total_success' => 'required|integer',
            'total_pending' => 'required|integer',
            'total_failed' => 'required|integer',
            'sucess_rate' => 'numeric|between:0,100.00',
            'duration' => 'required|integer',
            'url_report' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'message'=> $validator->errors()
            ], 422);
        }else{
            $automations = Automations::create([
                'squad' => $request->squad,
                'service' => $request->service,
                'environment' => $request->environment,
                'total_feature' => $request->total_feature,
                'total_scenario' => $request->total_scenario,
                'total_success' => $request->total_success,
                'total_pending' => $request->total_pending,
                'total_failed' => $request->total_failed,
                'sucess_rate' => $request->sucess_rate,
                'duration' => $request->duration,
                'url_report' => $request->url_report
            ]);
            if($automations){
                return response()->json([
                    'status'=> 200,
                    'message'=> 'automation report sucessfully submitted',
                    'data'=> $automations
                ], 200);
            }else{
                return response()->json([
                    'status'=> 500,
                    'message'=> 'something went wrong!'
                ],500);
            }
        }
    }

    public function show($id){
        $automations = Automations::find($id);
        if($automations){
            $data = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $automations
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'status' => 404,
                'message'=> 'data not found!',
                'data'=> $automations
            ];
            return response()->json($data, 404);
        }
    }

    public function edit($id){
        $automations = Automations::find($id);
        if($automations){
            $data = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $automations
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'status' => 404,
                'message'=> 'data not found!',
                'data'=> $automations
            ];
            return response()->json($data, 404);
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'squad' => 'required',
            'service' => 'required',
            'environment' => 'required',
            'total_feature' => 'required|integer',
            'total_scenario' => 'required|integer',
            'total_success' => 'required|integer',
            'total_pending' => 'required|integer',
            'total_failed' => 'required|integer',
            'sucess_rate' => 'numeric|between:0,100.00',
            'duration' => 'required|integer',
            'url_report' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'message'=> $validator->errors()
            ], 422);
        }else{
            $automations = Automations::find($id);

            if($automations){
                $automations->update([
                    'squad' => $request->squad,
                    'service' => $request->service,
                    'environment' => $request->environment,
                    'total_feature' => $request->total_feature,
                    'total_scenario' => $request->total_scenario,
                    'total_success' => $request->total_success,
                    'total_pending' => $request->total_pending,
                    'total_failed' => $request->total_failed,
                    'sucess_rate' => $request->sucess_rate,
                    'duration' => $request->duration,
                    'url_report' => $request->url_report
                ]);

                return response()->json([
                    'status'=> 200,
                    'message'=> 'automation report sucessfully updated',
                    'data'=> $automations
                ], 200);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'automation report not found!'
                ],404);
            }
        }
    }
    public function destroy($id){
        $automations = Automations::find($id);
        if($automations){
            $automations->delete();
            $data = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $automations
            ];
            return response()->json([
                'status'=> 200,
                'message'=> 'automation report sucessfully deleted',
                'data'=> $automations
            ], 200);
        }else{
            $data = [
                'status' => 404,
                'message'=> 'data not found!',
                'data'=> $automations
            ];
            return response()->json($data, 404);
        }

    }
}
