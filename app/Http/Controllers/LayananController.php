<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    //
    public function dataLayanan(Request $request){
        $data_layanan = Layanan::all();

        if($request->wantsJson()){
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Data Berhasil Diambil',
            //     'data' => $data_layanan,
            // ], 200);

            return $this->okResponse("Data Berhasil", $data_layanan);
        }
        return view('admin.layanan.data_layanan', compact('data_layanan'));
    }
}
