<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public $title = "All Pages";
    public $model = "Page";
    public $description = "Page";
    public $indexPage = ['Seputar Organisasi','Visi Misi','Struktur Organisasi','Alur Pelayanan'];

    //
    public function editPage($i_page){
        $page = array(
            "title" => $this->indexPage[$i_page],
            "description" => $this->description,
            "model" => $this->model,
        );
        $page = Page::where('index',$i_page)->first();
        $data = [
            'model' => Page::findOrFail($page->id),
            'method' => 'POST',
            'route' => ['update.page', $page->id],
            'button' => 'Update',
        ];

        // dd($data);


        return view('admin.blogs.pages.form_page', compact('data','page'));
    }

    public function updatePage(Request $request, StorePageRequest $storePageRequest, $id){
        $storePageRequest = $storePageRequest->validated();

        $page = Page::findOrFail($id);

        $page->fill($storePageRequest);
        $page->save();

        return response()->json([
            'message' => 'Data Berhasil Diupdate'
        ], 200);

    }
}
