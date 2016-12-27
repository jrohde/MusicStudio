<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Program;
use App\ProgramDetail;
use App\ImgRadioProgram;
use App\VideoRadioProg;
use App\HistoryRadioProg;
use App\ConductorRadio;
use App\ImageHomeCateg;
use App\ImageHome;
use App\Event;
use App\EventImage;
use App\EventVideo;
use App\Production;
use App\ProductionImage;
use App\ProductionVideo;
use App\MusicProduction;
use App\Record;
use App\MusicRecord;
use App\RecordImage;
use App\RecordVideo;
use DB;

class PagesController extends Controller
{
    //INDEX
    public function getIndex(){
        $imagenesHome = ImageHome::orderBy('created_at', 'asc')->take(9)->get();
        $categories = ImageHomeCateg::all();
        return view('pages.index')->with(compact('imagenesHome'))->with(compact('categories'));
    }

    //PROMOCIONES
    public function getPromotions(){
        $posts = Post::orderBy('id', 'desc')->take(4)->get();
    	return view('pages.promotions')->with(compact('posts'));
    }

    //PROJECTOS
    public function getProjects(){
        $eventos = Event::all();
        $producciones = DB::table('productions')->leftJoin('music_productions', 'productions.id', '=', 'music_productions.id_music')->select('productions.*', 'music_productions.link_spotify', 'music_productions.link_soundcloud')->get();
        $records = DB::table('records')->leftJoin('music_records', 'records.id', '=', 'music_records.id_music')->select('records.*', 'music_records.link_spotify', 'music_records.link_soundcloud')->get();
    	return view('pages.projects')->with(compact('eventos'))->with(compact('producciones'))->with(compact('records'));
    }
    public function getImgProd($id){
        $produccion = Production::find($id);
        $prodImages = ProductionImage::where('id_prod', '=', $produccion->id)->select('name', 'image')->get();
        return view('productions.imgProd')->with('produccion', $produccion)->with(compact('prodImages'));
    }
    public function getVideoProd($id){
        $produccion = Production::find($id);
        $prodVideos = ProductionVideo::where('id_prod', '=', $produccion->id)->select('name', 'basic_url', 'link_video')->orderBy('created_at', 'desc')->get();
        return view('productions.videoProd')->with('produccion', $produccion)->with(compact('prodVideos'));
    }
    public function getImgEvent($id){
        $evento = Event::find($id);
        $eventoImages = EventImage::where('id_event', '=', $evento->id)->select('name', 'image')->get();
        return view('events.imgEvento')->with('evento', $evento)->with(compact('eventoImages'));
    }
    public function getVideoEvent($id){
        $evento = Event::find($id);
        $eventoVideos = EventVideo::where('id_event', '=', $evento->id)->select('name', 'basic_url', 'link_video')->get();
        return view('events.videoEvento')->with('evento', $evento)->with(compact('eventoVideos'));
    }
    public function getImgRecord($id){
        $record = Record::find($id);
        $recordImages = RecordImage::where('id_rec', '=', $record->id)->select('name', 'image')->get();
        return view('records.imgRecord')->with('record', $record)->with(compact('recordImages'));
    }
    public function getVideoRecord($id){
        $record = Record::find($id);
        $recordVideos = RecordVideo::where('id_rec', '=', $record->id)->select('name', 'basic_url', 'link_video')->orderBy('created_at', 'desc')->get();
        return view('records.videoRecord')->with('record', $record)->with(compact('recordVideos'));
    }

    //RADIO
    public function getRadio(){
        $programs = Program::orderBy('id', 'desc')->get();
        return view('pages.radio')->with('programs', $programs);
    }
    public function getSingleProgram($id){
        $program = Program::find($id);
        $progDetail = DB::table('program_details')->where('id_program', '=', $program->id)->orderBy('created_at', 'desc')->first();
        $imgRadioPrograms = DB::table('img_radio_programs')->where('id_img_prog', '=', $program->id)->orderBy('created_at', 'desc')->get();
        $videoRadioProgs = DB::table('video_radio_progs')->where('id_video_prog', '=', $program->id)->orderBy('created_at', 'desc')->get();
        $historyRadioProgs = DB::table('history_radio_progs')->where('id_history_prog', '=', $program->id)->orderBy('created_at', 'desc')->get();
        $conductorsRadio = ConductorRadio::where('id_img_conduct', '=', $program->id)->orderBy('name', 'desc')->get();
        return view('pages.radioProgram')->with('program', $program)->with('progDetail', $progDetail)->with(compact('imgRadioPrograms'))->with(compact('videoRadioProgs'))->with(compact('historyRadioProgs'))->with(compact('conductorsRadio'));
    }

    //BLOG
    public function getBlog(Request $Request){
        $posts = Post::where(function($query) use ($Request){
            if ($term = $Request->get('term')) {
                $query->orWhere('title', 'like', '%' . $term . '%');
                $query->orWhere('author', 'like', '%' . $term . '%');
                $query->orWhere('body', 'like', '%' . $term . '%');
                return response()->json(['success' => true, 'term' => $term]);
            }
        })->orderBy('id', 'desc')->paginate(7);
        return view('pages.blog')->with(compact('posts'));
    }

    public function getPost($id){
        $post = Post::find($id);
        return view('pages.masPost')->with('post', $post);
    }
}
