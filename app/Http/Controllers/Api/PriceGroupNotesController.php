<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PriceGroupNotes;
use Illuminate\Http\Request;

class PriceGroupNotesController extends Controller
{
    public function index()
    {
        $data = PriceGroupNotes::query()->get();
        return response()->json([
            'status' => 'True',
            'message' => 'success get data',
            'data' => $data
        ], 200);
    }
    public function createPriceGroupNotes(Request $request)
    {
        $request->donatur_id;
        $request-> price;
        $request-> description;
        $request-> type;
        PriceGroupNotes::create([
            'donatur_id' => $request->donatur_id,
            'price' => $request->price,
            'description' => $request->description,
            'type' => $request->type,
        ]);
        return response()->json([
            'status' => 'True',
            'message' => 'Sucess create data InrData',
            'code' => 200,
            'data' => []
        ], 200);
    }
}