@extends('adminMain')

@section('title', '| Todos los Articulos')

@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1 class="text-center" style="color:#DEBF45">{{$type->name}}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h5 class="text-center"><a href="{{url('admin/articulos')}}" style="color:#DEBF45">Volver a sección anterior</a></h5>
    @include('partials._messages')
  </div>
</div>
<div class="row" style="margin-top:25px">
  <div class="col-md-12">
     <div class="row">
      <div class="col-md-2"><h4>Nombre</h4></div>
      <div class="col-md-3"><h4>Descripción</h4></div>
      <div class="col-md-2"><h4>Cantidad</h4></div>
      <div class="col-md-5"><h4>Acciones</h4></div>
     </div>
     <hr style="margin-top:0; margin-bottom:0">
     @foreach ($articles as $article)
       <div class="row" style="padding:10px">
          <div class="col-md-2"><p>{{$article->name}}</p></div>
          <div class="col-md-3"><p>{{$article->desc}}</p></div>
          <div class="col-md-2"><p>{{$article->stock}}</p></div>
          <div class="col-md-5">
             <div class="row">
               <div class="col-md-6">
                  {!!Form::open(['route' => ['article.destroy', $article->id], 'id' => 'formPreventArticle', 'method' => 'DELETE'])!!}
                    {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'deleteArticle'])}}
                 {!!Form::close()!!}
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#edit_{{$article->id}}">Editar</button>
               </div>
             </div>
          </div>
       </div>
       <hr style="margin-top:0px; margin-bottom:0px">
       <!-- Modal -->
      <div class="modal fade" id="edit_{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #313340;">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Editar - {{ $article->name }}</h4>
               </div>
               <div class="modal-body">
                  {!! Form::model($article, [ 'route' => ['article.update', $article->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                  <div class="row">
                    <div class="col-md-8">
                       {{Form::label('name', 'Nombre', ['class' => 'white'])}}
                       {{Form::text('name', null, ['class' => 'form-control', 'required' => ''])}}
                    </div>
                  </div>
                     {{Form::label('desc', 'Descripción', ['class' => 'white space-form'])}}
                     {{Form::text('desc', null, ['class' => 'form-control', 'required' => ''])}}
                     <div class="row">
                       <div class="col-md-6">
                          {{Form::label('stock', 'Cantidad', ['class' => 'white space-form'])}}
                          {{Form::number('stock', null, ['class' => 'form-control', 'required' => ''])}}
                       </div>
                       <div class="col-md-6">
                          {{Form::label('type_id', 'Categoría', ['class' => 'white space-form'])}}
                          <select class="form-control" name="type_id">
                             <option value="{{$type->id}}" selected>{{$type->name}}</option>
                          </select>
                       </div>
                     </div>
               </div>
               <div class="modal-footer">
                  {{ Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) }}
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
     @endforeach
  </div>
</div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
