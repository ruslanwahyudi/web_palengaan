<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\StoreCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public $title = "All Categorys";
    public $model = "Category";
    public $description = "Category";

    //
    public function allCategory(){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        // dd($page);
        $data = Category::latest()->paginate(5);
        return view('admin.blogs.categorys.all_category', compact('data','page'));
    }

    public function addCategory(){
        $data = [
            'model' => new Category(),
            'method' => 'POST',
            'route' => ['store.category'],
            'button' => 'Simpan'
        ];

        return view('admin.blogs.categorys.form_category', $data);
    }

    public function storeCategory(Request $request, StoreCategoryRequest $storeCategoryRequest){
        $storeCategoryRequest = $storeCategoryRequest->validated();
        $category = Category::create($storeCategoryRequest);

        if($category){
            return response()->json([
                'message' => 'Data Category Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editCategory ($id){

        $data = Category::findOrFail($id);
        $data = [
            'model' => Category::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.category', $id],
            'button' => 'Update'
        ];

        return view('admin.blogs.categorys.form_category', $data);

    }

    public function updateCategory(UpdateCategoryRequest $updateCategoryRequest, $id){
        $updateCategoryRequest = $updateCategoryRequest->validated();

        $Category = Category::findOrFail($id);

        $Category->fill($updateCategoryRequest);
        $Category->save();

        return response()->json([
            'message' => 'Data Category Berhasil Diupdate'
        ], 200);

    }

    public function deleteCategory($id)  {
        $data = Category::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Category Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }
}
