<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Event;
use App\EventImage;

class EventImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index($id){
    	$evento = Event::find($id);
    	$eventoImages = EventImage::where('id_event', '=', $evento->id)->get();
        return view('events.storeImgs')->with('evento', $evento)->with(compact('eventoImages'));
    }

    public function storeImg(Request $request){
    	$this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'id_event' => 'required'
            ]);

        $eventoImage = new EventImage;
        $eventoImage->name = $request->name;
        $eventoImage->id_event = $request->id_event;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $tmp_file = base_path() . 'uploads/event_images' . $img_name;
                $eventoImage->image = $request->file('image')->move('uploads/event_images', $img_name);
            }
        }

        $eventoImage->save();

        Session::flash('success', 'Tu imagen ha sido guardado con éxito');

        return redirect()->back();

    }

    public function destroyImagen($id){
    	$eventoImage = EventImage::find($id);
    	$eventoImage->delete();
    	Session::flash('success', 'Tu imagen ha sido eliminada con éxito');
        return redirect()->back();
    }
}
