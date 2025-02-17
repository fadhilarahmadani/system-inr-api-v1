<?php

namespace App\Http\Controllers\Api;

use App\Models\InrData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InrDataController extends Controller
{
    public function index()
    {
        //tes
        $data = InrData::with('auth')->get();
        return response()->json([
            'status' => 'True',
            'message' => 'success get data',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createInrData(Request $request)
    {
        $request->auth_id;
        $request-> name;
        $request-> photo_profile;
        $request-> class;
        $request-> status;
        InrData::create([
            'auth_id' => $request->auth_id,
            'name' => $request->name,
            'photo_profile' => $request->photo_profile,
            'class' => $request->class,
            'status' => $request->status
        ]);
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess create data InrData',
            'code' => 200,
            'data' => []
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = InrData::find($id);
        if ($data) {
            return response()->json([
                'status' => 'True',
                'messege' => 'Data Ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 'False',
                'messege' => 'Data Tidak Ditemukan',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = InrData::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => 'false',
                'messege' => 'Data tidak Ditemukan',
            ], 404);
        }

        $rules = [
            'auth_id' => 'Required',
            'name' => 'Required',
            'photo_profile' => 'Required',
            'class' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'False',
                'messege' => 'Gagal Melakukan Update Data',
                'data' => $validator->errors()
            ], 404);
        }


        $data->auth_id = $request->auth_id;
        $data->name = $request->name;
        $data->photo_profile = $request->photo_profile;
        $data->class = $request->class;
        $data->status = $request->status;
        $post = $data->save();

        return response()->json([
            'status' => 'True',
            'messege' => 'succes Melakukan Update data',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InrData::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => 'false',
                'messege' => 'Data tidak Ditemukan',
            ], 404);
        }
        $post = $data->delete();

        return response()->json([
            'status' => 'True',
            'messege' => 'succes Menghapus data',
        ], 200);
    }
}
