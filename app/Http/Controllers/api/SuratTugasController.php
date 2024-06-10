<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuratTugasRequest;
use App\Http\Requests\UpdateSuratTugasRequest;
use App\Models\Surattugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratTugasController extends Controller
{
    //
    public function storeSurattugas(Request $request, SuratTugasRequest $suratTugasRequest){
        // dd($request->category_id);
        $suratTugasRequest = $suratTugasRequest->validated();
        if($request->file('file_bukti')){ // jika ada
            $file = $request->file('file_bukti');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/surat_tugas'),$filename)){ // berhasil upload
                // Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $suratTugasRequest['file_bukti'] = $filename;
        }
        $surattugas = Surattugas::create($suratTugasRequest);

        if($surattugas){
            return $this->createdResponse("Data Berhasil", $surattugas);
        }
        
    }

    public function updateSurattugas(Request $request, UpdateSuratTugasRequest $suratTugasRequest, $id){
        $suratTugasRequest = $suratTugasRequest->validated();

        $surattugas = Surattugas::findOrFail($id);

        // jika upload foto profil
        $imageName_old = $surattugas->file_bukti;
        if($request->file('file_bukti')){ // jika ada
            $file = $request->file('file_bukti');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/surat_tugas/'),$filename)){
                Storage::disk('public_upload_surattugas')->delete("{$imageName_old}");
            }else{

            }
            $suratTugasRequest['file_bukti'] = $filename;
        }

        $surattugas->fill($suratTugasRequest);
        $surattugas->save();

        if($surattugas){
            return $this->createdResponse("Data Berhasil Diupdate", $surattugas);
        }

    }
}
