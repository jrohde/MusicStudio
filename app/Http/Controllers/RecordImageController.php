<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Record;
use App\RecordImage;


class RecordImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $record = Record::find($id);
        $recordImages = RecordImage::where('id_rec', '=', $record->id)->get();
        return view('records.storeImgs')->with('record', $record)->with(compact('recordImages'));
    }

    public function storeImg(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'id_rec' => 'required'
            ]);

        $recordImage = new RecordImage;
        $recordImage->name = $request->name;
        $recordImage->id_rec = $request->id_rec;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $tmp_file = base_path() . 'uploads/record_images' . $img_name;
                $recordImage->image = $request->file('image')->move('uploads/record_images', $img_name);
            }
        }

        $recordImage->save();

        Session::flash('success', 'Tu imagen ha sido guardado con éxito');

        return redirect()->back();

    }

    public function destroyImagen($id){
        $recordImage = RecordImage::find($id);
        $recordImage->delete();
        Session::flash('success', 'Tu imagen ha sido eliminada con éxito');
        return redirect()->back();
    }
}
