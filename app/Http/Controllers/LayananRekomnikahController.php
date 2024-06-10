<?php

namespace App\Http\Controllers;

use App\Models\TransaksiLayanan;
use Illuminate\Http\Request;

class LayananRekomnikahController extends Controller
{
    //
    public function dataRekomnikah(){
        $data_rekomnikah = TransaksiLayanan::join('layanan_rekomnikah', 'layanan_rekomnikah.transaksi_id', '=', 'transaksi_layanan.id')
              		// ->join('city', 'city.state_id', '=', 'state.state_id')
              		->get(['layanan_rekomnikah.*', 'transaksi_layanan.*', 'transaksi_layanan.id as id_transaksi']);
        return view('admin.layanan.rekomnikah.data_rekomnikah', compact('data_rekomnikah'));
    }
}
