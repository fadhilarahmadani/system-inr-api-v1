<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tes
        $data = Donatur::with('priceGroupNotes')->with(['auth' => function ($query) {
            $query->with('inrData');
        }])->get();
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess get data',
            'code' => 200,
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Donatur;

        $rules = [
            'auth_id' => 'Required',
            'status' => 'Required',
            'total_price' => 'Required',
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Donatur::find($id);
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
        $data = Donatur::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => 'false',
                'messege' => 'Data tidak Ditemukan',
            ], 404);
        }

        $rules = [
            'auth_id' => 'Required',
            'status' => 'Required',
            'total_price' => 'Required',
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
        $data->status = $request->status;
        $data->total_price = $request->total_price;
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
        $data = Donatur::find($id);
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