<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.home');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminProfile(){
        $id = Auth::user()->id;
        $adminProfile = User::find($id);
        // dd($adminProfile);
        return view('admin.admin_profile', compact('adminProfile'));
        
    }

    public function adminProfileStore(Request $request){
        $id = Auth::user()->id;
        $adminProfile = User::find($id);
        $imageName_old = $adminProfile->photo;
        // dd($imageName_old);
        $adminProfile->name = $request->name;
        $adminProfile->username = $request->username;
        $adminProfile->email = $request->email;
        if ($request->file('photo')) {// jika ada kiriman file
            # code...
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images'),$filename)){
                Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $adminProfile->photo = $filename;
        } else {
            # code...
        }
        $adminProfile->save();
        $notification = array(
            'message' => 'Data Profil Berhasil Diupdate',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // $adminProfile->name = $request->name;
        
    }

    public function adminChangePassword(){
        $id = Auth::user()->id;
        $adminProfile = User::find($id);
        // dd($adminProfile);
        return view('admin.admin_change_password', compact('adminProfile'));
        
    }

    public function adminChangePasswordStore(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        // check match old and new password
        if(!Hash::check($request->old_password, Auth::user()->password)){ // tidak cocok
            $notification = array(
                'message' => 'Password tidak sama dengan yang lama!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $updatePassword = User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        if ($updatePassword) {
            $notification = array(
                'message' => 'Password Berhasil Diupdate!',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Password Gagal Diupdate!',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }

    public function adminSettings(){
        $id = Auth::user()->id;
        $adminSettings = Settings::get()->first();
        // dd($adminProfile);
        return view('admin.admin_setting', compact('adminSettings'));
        
    }

    public function adminSettingsStore(Request $request){
        // $id = Auth::user()->id;
        $adminSettings = Settings::get()->first();
        $imageLogo_old = $adminSettings->icon_app;
        $imageFave_old = $adminSettings->icon_fav;
        // dd($imageLogo_old);
        $adminSettings->app_name        = $request->app_name;
        $adminSettings->app_email       = $request->app_email;
        $adminSettings->name_org        = $request->name_org;
        $adminSettings->address_org     = $request->address_org;
        $adminSettings->phone_org       = $request->phone_org;
        $adminSettings->fax_org         = $request->fax_org;
        if ($request->file('logo')) {// jika ada kiriman file
            # code...
            $file = $request->file('logo');
            $filenameLogo = 'logo_'.date('YmdHi').$file->getClientOriginalName();
            // upload
            if($file->move(public_path('uploads/'),$filenameLogo)){
                Storage::disk('public_settings')->delete("{$imageLogo_old}");
            }else{

            }
            $adminSettings->icon_app = $filenameLogo;
        }

        if ($request->file('faveicon')) {// jika ada kiriman file
            # code...
            $file = $request->file('faveicon');
            $filenameFav = 'faveicon_'.date('YmdHi').$file->getClientOriginalName();
            // upload
            if($file->move(public_path('uploads/'),$filenameFav)){
                Storage::disk('public_settings')->delete("{$imageFave_old}");
            }else{

            }
            $adminSettings->icon_fav = $filenameFav;
        }
        $adminSettings->save();
        $notification = array(
            'message' => 'Data Organisasi Berhasil Diupdate',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        // $adminProfile->name = $request->name;
        
    }

    public function adminLogin(){
        return view('admin.admin_login');
    }

}
