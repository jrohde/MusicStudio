<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Program;
use App\ConductorRadio;
use Session;

class ConductorRadioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $program = Program::find($id);
        $conductorsRadio = DB::table('conductor_radios')->where('id_img_conduct', '=', $program->id)->orderBy('id', 'desc')->paginate(12);
        return view('programDetail.storeConductor')->with('program', $program)->with(compact('conductorsRadio'));
    }

    public function storeConductor(Request $request){

        $this->validate($request, [
            'image' => 'required|image',
            'name' => 'required'
            ]);

        $conductorRadio = new ConductorRadio;
        $conductorRadio->name = $request->name;
        $conductorRadio->id_img_conduct = $request->input('id_img_conduct');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $img_name = $request->file('image')->getClientOriginalName();
                $temp_file = base_path() . 'uploads/radio_conductores' . $img_name;
                $conductorRadio->image = $request->file('image')->move('uploads/radio_conductores', $img_name);
            }
        }

        $conductorRadio->save();

        Session::flash('success', 'El conductor ha sido creado correctamente!');

        return redirect()->back();
    }
    public function updateConductor(Request $request, $id){

        $conductorRadio = ConductorRadio::find($id);

        $this->validate($request, [
            'image' => 'image',
            'name' => 'required'
            ]);

        $conductorRadio->name = $request->input('name');
        $conductorRadio->id_img_conduct = $request->input('id_img_conduct');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $img_name = $request->file('image')->getClientOriginalName();
                $temp_file = base_path() . 'uploads/radio_conductores' . $img_name;
                $conductorRadio->image = $request->file('image')->move('uploads/radio_conductores', $img_name);
            }
        }

        $conductorRadio->save();

        Session::flash('success', 'El conductor ha sido modificado correctamente!');

        return redirect()->back();
    }

    public function destroyConductor($id){

        $conductorRadio = ConductorRadio::find($id);

        $conductorRadio->delete();

        Session::flash('success', 'La imagen ha sido elimiada correctamente!');

        return redirect()->back();
        }
}
