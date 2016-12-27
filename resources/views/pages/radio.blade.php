@extends('main')

@section('title', '| Radio')

@section('content')

<div class="container intro" id="promociones">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
            <h1>Radio</h1>
            <h3><small><em>Estudio de grabación</em></small></h3>
            <hr>
            <p class="intro-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
        </div>
    </div>
</div>

<div class="row radio-programs">
    @foreach($programs as $program)
    <div class="col-md-4 {{ count($programs) === 1 ? "col-md-offset-4" :""}} col-program">
        <div class="panel panel-default panel-program" style="background-image:url({{str_replace('\\', '/', asset($program->image))}}); background-position: center; background-size: cover;-webkit-background-size: cover; -moz-background-size: cover;-o-background-size: cover;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-inOverlay">
                        <h2 class="text-center"><span>{{$program->name}}</span></h2>
                        <h3><span>Día: todos los {{$program->day}} </span></h3>
                        <h3><span>Hora: {{$program->time}} </span></h3>
                        <hr>
                        <div class="row button-program">
                            <div class="col-md-10 col-md-offset-1 col-button-program">
                                <a href="{{route('program.single', $program->id)}}" type="button" class="btn btn-danger btn-block">Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop