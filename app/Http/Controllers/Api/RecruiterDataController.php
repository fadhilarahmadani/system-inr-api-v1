<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\RecruiterData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RecruiterDataController extends Controller
{
    public function index()
    {
        //tes
        $data = RecruiterData::with('auth')->get();
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess get data',
            'code' => 200,
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $data = new RecruiterData();

        $rules = [
            'auth_id' => 'Required',
            'name' => 'Required',
            'photo_profile' => 'Required',
            'class' => 'required',
            'status' => 'required',
            'type_proses' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'False',
                'messege' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ], 404);
        }


        $data->auth_id = $request->auth_id;
        $data->status = $request->status;
        $data->total_price = $request->total_price;
        $post = $data->save();

        return response()->json([
            'status' => 'True',
            'messege' => 'Data Tersimpan',
        ], 200);
    }
}