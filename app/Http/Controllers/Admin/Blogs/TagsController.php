<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\tag\StoreTagRequest;
use App\Http\Requests\tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public $title = "All Tags";
    public $model = "Tag";
    public $description = "Tag";

    //
    public function allTag(){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        // dd($page);
        $data = Tag::latest()->paginate(5);
        return view('admin.blogs.tags.all_tag', compact('data','page'));
    }

    public function addTag(){
        $data = [
            'model' => new Tag(),
            'method' => 'POST',
            'route' => ['store.tag'],
            'button' => 'Simpan'
        ];

        return view('admin.blogs.tags.form_tag', $data);
    }

    public function storeTag(Request $request, StoreTagRequest $storeTagRequest){
        $storeTagRequest = $storeTagRequest->validated();
        $tag = Tag::create($storeTagRequest);

        if($tag){
            return response()->json([
                'message' => 'Data Tag Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editTag ($id){

        $data = Tag::findOrFail($id);
        $data = [
            'model' => Tag::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.tag', $id],
            'button' => 'Update'
        ];

        return view('admin.blogs.tags.form_tag', $data);

    }

    public function updateTag(UpdateTagRequest $updateTagRequest, $id){
        $updateTagRequest = $updateTagRequest->validated();

        $tag = Tag::findOrFail($id);

        $tag->fill($updateTagRequest);
        $tag->save();

        return response()->json([
            'message' => 'Data Permission Berhasil Diupdate'
        ], 200);

    }

    public function deleteTag($id)  {
        $data = Tag::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Tag Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tag')->with($notification);
    }
}
