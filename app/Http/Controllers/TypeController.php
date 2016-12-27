<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Type;
use App\Article;

class TypeController extends Controller
{
    public function index()
    {
       $articles = Article::all();
       $types = Type::orderBy('created_at', 'desc')->get();
       return view('articles.index')->with(compact('types'))->with(compact('articles'));
    }
    public function storeType(Request $request)
    {
       $this->validate($request, [
          'name' => 'required|max:60'
       ]);
       $type = new Type();
       $type->name = $request->name;

       //ICONS VALIDATION

       if (isset($type) && $type->name !== '') {
          if ($type->name === 'Cajas') {
             $type->icon = asset('img/icons/cajas.png');
          }elseif ($type->name === 'Retornos') {
             $type->icon = asset('img/icons/retornos.png');
          }elseif ($type->name === 'Consolas') {
             $type->icon = asset('img/icons/consola.png');
          }elseif ($type->name === 'Potencias') {
             $type->icon = asset('img/icons/potencia.png');
          }elseif ($type->name === 'Cajas directas') {
             $type->icon = asset('img/icons/ampli.png');
          }elseif ($type->name === 'Microfonos') {
             $type->icon = asset('img/icons/mic.png');
          }elseif ($type->name === 'Operador') {
             $type->icon = asset('img/icons/people.png');
          }elseif ($type->name === 'Varios') {
             $type->icon = asset('img/icons/cables.png');
          }
       }

       //END ICONS VALIDATION
       $type->save();
       Session::flash('success', 'Tu categoría ha sido guardada con éxito');
       return redirect()->back();
    }


    public function updateType(Request $request, $id)
    {
       $type = Type::find($id);
       $this->validate($request, [
          'name' => 'required|max:60'
       ]);

       $type->name = $request->input('name');
       $type->save();
       Session::flash('success', 'Tu categoría ha sido modificado con éxito');
       return redirect()->back();
    }


    public function destroyType($id)
    {
       $type = Type::find($id);
       $type->delete();
       Session::flash('success', 'Tu categoría ha sido eliminada con éxito');
       return redirect()->back();
    }
}
