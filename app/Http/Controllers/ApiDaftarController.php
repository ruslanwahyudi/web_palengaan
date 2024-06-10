<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDaftarController extends Controller
{
    //
    public function daftarApi(Request $request){
        $loginData = $request->validate([
            'email' => 'required:email',
            'password' => 'required',
            'fcm_token' => 'nullable'
        ]);

        // if(Auth::attempt($loginData)){
        // if(Auth::attempt($request->only('email','password'))){
        //     // cek apakah ada fcm token request terisi
        //     if($request->filled('fcm_token')){
        //         $user = Auth::user();
        //         $user->fcm_token = $request->fcm_token;
        //         $user->update();
        //         // Auth::user()->update(['fcm_token' => $request->fcm_token]);
        //     }
        //     $token = Auth::user()->createToken('authtoken')->plainTextToken;
        //     $user = array_merge(Auth::user()->toArray(), ['token' => $token]);
        //     // return response()->json([
        //     //     'data' => Auth::user(),
        //     //     'token' => $token,
        //     // ],200 );
        //     return $this->okResponse('Login Berhasil', $user);
        // }
        // return $this->unauthenticatedResponse('Login gagal');
    }
}
