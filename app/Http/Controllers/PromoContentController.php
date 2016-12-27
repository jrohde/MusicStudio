<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Promo;
use App\Type;
use App\Article;
use App\ArticlePromo;

class PromoContentController extends Controller
{
    public function index($id)
    {
       $promo = Promo::find($id);
       $articles = Article::all();
       $types = Type::orderBy('name', 'asc')->get();
       return view('promotions.content')->with('promo', $promo)->with(compact('articles'))->with(compact('types'));
    }
    public function storeContent(Request $request)
    {
       $this->validate($request, [
          'promo_id' => 'required',
          'article_id' => 'required|min:1',
          'amount' => 'min:1'
       ]);

      //  $promo_id = $request->input('promo_id');
      //  $article_id = $request->input('article_id');
      //  $amount = $request->input('amount');
       $inputs = $request->all();
       $checked = array();

       foreach ($inputs as $input) {
          $checked[] = new ArticlePromo([
            'promo_id' => $input['promo_id'],
            'article_id' => $input['article_id'],
            'amount' => $input['amount']
          ]);
       }

       dd($checked);

       //save  into the DB
       $meal->save();
       $meal->ingredients()->saveMany($meal_ingredients);

       Session::flash('success', 'Tu contenido ha sido guardado con éxito');
       return redirect()->back();
    }
}
