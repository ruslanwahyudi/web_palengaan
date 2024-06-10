<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSakipRequest;
use App\Models\Sakip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SakipController extends Controller
{
    //
    //
    public $title = "Data Sakip";
    public $model = "Sakip";
    public $description = "Sakip";

    //
    public function dataSakip(Request $request){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        if($request->filled('q')){ // jika ada query pencarian
            $data = Sakip::search($request->q)->paginate(4);
        }else{
            $data = Sakip::latest()->paginate(5);
        }
        return view('admin.sakip.all_sakip', compact('data','page'));
    }

    public function addSakip(){
        $data = [
            'model' => new Sakip(),
            'method' => 'POST',
            'route' => ['store.sakip'],
            'button' => 'Simpan',
        ];
        // dd($data);

        return view('admin.sakip.form_sakip', $data);
    }

    public function storeSakip(Request $request, StoreSakipRequest $storeSakipRequest){
        // dd($request->category_id);
        $storeSakipRequest = $storeSakipRequest->validated();
        if($request->file('image')){ // jika ada
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/sakip'),$filename)){ // berhasil upload
                // Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $storeSakipRequest['image'] = $filename;
        }
        $sakip = Sakip::create($storeSakipRequest);

        
        if($sakip){
            return response()->json([
                'message' => 'Data Sakip Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editSakip ($id){

        $data = Sakip::findOrFail($id);
        $data = [
            'model' => Sakip::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.sakip', $id],
            'button' => 'Update',
        ];

        // dd($data);

        return view('admin.sakip.form_sakip', $data);

    }

    public function updateSakip(Request $request, StoreSakipRequest $storeSakipRequest, $id){
        $storeSakipRequest = $storeSakipRequest->validated();

        $sakip = Sakip::findOrFail($id);

        // jika upload foto profil
        $imageName_old = $sakip->image;
        if($request->file('image')){ // jika ada
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/sakip/'),$filename)){
                Storage::disk('public_upload_sakip')->delete("{$imageName_old}");
            }else{

            }
            $storeSakipRequest['image'] = $filename;
        }

        $sakip->fill($storeSakipRequest);
        $sakip->save();

        return response()->json([
            'message' => 'Data Sakip Berhasil Diupdate'
        ], 200);

    }

    public function deleteSakip($id)  {
        $data = Sakip::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Sakip Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.sakip')->with($notification);
    }
}
