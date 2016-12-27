<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\Event;
use App\EventVideo;

class EventVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
    	$evento = Event::find($id);
    	$eventoVideos = EventVideo::where('id_event', '=', $evento->id)->get();
    	return view('events.storeVideos')->with('evento', $evento)->with(compact('eventoVideos'));
    }
     public function storeVideo(Request $request){

     	$this->validate($request, [
     		'name' => 'required',
     		'link_video' => 'required',
     		'id_event' => ''
     		]);
     	$eventoVideo = new EventVideo;
     	$eventoVideo->name = $request->name;
     	$eventoVideo->link_video = $request->link_video;
     	$eventoVideo->id_event = $request->id_event;
     	$eventoVideo->basic_url = 'https://www.youtube.com/embed/';

     	$eventoVideo->save();

     	Session::flash('success', 'Tu video ha sido guardado con éxito');

        return redirect()->back();
     }

    public function updateVideo(Request $request, $id){
        $eventoVideo = EventVideo::find($id);
        $this->validate($request, [
            'name' => 'required',
            'link_video' => 'required',
            'id_event' => ''
        ]);
        $eventoVideo->name = $request->input('name');
        $eventoVideo->link_video = $request->input('link_video');
        $eventoVideo->id_event = $request->input('id_event');
        $eventoVideo->basic_url = 'https://www.youtube.com/embed/';

        $eventoVideo->save();

        Session::flash('success', 'Tu video ha sido modificado con éxito');

        return redirect()->action('EventVideoController@index', [$eventoVideo->id_event]);
    }

     public function destroyVideo($id){
     	$eventoVideo = EventVideo::find($id);
     	$eventoVideo->delete();
     	Session::flash('success', 'Tu video ha sido eliminado con éxito');
        return redirect()->back();
     }
}
