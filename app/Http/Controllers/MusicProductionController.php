<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Production;
use App\MusicProduction;

class MusicProductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
    	$production = Production::find($id);
    	$musicsProduction = MusicProduction::where('id_music', '=', $production->id)->get();
    	return view('productions.storeMusic')->with('production', $production)->with(compact('musicsProduction'));
    }

    public function storeMusic(Request $request){

    	$this->validate($request, [
    		'name_spotify' => '',
    		'link_spotify' => 'url',
    		'name_soundcloud' => '',
    		'link_soundcloud' => 'url',
    		'id_music' => ''
    		]);

    	$musicProduction = new MusicProduction;

    	$musicProduction->name_spotify = $request->name_spotify;
    	$musicProduction->link_spotify = $request->link_spotify;
    	$musicProduction->name_soundcloud = $request->name_soundcloud;
    	$musicProduction->link_soundcloud = $request->link_soundcloud;
    	$musicProduction->id_music = $request->input('id_music');

    	$musicProduction->save();

    	Session::flash('success', 'Los links han sido guardados con éxito!');

    	return redirect()->back();
    }

    public function getUpdate($id){
    	$production = Production::find($id);
    	$musicProduction = MusicProduction::where('id_music', '=', $production->id)->get()->first();
    	return view('productions.editMusic')->with('production', $production)->with(compact('musicProduction'));
    }

    public function updateMusic(Request $request, $id){

    	$musicProduction = MusicProduction::find($id);

    	$this->validate($request, [
    		'name_spotify' => '',
    		'link_spotify' => 'url',
    		'name_soundcloud' => '',
    		'link_soundcloud' => 'url',
    		'id_music' => ''
    		]);

    	$musicProduction->name_spotify = $request->input('name_spotify');
    	$musicProduction->link_spotify = $request->input('link_spotify');
    	$musicProduction->name_soundcloud = $request->input('name_soundcloud');
    	$musicProduction->link_soundcloud = $request->input('link_soundcloud');
    	$musicProduction->id_music = $request->input('id_music');

    	$musicProduction->save();

    	Session::flash('success', 'Los links han sido modificados con éxito!');

    	return redirect()->route('musicProd.getUpdate', $musicProduction->id_music);

    }

    public function destroyMusic($id){
    	$musicProduction = MusicProduction::find($id);

    	$musicProduction->delete();

    	Session::flash('success', 'Los links han sido eliminados con éxito!');

    	return redirect()->back();
    }
}
