<?php

namespace App\Http\Controllers;

use App\Models\LayananSktm;
use App\Models\TransaksiLayanan;
use Illuminate\Http\Request;

class LayananSktmController extends Controller
{
    //
    public function dataSktm(){
        // $data_sktm = LayananSktm::all();
        // $data_sktm = TransaksiLayanan::with('sktm')->whereRelation('category','user_id',2)->first();
        $data_sktm = TransaksiLayanan::join('layanan_sktm', 'layanan_sktm.transaksi_id', '=', 'transaksi_layanan.id')
              		// ->join('city', 'city.state_id', '=', 'state.state_id')
              		->get(['layanan_sktm.*', 'transaksi_layanan.*', 'transaksi_layanan.id as id_transaksi']);
        // dd($data_sktm);
        return view('admin.layanan.sktm.data_sktm', compact('data_sktm'));
    }
}
