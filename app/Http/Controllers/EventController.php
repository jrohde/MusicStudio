<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;
use Session;
use DB;

class EventController extends Controller
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
        $eventos = Event::all();
        return view('events.index')->with(compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'date' => 'required',
            'place' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png|max:2000'
            ]);

        $evento = new Event;
        $evento->name = $request->name;
        $evento->date = $request->date;
        $evento->place = $request->place;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $tmp_file = base_path() . 'uploads/events' . $img_name;
                $evento->image = $request->file('image')->move('uploads/events', $img_name);
            }
        }else{
            $evento->image = 'uploads/events/event_default.jpg';
        }

        $evento->save();

        Session::flash('success', 'Tu nuevo evento ha sido guardado con éxito');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $evento = Event::find($id);
        return view('events.edit')->with('evento', $evento);
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
        $evento = Event::find($id);
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'place' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png|max:2000'
            ]);

        $evento->name = $request->input('name');
        $evento->date = $request->input('date');
        $evento->place = $request->input('place');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $img_name = $request->file('image')->getClientOriginalName();
                $tmp_file = base_path() . 'uploads/events' . $img_name;
                $evento->image = $request->file('image')->move('uploads/events', $img_name);
            }
        }

        $evento->save();

        Session::flash('success', 'Tu nuevo evento ha sido modificado con éxito');

        return redirect()->route('admin.eventos.index', [$evento->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Event::find($id);

        $evento->delete();

        Session::flash('success', 'Tu nuevo evento ha sido eliminado con éxito');

        return redirect()->back();
    }
}
