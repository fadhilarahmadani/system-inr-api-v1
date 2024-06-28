<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return 'Auth';
    }
    public function createAuth(Request $req)
    {
        $auth = Auth::where('nri', $req->nri)->first();
        if ($auth == null) {
            Auth::create([
                'nri' => $req->nri,
                'password' => $req->password,
            ]);
            return response()->json([
                'status' => 'True',
                'message' => 'Sucess create data auth',
                'code' => 200,
                'data' => []
            ], 200);
        } else {
            return response()->json([
                'status' => 'False',
                'message' => 'the data already exists',
                'code' => 400,
                'data' => []
            ], 400);
        }
    }
    public function auth()
    {
        return 'loginAuth';
    }
}
