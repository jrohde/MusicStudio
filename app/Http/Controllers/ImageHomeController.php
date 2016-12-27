<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\ImageHomeCateg;
use App\ImageHome;

class ImageHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categorias = ImageHomeCateg::all();
        $imagenesHome = ImageHome::join('image_home_categs', 'image_homes.id_categs', '=', 'image_home_categs.id')->select('image_home_categs.name AS cat', 'image_homes.name AS name', 'image_homes.image AS img', 'image_homes.id')->get();
        //dd($categNombres);
        return view('imagesHome.create')->with(compact('categorias'))->with(compact('imagenesHome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|max:4000',
            'id_categs' => 'required'
            ]);

        $imageHome = new ImageHome;

        $imageHome->name = $request->name;

        if ($request->hasFile('image')) {//esiste la immagine?
            if ($request->file('image')->isValid()) {//è valida?

                $img_name = $request->file('image')->getClientOriginalName();//prendo nome originale
                $temp_file = base_path() . 'uploads/home_images' . $img_name;//lo salvo tmp
                $imageHome->image = $request->file('image')->move('uploads/home_images', $img_name);//lo muovo alla cartella dedicata
            }
        }

        $imageHome->id_categs = $request->id_categs;

        $imageHome->save();

        Session::flash('success', 'Tu imagen ha ido guardada con éxito');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageHome = ImageHome::find($id);

        $imageHome->delete();

        Session::flash('success', 'La imagen ha sido elimiada correctamente!');

        return redirect()->back();
    }
}
