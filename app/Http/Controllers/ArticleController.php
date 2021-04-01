<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DD;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    //
    public function index()
    {
        //db tanpa eloquent utk menampilkan seluruh isi tabel guests
        // $guests= DB::table('guests')->get(); 

        //db dengan eloquent
        $categories = Category::all();
        $articles = Article::with('category')->get();
        return view('addArticleForm', ['articles' => $articles, 'categories'=>$categories]);
    }

    //function to save input data to database
    //store adalah nama function dan parameternya $request
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->article = $request->input('article');
        $article->category_id = $request->input('category_id');
        $article->save();
        return redirect('/')->with('message', 'Data is successfully saved');
        //with adalah session yg akan dikirimkan
    }

 
    
   public function destroy($id=0)
   {
       $article = Article::find($id);
       $article->delete();
       return redirect('/')->with('message','Data is successfully deleted');
   }

   public function edit($id)
   {
       $article = Article::where('id',$id)->with('category')->first();
       $categories = Category::all();
    //    $data['title'] = $article->title;
       return view('editArticleForm',['article' => $article, 'categories' => $categories]);
   }

   public function update(Request $request,$id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->article = $request->input('article');
        $article->save();
        return redirect('/')->with('message', 'Data is successfully updated');
        //with adalah session yg akan dikirimkan
    }

    public function index2()
    {
        return view('home');
    }

}