<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Production;

class ProductionController extends Controller
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
    {
        $productions = Production::orderBy('id', 'desc')->paginate(10);
        return view('productions.index')->with(compact('productions'));
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
            'date_start' => 'required',
            'date_end' => 'required',
            'disc' => 'required',
            'productors' => 'required',
            'integrantes' => '',
            'mixing' => 'required',
            'mastering' => 'required',
            'image' => 'image|max:2000',
            ]);

        $production = new Production();
        $production->date_start = $request->date_start;
        $production->date_end = $request->date_end;
        $production->disc = $request->disc;
        $production->productors = $request->productors;
        $production->integrantes = $request->integrantes;
        $production->mixing = $request->mixing;
        $production->mastering = $request->mastering;

        if ($request->hasFile('image')) {//esiste la immagine?
            if ($request->file('image')->isValid()) {//è valida?

                $img_name = $request->file('image')->getClientOriginalName();//prendo nome originale
                $temp_file = base_path() . 'uploads/productions' . $img_name;//lo salvo tmp
                $production->image = $request->file('image')->move('uploads/productions', $img_name);//lo muovo alla cartella dedicata
            }
        }else{
            $production->image = url('uploads/productions/cd_base.png');
        }

        $production->save();

        Session::flash('success', 'Tu producción ha sido guardada con éxito');

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
        $production = Production::find($id);
        return view('productions.edit')->with('production', $production);
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
        $production = Production::find($id);
        $this->validate($request, [
            'date_start' => 'required',
            'date_end' => 'required',
            'disc' => 'required',
            'productors' => 'required',
            'integrantes' => '',
            'mixing' => 'required',
            'mastering' => 'required',
            'image' => 'image|max:2000',
            ]);
        $production->date_start = $request->input('date_start');
        $production->date_end = $request->input('date_end');
        $production->disc = $request->input('disc');
        $production->productors = $request->input('productors');
        $production->integrantes = $request->input('integrantes');
        $production->mixing = $request->input('mixing');
        $production->mastering = $request->input('mastering');

        if ($request->hasFile('image')) {//esiste la immagine?
            if ($request->file('image')->isValid()) {//è valida?

                $img_name = $request->file('image')->getClientOriginalName();//prendo nome originale
                $temp_file = base_path() . 'uploads/productions' . $img_name;//lo salvo tmp
                $production->image = $request->file('image')->move('uploads/productions', $img_name);//lo muovo alla cartella dedicata
            }
        }else{
                $production->image = url('uploads/productions/cd_base.png');
        }

        $production->save();

        Session::flash('success', 'Tu producción ha sido modificada con éxito');

        return redirect()->route('admin.producciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $production = Production::find($id);

        $production->delete();

        Session::flash('success', 'Tu producción ha sido eliminada con éxito');

        return redirect()->back();
    }
}
