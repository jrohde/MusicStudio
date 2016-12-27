<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Record;
use App\MusicRecord;


class MusicRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        public function index($id){
	    	$record = Record::find($id);
	    	$musicsRecord = MusicRecord::where('id_music', '=', $record->id)->get();
	    	return view('records.storeMusic')->with('record', $record)->with(compact('musicsRecord'));
    }

    public function storeMusic(Request $request){

    	$this->validate($request, [
    		'name_spotify' => '',
    		'link_spotify' => 'url',
    		'name_soundcloud' => '',
    		'link_soundcloud' => 'url',
    		'id_music' => ''
    		]);

    	$musicRecord = new MusicRecord;

    	$musicRecord->name_spotify = $request->name_spotify;
    	$musicRecord->link_spotify = $request->link_spotify;
    	$musicRecord->name_soundcloud = $request->name_soundcloud;
    	$musicRecord->link_soundcloud = $request->link_soundcloud;
    	$musicRecord->id_music = $request->input('id_music');

    	$musicRecord->save();

    	Session::flash('success', 'Los links han sido guardados con éxito!');

    	return redirect()->back();
    }

    public function getUpdate($id){
    	$record = Record::find($id);
    	$musicRecord = MusicRecord::where('id_music', '=', $record->id)->get()->first();
    	return view('records.editMusic')->with('record', $record)->with(compact('musicRecord'));
    }

    public function updateMusic(Request $request, $id){

    	$musicRecord = MusicRecord::find($id);

    	$this->validate($request, [
    		'name_spotify' => '',
    		'link_spotify' => 'url',
    		'name_soundcloud' => '',
    		'link_soundcloud' => 'url',
    		'id_music' => ''
    		]);

    	$musicRecord->name_spotify = $request->input('name_spotify');
    	$musicRecord->link_spotify = $request->input('link_spotify');
    	$musicRecord->name_soundcloud = $request->input('name_soundcloud');
    	$musicRecord->link_soundcloud = $request->input('link_soundcloud');
    	$musicRecord->id_music = $request->input('id_music');

    	$musicRecord->save();

    	Session::flash('success', 'Los links han sido modificados con éxito!');

    	return redirect()->route('musicRec.getUpdate', $musicRecord->id_music);

    }

    public function destroyMusic($id){
    	$musicRecord = MusicRecord::find($id);

    	$musicRecord->delete();

    	Session::flash('success', 'Los links han sido eliminados con éxito!');

    	return redirect()->back();
    }
}
