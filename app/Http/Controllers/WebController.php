<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Sakip;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function index() {
        $article = Article::with('category')->latest()->take(3)->get();
        // dd($article);
        // foreach ($article as $key => $value) {
        //     echo $value->title;
        // }

        return view('frontend.pages.fo_home', compact('article'));
        // echo "kaka";
        // dd($article);
        // return view('index', compact('article'));
    }

    public function dokumenPerencanaan(){
        $sakip = Sakip::latest()->get();
        return view('frontend.pages.dok-perencanaan', compact('sakip'));
    }

    public function allPost(){
        $article = Article::with('category')->latest()->take(10)->get();
        return view('frontend.pages.fo_blog', compact('article'));
    }
    public function detailPost($id){
        $article = Article::with('category')->findOrFail($id);
        return view('frontend.pages.fo_singleblog', compact('article'));
    }

    
}
