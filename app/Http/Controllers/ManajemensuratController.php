<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManajemensuratRequest;
use App\Http\Requests\UpdateManajemensuratRequest;
use App\Models\Manejemensurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManajemensuratController extends Controller
{
    //
    public $title = "Manajemen Surat";
    public $model = "Manajemen Surat";
    public $description = "Manajemen Surat";

    public function allManejemensurat(Request $request){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        if($request->filled('q')){ // jika ada query pencarian
            $data = Manejemensurat::with('user')->search($request->q)->paginate(4);
        }else{
            $data = Manejemensurat::with('user')->latest()->paginate(5);
        }
        // dd($data);
        return view('admin.manajemensurat.all_manajemensurat', compact('data','page'));
    }

    public function addManejemensurat(){
        $data = [
            'model' => new Manejemensurat(),
            'method' => 'POST',
            'route' => ['store.manajemensurat'],
            'button' => 'Simpan',
            'pegawai' => User::all(),
        ];
        // dd($data);

        return view('admin.manajemensurat.form_manajemensurat', $data);
    }

    public function storeManejemensurat(Request $request, StoreManajemensuratRequest $storeManajemensuratRequest){
        // dd($request->category_id);
        // DB::connection()->enableQueryLog();
        $storeManajemensuratRequest = $storeManajemensuratRequest->validated();
        if($request->file('lampiran')){ // jika ada
            $file = $request->file('lampiran');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            if($file->move(public_path('uploads/admin_images/surat_masuk'),$filename)){ // berhasil upload
                
            }else{

            }
            $storeManajemensuratRequest['lampiran'] = $filename;
        }
        $manajemensurat = Manejemensurat::create($storeManajemensuratRequest);
        // $queries = DB::getQueryLog();
        // dd($queries);
        if($manajemensurat){
            return response()->json([
                'message' => 'Data Surat Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editManejemensurat ($id){

        $data = Manejemensurat::findOrFail($id);
        $data = [
            'model' => Manejemensurat::with('user')->findOrFail($id),
            'method' => 'POST',
            'route' => ['update.manajemensurat', $id],
            'button' => 'Update',
            'pegawai' => User::all(),
        ];

        // dd($data);

        return view('admin.manajemensurat.form_manajemensurat', $data);

    }

    public function updateManejemensurat(Request $request, UpdateManajemensuratRequest $updateManajemensuratRequest, $id){
        $updateManajemensuratRequest = $updateManajemensuratRequest->validated();

        $manajemensurat = Manejemensurat::findOrFail($id);

        // jika upload foto profil
        $imageName_old = $manajemensurat->lampiran;
        if($request->file('lampiran')){ // jika ada
            $file = $request->file('lampiran');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            if($file->move(public_path('uploads/admin_images/surat_masuk/'),$filename)){
                Storage::disk('public_upload_suratmasuk')->delete("{$imageName_old}");
            }else{

            }
            $updateManajemensuratRequest['lampiran'] = $filename;
        }

        $manajemensurat->fill($updateManajemensuratRequest);
        $manajemensurat->save();

        return response()->json([
            'message' => 'Data Surat Berhasil Diupdate'
        ], 200);

    }
}
