<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratTugasRequest;
use App\Http\Requests\UpdateSuratTugasRequest;
use App\Models\Surattugas;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;

class SurattugasController extends Controller
{
    //
    public $title = "Surat Tugas";
    public $model = "Surat Tugas";
    public $description = "Surat Tugas";

    public function allSurattugas(Request $request){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        if($request->filled('q')){ // jika ada query pencarian
            $data = Surattugas::with('user')->search($request->q)->paginate(4);
        }else{
            $data = Surattugas::with('user')->latest()->paginate(5);
        }
        // dd($data);
        return view('admin.pegawai.surat_tugas.all_surattugas', compact('data','page'));
    }

    public function addSurattugas(){
        $data = [
            'model' => new Surattugas(),
            'method' => 'POST',
            'route' => ['store.surat_tugas'],
            'button' => 'Simpan',
            'pegawai' => User::all(),
            // 'tags' => Tag::all(),
        ];
        // dd($data);

        return view('admin.pegawai.surat_tugas.form_surattugas', $data);
    }

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
            return response()->json([
                'message' => 'Data Surat Tugas Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editSurattugas ($id){

        $data = Surattugas::findOrFail($id);
        $data = [
            'model' => Surattugas::with('user')->findOrFail($id),
            'method' => 'POST',
            'route' => ['update.surat_tugas', $id],
            'button' => 'Update',
            'pegawai' => User::all(),
        ];

        // dd($data);

        return view('admin.pegawai.surat_tugas.form_surattugas', $data);

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

        return response()->json([
            'message' => 'Data Surat Tugas Berhasil Diupdate'
        ], 200);

    }

    public function cetakSurattugas($id)  {
        $file_bukti = Surattugas::with('user')->findOrFail($id)->file_bukti;
        $data = [
            'model' => Surattugas::with('user')->findOrFail($id),
            'method' => 'POST',
            'route' => ['update.surat_tugas', $id],
            'button' => 'Update',
            'img_tugas' => asset('')."uploads/admin_images/surat_tugas/".$file_bukti,
        ];
        
        // dd(asset('')."uploads/admin_images/surat_tugas/".$file_bukti);
        
        $pdf = \PDF::loadView('admin.pegawai.surat_tugas.cetak_surattugas', $data)->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan-Data-Santri.pdf');

        // return redirect()->route('all.article')->with($notification);
    }

    public function deleteSurattugas($id){
        $surattugas = Surattugas::findOrFail($id);
        // remove gambar
        $imageName_old = $surattugas->file_bukti;
        Storage::disk('public_upload_surattugas')->delete("{$imageName_old}");
        $surattugas->delete();

        $notification = array(
            'message' => 'Surat Tugas Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.surat_tugas')->with($notification);
    }
}
