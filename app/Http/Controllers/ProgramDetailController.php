<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use App\Program;
use App\ProgramDetail;
use DB;
use Session;

class ProgramDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $program = Program::find($id);
        $radioProgs = ProgramDetail::where('id_program', '=', $program->id)->orderBy('created_at', 'asc')->take(1)->get();
        return view('programDetail.create')->with('program', $program)->with(compact('radioProgs'));
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
            'link_streaming' => 'required',
            'intro' => 'required',
            'id_program' =>'required'
            ]);

        $progDetail = new ProgramDetail;
        $progDetail->link_streaming = $request->link_streaming;
        $progDetail->intro = $request->intro;
        $progDetail->id_program = $request->input('id_program');

        $progDetail->save();

        Session::flash('success', 'Los detalles han sido guardado con éxito!');

        return redirect()->back();
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
        $progDetail = ProgramDetail::find($id);
        //$progDetails = DB::table('program_details')->where('id_program', '=', $id)->get();
        return view('programDetail.edit')->with('program', $program)->with('progDetail', $progDetail);
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
        $progDetail = ProgramDetail::find($id);
        $this->validate($request, [
            'link_streaming' => 'required',
            'intro' => 'required'
            ]);

        $progDetail->link_streaming = $request->input('link_streaming');
        $progDetail->intro = $request->input('intro');

        $progDetail->save();

        Session::flash('success', 'Los detalles han sido modificados con éxito!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progDetail = ProgramDetail::find($id);

        $progDetail->delete();

        Session::flash('success', 'Los detalles han sido eliminados con éxito!');

        return redirect()->back();

    }
}
