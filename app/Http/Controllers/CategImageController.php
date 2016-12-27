<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\ImageHomeCateg;

class CategImageController extends Controller
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
        $categsImage = imageHomeCateg::all();
        return view('categsImageHome.create')->with(compact('categsImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required'
            ]);

        $categImage = new ImageHomeCateg;
        $categImage->name = $request->name;

        $categImage->save();

        Session::flash('success', 'Tu categoría ha sido agregada con éxito');

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
        $categImage = ImageHomeCateg::find($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $categImage->name = $request->input('name');

        $categImage->save();

        Session::flash('success', 'Tu categoría ha sido modificada con éxito');

        return redirect()->action('CategImageController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categImage = ImageHomeCateg::find($id);
        $categImage->delete();
        Session::flash('success', 'Tu categoria ha sido eliminada con éxito');
        return redirect()->back();
    }
}
