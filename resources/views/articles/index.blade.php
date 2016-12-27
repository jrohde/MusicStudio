@extends('adminMain')

@section('title', '| Articulos')

@section('content')
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         @include('partials._messages')
         <h1 class="text-center" style="color:#DEBF45">Artículos y Categorías</h1>
      </div>
   </div>
   <div class="row" style="margin-top:45px">
   {{-- FORM TYPES --}}
     <div class="col-md-6" style="border-right:1px solid #777">
        <h4 style="color:#f5f5f5">Agrega una Categoría</h4>
         {!!Form::open(['route' => 'type.store', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
             {{Form::label('name', 'Nombre', ['class' => 'white'])}}
             {{Form::text('name', null, ['class' => 'form-control', 'required' => ''])}}
             {{form::submit('Guardar', ['class' => 'btn btn-success space-form '])}}
         {!!Form::close()!!}
   {{-- END FORM TYPES --}}
   {{-- TYPES LIST --}}
         @if(count($types) > 0)
            <table class="table" style="margin-top:25px">
               <thead>
                  <th>Nombre:</th>
                  <th>Icono:</th>
                  <th colspan="3">Acciones:</th>
               </thead>
               <tbody>
               @foreach($types as $type)
                  <tr>
                     <td style="vertical-align: middle; font-weight: 600"> {{$type->name}} </td>
                     <td> <img src="{{asset($type->icon)}}" alt="{{$type->icon}}" style="width:40px; filter: brightness(0) invert(1);opacity:0.6"/></td>
                     <td>
                     {!!Form::open(['route' => ['type.destroy', $type->id], 'id' => 'formPrevent', 'method' => 'DELETE'])!!}
                        {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'delete'])}}
                     {!!Form::close()!!}
                     </td>
                     <td>
                        <a class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#edit_{{$type->id}}">Editar</a>
                     </td>
                     <td>
                        <a href="{{route('article.get', $type->id)}}" class="btn btn-info btn-sm btn-block">Ver Todos</a>{{-- data-toggle="modal" data-target="#show_{{$type->id}}--}}
                     </td>
                  </tr>
                   <!-- Modal -->
                  <div class="modal fade" id="edit_{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #313340;">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Editar - {{ $type->name }}</h4>
                           </div>
                           <div class="modal-body">
                              {!! Form::model($type, [ 'route' => ['type.update', $type->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                                 {{Form::label('name', 'Nombre:', ['class' => 'space-form white'])}}
                                 {{Form::text('name',null, ['class' => 'form-control', 'required' => ''])}}
                           </div>
                           <div class="modal-footer">
                              {{ Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) }}
                           </div>
                           {!! Form::close() !!}
                        </div>
                     </div>
                  </div>
                  @include('partials._modalArticulos');
               @endforeach
               </tbody>
            </table>
            {{-- END TYPES LIST --}}
         @else
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-warning text-center" style="margin-top:35px"><strong>No hay categorías en el registro!</strong></div>
              </div>
            </div>
         @endif
      </div>
   {{-- FORM ARTICLE --}}
      <div class="row">
         <div class="col-md-6">
           <h4 style=" color:#f5f5f5">Agrega un Artículo</h4>
           {!!Form::open(['route' => 'article.store', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
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
                      <option value="">Elegir categoría...</option>
                     @foreach ($types as $type)
                        <option required value="{{$type->id}}">{{$type->name}}</option>
                     @endforeach
                   </select>
                </div>
              </div>
              {{form::submit('Guardar', ['class' => 'btn btn-success space-form'])}}
          {!!Form::close()!!}
        </div>
      </div>
   {{-- END FORM ARTICLE --}}
   </div>

@stop

@section('specificAdminJs')
	@include('partials._parsley')
@stop
