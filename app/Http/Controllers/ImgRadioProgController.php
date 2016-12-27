<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\ImgRadioProgram;
use App\Program;
use Session;

class ImgRadioProgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $program = Program::find($id);
        $imagesRadio = DB::table('img_radio_programs')->where('id_img_prog', '=', $program->id)->orderBy('id', 'desc')->paginate(12);
        return view('programDetail.storeImgs')->with('program', $program)->with(compact('imagesRadio'));
    }

    public function storeImg(Request $request){

        $this->validate($request, [
            'image' => 'required|image|max:2000'
            ]);

        $imgRadioProgram = new ImgRadioProgram;
        $imgRadioProgram->id_img_prog = $request->input('id_img_prog');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $temp_file = base_path() . 'uploads/radio_program_img_historial' . $img_name;
                $imgRadioProgram->image = $request->file('image')->move('uploads/radio_program_img_historial', $img_name);
            }
        }

        $imgRadioProgram->save();
        Session::flash('success', 'La imagen ha sido guardada correctamente!');
        return redirect()->back();
    }

    public function destroyImgs($id){

        $imgRadioProgram = ImgRadioProgram::find($id);
        $imgRadioProgram->delete();
        Session::flash('success', 'La imagen ha sido elimiada correctamente!');
        return redirect()->back();
        }
}
