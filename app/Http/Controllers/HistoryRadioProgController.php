<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;
use App\VideoRadioProg;
use App\HistoryRadioProg;
use DB;
use Session;

class HistoryRadioProgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
    	$program = Program::find($id);
    	$historiesRadio = DB::table('history_radio_progs')->where('id_history_prog', '=', $program->id)->orderBy('id', 'desc')->paginate(12);
    	return view('programDetail.storeHistories')->with('program', $program)->with(compact('historiesRadio'));
    }

    public function storeHistories(Request $request){
    	$this->validate($request, [
    		'link_video' => 'required',
    		'name' => 'required',
            'id_history_prog' => ''
    		]);

    	$historyRadioProg = new HistoryRadioProg();
    	$historyRadioProg->link_video = $request->link_video;
    	$historyRadioProg->name = $request->name;
    	$historyRadioProg->id_history_prog = $request->input('id_history_prog');
        $historyRadioProg->basic_url = 'https://soundcloud.com/';

    	$historyRadioProg->save();

    	Session::flash('success', 'Tu nuevo link ha sido guardado correctamente!');

        return redirect()->back();
    }

    public function updateHistories(Request $request, $id){

        $historyRadioProg = HistoryRadioProg::find($id);

        $this->validate($request, [
            'link_video' => 'required',
            'name' => 'required',
            'id_history_prog' => ''
        ]);
        $historyRadioProg->link_video = $request->input('link_video');
        $historyRadioProg->name = $request->input('name');
        $historyRadioProg->id_history_prog = $request->input('id_history_prog');

        $historyRadioProg->save();

        Session::flash('success', 'Tu link ha sido modificado correctamente!');

        return redirect()->action('HistoryRadioProgController@index', [$historyRadioProg->id_history_prog]);
    }

    public function destroyHistories($id){
    	$historyRadioProg = HistoryRadioProg::find($id);

    	$historyRadioProg->delete();

    	Session::flash('success', 'Tu link ha sido eliminado correctamente!');

        return redirect()->back();
    }
}
