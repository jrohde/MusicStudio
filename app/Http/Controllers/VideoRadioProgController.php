<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;
use App\VideoRadioProg;
use DB;
use Session;

class VideoRadioProgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
    	$program = Program::find($id);
    	$videosRadio = DB::table('video_radio_progs')->where('id_video_prog', '=', $program->id)->orderBy('id', 'desc')->paginate(12);
    	return view('programDetail.storeVideos')->with('program', $program)->with(compact('videosRadio'));
    }

    public function storeVideo(Request $request){
    	$this->validate($request, [
    		'link_video' => 'required',
    		'name' => 'required',
            'id_video_prog' => ''
    		]);

    	$videoRadioProg = new VideoRadioProg();
    	$videoRadioProg->link_video = $request->link_video;
    	$videoRadioProg->name = $request->name;
    	$videoRadioProg->id_video_prog = $request->input('id_video_prog');
        $videoRadioProg->basic_url = 'https://www.youtube.com/embed/';

    	$videoRadioProg->save();

    	Session::flash('success', 'Tu nuevo link ha sido guardado correctamente!');

        return redirect()->back();
    }

    public function updateVideo(Request $request, $id){

        $videoRadioProg = VideoRadioProg::find($id);

        $this->validate($request, [
            'link_video' => 'required',
            'name' => 'required',
            'id_video_prog' => ''
            ]);

        $videoRadioProg->name = $request->input('name');
        $videoRadioProg->link_video = $request->input('link_video');
        $videoRadioProg->id_video_prog = $request->input('id_video_prog');

        $videoRadioProg->save();

        Session::flash('success', 'Tu video ha sido modificado correctamente!');

        return redirect()->action('VideoRadioProgController@index', [$videoRadioProg->id_video_prog]);
    }

    public function destroyVideos($id){
    	$videoRadioProg = VideoRadioProg::find($id);

    	$videoRadioProg->delete();

    	Session::flash('success', 'Tu link ha sido eliminado correctamente!');

        return redirect()->back();
    }
}
