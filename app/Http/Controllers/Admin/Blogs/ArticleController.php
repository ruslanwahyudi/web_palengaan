<?php

namespace App\Http\Controllers\Admin\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Requests\article\UpdateArticleRequest;
use App\Http\Requests\article\StoreArticleRequest;
use App\Models\Article;
use App\Models\Articletag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //
    public $title = "All Articles";
    public $model = "Article";
    public $description = "Article";

    //
    public function allArticle(Request $request){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        if($request->filled('q')){ // jika ada query pencarian
            $data = Article::search($request->q)->paginate(4);
        }else{
            $data = Article::latest()->paginate(5);
        }
        return view('admin.blogs.articles.all_article', compact('data','page'));
    }

    public function addArticle(){
        $data = [
            'model' => new Article(),
            'method' => 'POST',
            'route' => ['store.article'],
            'button' => 'Simpan',
            'category' => Category::all(),
            'tags' => Tag::all(),
        ];
        // dd($data);

        return view('admin.blogs.articles.form_article', $data);
    }

    public function storeArticle(Request $request, StoreArticleRequest $storeArticleRequest){
        // dd($request->category_id);
        $storeArticleRequest = $storeArticleRequest->validated();
        if($request->file('image')){ // jika ada
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/articles'),$filename)){ // berhasil upload
                // Storage::disk('public_uploads')->delete("{$imageName_old}");
            }else{

            }
            $storeArticleRequest['image'] = $filename;
        }
        $article = Article::create($storeArticleRequest);

        // store to article_tag table
        // $article_tag = new Articletag();
        // $article_tag->article_id = $article->id;
        // $article_tag->tag_id = $request->tag_id;
        Articletag::create([
            'article_id' => $article->id,
            'tag_id' => $request->tag_id
        ]);

        if($article){
            return response()->json([
                'message' => 'Data Article Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editArticle ($id){

        $data = Article::findOrFail($id);
        $data = [
            'model' => Article::with('category','tags')->findOrFail($id),
            'method' => 'POST',
            'route' => ['update.article', $id],
            'button' => 'Update',
            'category' => Category::all(),
            'tags' => Tag::all(),
        ];

        // dd($data);

        return view('admin.blogs.articles.form_article', $data);

    }

    public function updateArticle(Request $request, UpdateArticleRequest $updateArticleRequest, $id){
        $updateArticleRequest = $updateArticleRequest->validated();

        $article = Article::findOrFail($id);

        // jika upload foto profil
        $imageName_old = $article->image;
        if($request->file('image')){ // jika ada
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload
            // $file->move(public_path('uploads/admin_images'),$filename);
            if($file->move(public_path('uploads/admin_images/articles/'),$filename)){
                Storage::disk('public_upload_articles')->delete("{$imageName_old}");
            }else{

            }
            $updateArticleRequest['image'] = $filename;
        }

        $article->fill($updateArticleRequest);
        $article->save();

        

        // insert updated tag
        // delete all tag first
        Articletag::where('article_id', $id)->delete();
        foreach($request->tag as $key => $value) {
            $tagName = $value;
            $tagId = $key;
            
            // reinsert tag
            Articletag::create([
                'article_id' => $id,
                'tag_id' => $value
            ]);
        }

        return response()->json([
            'message' => 'Data Article Berhasil Diupdate'
        ], 200);

    }

    public function deleteArticle($id)  {
        $data = Article::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Article Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.article')->with($notification);
    }
}
