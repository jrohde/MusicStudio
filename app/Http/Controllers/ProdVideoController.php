<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use BD;
use App\Production;
use App\ProductionVideo;

class ProdVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index($id){
    	$produccion = Production::find($id);
    	$prodVideos = ProductionVideo::where('id_prod', '=', $produccion->id)->get();
    	return view('productions.storeVideo')->with('produccion', $produccion)->with(compact('prodVideos'));
    }
     public function storeVideo(Request $request){

     	$this->validate($request, [
     		'name' => 'required',
     		'link_video' => 'required',
     		'id_prod' => ''
     		]);
     	$prodVideo = new ProductionVideo;
     	$prodVideo->name = $request->name;
     	$prodVideo->link_video = $request->link_video;
     	$prodVideo->id_prod = $request->id_prod;
     	$prodVideo->basic_url = 'https://www.youtube.com/embed/';

     	$prodVideo->save();

     	Session::flash('success', 'Tu video ha sido guardado con éxito');

        return redirect()->back();
     }

     public function updateVideo(Request $request, $id){
         $prodVideo = ProductionVideo::find($id);
         $this->validate($request, [
             'name' => 'required',
             'link_video' => 'required',
             'id_prod' => ''
         ]);
         $prodVideo->name = $request->input('name');
         $prodVideo->link_video = $request->input('link_video');
         $prodVideo->id_prod = $request->input('id_prod');
         $prodVideo->basic_url = 'https://www.youtube.com/embed/';

         $prodVideo->save();

         Session::flash('success', 'Tu video ha sido modificado con éxito');

         return redirect()->action('ProdVideoController@index', [$prodVideo->id_prod]);
     }

     public function destroyVideo($id){
     	$prodVideo = ProductionVideo::find($id);
     	$prodVideo->delete();
     	Session::flash('success', 'Tu video ha sido eliminado con éxito');
        return redirect()->back();
     }
}
