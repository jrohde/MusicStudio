<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Record;
use App\RecordVideo;


class RecordVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
    	$record = Record::find($id);
    	$recordVideos = RecordVideo::where('id_rec', '=', $record->id)->get();
    	return view('records.storeVideo')->with('record', $record)->with(compact('recordVideos'));
    }
     public function storeVideo(Request $request){

     	$this->validate($request, [
     		'name' => 'required',
     		'link_video' => 'required',
     		'id_rec' => ''
     		]);
     	$recordVideo = new RecordVideo;
     	$recordVideo->name = $request->name;
     	$recordVideo->link_video = $request->link_video;
     	$recordVideo->id_rec = $request->id_rec;
     	$recordVideo->basic_url = 'https://www.youtube.com/embed/';

     	$recordVideo->save();

     	Session::flash('success', 'Tu video ha sido guardado con éxito');

        return redirect()->back();
     }

    public function updateVideo(Request $request, $id){
        $recordVideo = RecordVideo::find($id);
        $this->validate($request, [
            'name' => 'required',
            'link_video' => 'required',
            'id_rec' => ''
        ]);
        $recordVideo->name = $request->input('name');
        $recordVideo->link_video = $request->input('link_video');
        $recordVideo->id_rec = $request->input('id_rec');
        $recordVideo->basic_url = 'https://www.youtube.com/embed/';

        $recordVideo->save();

        Session::flash('success', 'Tu video ha sido modificado con éxito');

        return redirect()->action('RecordVideoController@index', [$recordVideo->id_rec]);
    }

     public function destroyVideo($id){
     	$recordVideo = RecordVideo::find($id);
     	$recordVideo->delete();
     	Session::flash('success', 'Tu video ha sido eliminado con éxito');
        return redirect()->back();
     }
}
