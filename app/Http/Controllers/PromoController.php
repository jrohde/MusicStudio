<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Promo;

class PromoController extends Controller
{
    public function index()
    {
       $promos = Promo::orderBy('created_at', 'desc')->get();
       return view('promotions.index')->with(compact('promos'));
    }

    public function storePromo(Request $request)
    {
       $this->validate($request, [
         'name' => 'required',
         'price' => 'required',
         'desc' => 'required',
         'role' => ''
       ]);

       $promo = new Promo();

       $promo->name = $request->name;
       $promo->price = $request->price;
       $promo->desc = $request->desc;
       $promo->role = $request->input('role');

       if($request->input('role') === NUll){
          $promo->role = '0';
       }

       $checkRole = Promo::where('role', '=', '1')->get();
       if (count($checkRole) > 0 && $request->input('role') !== NULL) {
          Session::flash('failed', 'No puede haber mas de 1 destacada!');
          return redirect()->back();
       }

       $promo->save();

       Session::flash('success', 'Tu promoción ha sido guardada con éxito!');
       return redirect()->back();
    }

    public function updatePromo(Request $request, $id)
    {
       $promo = Promo::find($id);
       $this->validate($request, [
         'name' => 'required',
         'price' => 'required',
         'desc' => 'required',
         'role' => ''
       ]);

       $promo->name = $request->input('name');
       $promo->price = $request->input('price');
       $promo->desc = $request->input('desc');
       $promo->role = $request->input('role');

       if ($request->input('role') === NUll) {
          $promo->role = '0';
       }

       $promo->save();

       Session::flash('success', 'Tu promoción ha sido modificada con éxito!');
       return redirect()->back();
    }

    public function destroyPromo($id)
    {
       $promo = Promo::find($id);
       $promo->delete();
       Session::flash('success', 'Tu promoción ha sido eliminada con éxito!');
       return redirect()->back();
    }
}
