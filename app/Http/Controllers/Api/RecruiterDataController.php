<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\RecruiterData;
use App\Http\Controllers\Controller;

class RecruiterDataController extends Controller
{
    public function index()
    {
        $data = RecruiterData::with('auth')->get();
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess get data',
            'code' => 200,
            'data' => $data
        ], 200);
    }

    public function createRecruiterData(Request $request)
    {
        $request->auth_id;
        $request->name;
        $request->photo_profile;
        $request->class;
        $request->status;
        $request->type_proses;
        RecruiterData::create([
            'auth_id' => $request->auth_id,
            'name' => $request->name,
            'photo_profile' => $request->photo_profile,
            'class' => $request->class,
            'status' => $request->status,
            'type_proses' => $request->type_proses
        ]);
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess create Recruiter Data',
            'code' => 200,
            'data' => []
        ], 200);
    }
}