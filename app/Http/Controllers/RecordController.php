<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Record;

class RecordController extends Controller
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
        $records = Record::orderBy('id', 'desc')->paginate(10);
        return view('records.index')->with(compact('records'));
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

        $record = new Record();
        $record->date_start = $request->date_start;
        $record->date_end = $request->date_end;
        $record->disc = $request->disc;
        $record->productors = $request->productors;
        $record->integrantes = $request->integrantes;
        $record->mixing = $request->mixing;
        $record->mastering = $request->mastering;

        if ($request->hasFile('image')) {//esiste la immagine?
            if ($request->file('image')->isValid()) {//è valida?

                $img_name = $request->file('image')->getClientOriginalName();//prendo nome originale
                $temp_file = base_path() . 'uploads/records' . $img_name;//lo salvo tmp
                $record->image = $request->file('image')->move('uploads/records', $img_name);//lo muovo alla cartella dedicata
            }
        }else{
            $record->image = url('uploads/productions/cd_base.png');
        }

        $record->save();

        Session::flash('success', 'Tu grabación ha sido guardada con éxito');

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
        $record = Record::find($id);
        return view('records.edit')->with('record', $record);
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
        $record = Record::find($id);
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
        $record->date_start = $request->input('date_start');
        $record->date_end = $request->input('date_end');
        $record->disc = $request->input('disc');
        $record->productors = $request->input('productors');
        $record->integrantes = $request->input('integrantes');
        $record->mixing = $request->input('mixing');
        $record->mastering = $request->input('mastering');

        if ($request->hasFile('image')) {//esiste la immagine?
            if ($request->file('image')->isValid()) {//è valida?

                $img_name = $request->file('image')->getClientOriginalName();//prendo nome originale
                $temp_file = base_path() . 'uploads/records' . $img_name;//lo salvo tmp
                $record->image = $request->file('image')->move('uploads/records', $img_name);//lo muovo alla cartella dedicata
            }
        }else{
                $record->image = url('uploads/productions/cd_base.png');
        }

        $record->save();

        Session::flash('success', 'Tu grabación ha sido modificada con éxito');

        return redirect()->route('admin.grabaciones.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);

        $record->delete();

        Session::flash('success', 'Tu grabación ha sido eliminada con éxito');

        return redirect()->back();
    }
}
