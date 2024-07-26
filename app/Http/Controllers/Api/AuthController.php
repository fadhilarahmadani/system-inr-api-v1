<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function index()
    {
        $authData = Auth::select('nri', 'password')->get();

        return response()->json([
            'status' => 'True',
            'message' => 'Success get auth data',
            'data' => $authData
        ], 200);
    }

    public function createAuth(Request $req)
    {
        $auth = Auth::where('nri', $req->nri)->first();
        if ($auth == null) {
            Auth::create([
                'nri' => $req->nri,
                'password' => bcrypt($req->password), // Amankan password dengan bcrypt
            ]);
            return response()->json([
                'status' => 'True',
                'message' => 'Success create data auth',
                'code' => 200,
                'data' => []
            ], 200);
        } else {
            return response()->json([
                'status' => 'False',
                'message' => 'The data already exists',
                'code' => 400,
                'data' => []
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nri' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $auth = Auth::user(); // Ambil data pengguna yang terotentikasi
            $data = [
                "status" => true,
                "message" => "Success Login",
                "data" => [
                    "authData" => [
                        "nri" => $auth->nri,
                        "password" => $auth->password,
                    ],
                ],
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                "status" => false,
                "message" => "NRI or password incorrect"
            ];
            return response()->json($data, 400);
        }
    }

    public function logout(Request $request)
    {
        // Tidak ada operasi yang perlu dilakukan untuk logout jika tidak menggunakan token.
        $data = [
            "status" => true,
            "message" => "Logout successful"
        ];
        return response()->json($data, 200);
    }
}