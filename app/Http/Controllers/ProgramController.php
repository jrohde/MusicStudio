<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Program;
use App\ProgramDetail;
use App\ImgRadioProgram;
use App\VideoRadioProg;
use App\HistoryRadioProg;
use App\ConductorRadio;
use DB;
use Session;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'desc')->get();
        $progDetails = DB::table('program_details')->get();
        return view('program.index')->with(compact('programs'))->with(compact('progDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'day' => 'required',
            'time' => 'required',
            'image' => 'required|image'
            ]);

        $program = new Program;
        $program->name = $request->name;
        $program->day = $request->day;
        $program->time = $request->time;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $file = $request->file('image');
                $temp_file = base_path() . 'uploads/radio_program/' . $file;
                $filename = str_random(6).'_'.$file->getClientOriginalName();
                $program->image = $request->file('image')->move('uploads/radio_program/', $filename);
            }
        }

        $program->save();

        Session::flash('success', 'Tu nuevo programa de radio ha sido guardado correctamente!');

        return redirect()->route('admin.radio.index', [$program->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        $progDetail = ProgramDetail::where('id_program', '=', $program->id)->value('intro');
        $imgRadioProgram = ImgRadioProgram::where('id_img_prog', '=', $program->id)->pluck('image');
        $videoRadioProg = VideoRadioProg::where('id_video_prog', '=', $program->id)->pluck('link_video');
        $historyRadioProg = HistoryRadioProg::where('id_history_prog', '=', $program->id)->pluck('id_history_prog');
        $conductorRadio = ConductorRadio::where('id_img_conduct', '=', $program->id)->pluck('name');
        return view('program.show')
            ->with('program', $program)
            ->with('progDetail', $progDetail)
            ->with('imgRadioProgram', $imgRadioProgram)
            ->with('videoRadioProg', $videoRadioProg)
            ->with('historyRadioProg', $historyRadioProg)
            ->with('conductorRadio', $conductorRadio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view('program.edit')->with('program', $program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $this->validate($request, [
            'name' => 'required',
            'day' => 'required',
            'time' => 'required',
            'image' => 'required|image'
            ]);

        $program->name = $request->input('name');
        $program->day = $request->input('day');
        $program->time = $request->input('time');
        //$program->image = $request->input('image');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $img_name = $request->file('image')->getClientOriginalName();
                $temp_file = base_path() . 'uploads/radio_program/' . $img_name;
                $program->image = $request->file('image')->move('uploads/radio_program/', $img_name);

            }
        }


        $program->save();

        Session::flash('success', 'Tu programa de radio ha sido modificado con éxito!');

        return redirect()->route('admin.radio.index', [$program->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        $program->delete();

        Session::flash('success', 'El programa de radio ha sido eliminado con éxito!');
        return redirect()->route('admin.radio.index');
    }
}
