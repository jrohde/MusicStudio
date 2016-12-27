<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Type;
use App\Article;

class ArticleController extends Controller
{
    public function index($id)
    {
       $type = Type::find($id);
       $articles = Article::where('type_id', '=', $type->id)->get();
       return view('articles.todos')->with(compact('articles'))->with('type', $type);
    }

    public function storeArticle(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|max:60',
          'desc' => 'required',
          'stock' => 'required',
          'type_id' => 'required'
      ]);

      $article = new Article();
      $article->name = $request->name;
      $article->desc = $request->desc;
      $article->stock = $request->stock;
      $article->type_id = $request->type_id;

      $article->save();

      Session::flash('success', 'Tu Articulo ha sido guardado con éxito');
      return redirect()->back();
    }

    public function updateArticle(Request $request, $id)
    {
      $article = Article::find($id);
      $this->validate($request, [
          'name' => 'required|max:60',
          'desc' => 'required',
          'stock' => 'required',
          'type_id' => 'required'
      ]);

      $article->name = $request->input('name');
      $article->desc = $request->input('desc');
      $article->stock = $request->input('stock');
      $article->type_id = $request->input('type_id');

      $article->save();

      Session::flash('success', 'Tu Articulo ha sido modificado con éxito');
      return redirect()->back();
    }

    public function destroyArticle($id)
    {
       $article = Article::find($id);
       $article->delete();
       Session::flash('success', 'Tu Articulo ha sido eliminado con éxito');
       return redirect()->back();
    }
}
