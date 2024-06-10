<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StorePegawaiRequest;

use App\DataTables\PegawaisDataTable;
use App\DataTables\UserDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Requests\Pegawai\StorePegawaiRequest;
use App\Http\Requests\Pegawai\UpdatePegawaiRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class PegawaiController extends Controller
{
    //
    public function index(){
        $users = User::latest()->paginate(10);

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('daftar.pegawai', compact('users'));
    }
    public function daftarPegawai(Request $request, UsersDataTable $dataTable){
        if($request->filled('q')){ // jika ada query pencarian
            $daftarPegawai = User::search($request->q)->paginate(4);
        }else{
            $daftarPegawai = User::latest()->paginate(4);
        }
        
        return view('admin.pegawai.daftar_pegawai', compact('daftarPegawai'));
        dd($dataTable);

        // datatable yajra
        // return $dataTable->render('admin.pegawai.daftar_pegawaiv2');
    }
    public function tambahPegawai(){
        $data = [
            'model' => new User(),
            'method' => 'POST',
            'route' => ['store.pegawai'],
            'button' => 'Simpan',
            'role' => Role::all(),
        ];

        return view('admin.pegawai.form_pegawai', $data);
    }
    public function  storePegawai(StorePegawaiRequest $request){
        $requestData = $request->validated();

        $requestData['password'] = Hash::make('asdf');
        if($request->file('photo')){ // jika ada
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images'),$filename)){ // berhasil upload
                // Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $requestData['photo'] = $filename;
        }


        User::create($requestData);

        $notification = array(
            'message' => 'Data Pegawai Berhasil disimpan',
            'alert-type' => 'success'
        );

        // return redirect()->route('daftar.pegawai')->with($notification);


        return response()->json([
            'message' => 'Berhasil Disimpan'
        ], 200);
    }
    public function hapusPegawai($id){
        $pegawai = User::findOrFail($id);

        if($pegawai->id == '1'){
            $notification = array(
                'message' => 'Data Administrator Tidak Boleh Dihapus',
                'alert-type' => 'warning'
            );
            return back()->with($notification);
        }
        $pegawai->delete();

        $notification = array(
            'message' => 'Data Pegawai Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('daftar.pegawai')->with($notification);
        // alert()->success('Hore!','Post Deleted Successfully');
        // return back();
    }
    public function deletePegawai($id){
        $pegawai = User::findOrFail($id);

        if($pegawai->id == '1'){
            $notification = array(
                'message' => 'Data Administrator Tidak Boleh Dihapus',
                'alert-type' => 'warning'
            );
            return back()->with($notification);
        }
        $pegawai->delete();

        $notification = array(
            'message' => 'Data Pegawai Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('daftar.pegawai')->with($notification);
        // alert()->success('Hore!','Post Deleted Successfully');
        // return back();
    }

    public function ubahPegawai($id){
        $data = [
            'model' => User::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.pegawai', $id],
            'button' => 'Update'
        ];
        return view('admin.pegawai.form_pegawai', $data);

    }

    public function updatePegawai(UpdatePegawaiRequest $request, $id){
        $requestData = $request->validated();

        // $requestData['password'] = Hash::make('asdf');
        $user = User::findOrFail($id);

        // handle password
        if($requestData['password'] == ""){
            unset($requestData['password']);
        }else{
            $requestData['password'] = Hash::make($requestData['password']);
        }

        // jika upload foto profil
        $imageName_old = $user->photo;
        if($request->file('photo')){ // jika ada
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images'),$filename)){
                Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $requestData['photo'] = $filename;
        }

        // dd($requestData);

        $user->fill($requestData);

        $user->save();

        $notification = array(
            'message' => 'Data Pegawai Berhasil disimpan',
            'alert-type' => 'success'
        );

        // return $notification;
        // flash('Data Berhasil Disimpan');
        return response()->json([
            'message' => 'Data Pegawai Berhasil Disimpan'
        ], 200);
    }

    public function detailPegawai($id){
        $data = User::findOrFail($id);
        // dd($data);
        return view('admin.pegawai.detail_pegawai', $data);
    }
}
