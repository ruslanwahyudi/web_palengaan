<?php

namespace App\Http\Controllers;

use App\Models\TransaksiLayanan;
use Illuminate\Http\Request;

class TransaksiLayananController extends Controller
{
    //
    public function checklistLayanan($id){
        $transaksi_layanan = TransaksiLayanan::find($id);
        $status = '0';
        $message = '';
        if($transaksi_layanan->status_transaksi == '0'){
            $transaksi_layanan->status_transaksi = '1';
            $message = 'Layanan Berhasil disetujui';
        }elseif($transaksi_layanan->status_transaksi == '1'){
            $transaksi_layanan->status_transaksi = '2';
            $message = 'Layanan Berhasil ditanda tangani';
        }
        
        $transaksi_layanan->update();

        $notification = array(
            'message' => $message,
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
