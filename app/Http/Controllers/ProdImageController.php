<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Production;
use App\ProductionImage;

class ProdImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $produccion = Production::find($id);
        $prodImages = ProductionImage::where('id_prod', '=', $produccion->id)->get();
        return view('productions.storeImgs')->with('produccion', $produccion)->with(compact('prodImages'));
    }

    public function storeImg(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'id_prod' => 'required'
            ]);

        $prodImage = new ProductionImage;
        $prodImage->name = $request->name;
        $prodImage->id_prod = $request->id_prod;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $tmp_file = base_path() . 'uploads/production_images' . $img_name;
                $prodImage->image = $request->file('image')->move('uploads/production_images', $img_name);
            }
        }

        $prodImage->save();

        Session::flash('success', 'Tu imagen ha sido guardado con éxito');

        return redirect()->back();

    }

    public function destroyImagen($id){
        $prodImage = ProductionImage::find($id);
        $prodImage->delete();
        Session::flash('success', 'Tu imagen ha sido eliminada con éxito');
        return redirect()->back();
    }
}
