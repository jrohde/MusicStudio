@extends('adminMain')

@section('title', '| Crear Promo')

@section('content')

   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         @include('partials._messages')
         <h1 class="text-center" style="color:#DEBF45">Crea Promo</h1>
      </div>
   </div>
   <div class="row">
     <div class="col-md-6 col-md-offset-3">
        {!!Form::open(['route' => 'promotion.store', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
         {{Form::label('name', 'Nombre', ['class' => 'white'])}}
         {{Form::text('name', null, ['class' => 'form-control', 'required'])}}
         {{Form::label('desc', 'Descripción', ['class' => 'white space-form'])}}
         {{Form::text('desc', null, ['class' => 'form-control',  'required'])}}
         <div class="row">
           <div class="col-md-6">
             <label class="white space-form" for="price"> Precio</label>
             <div class="input-group">
                 <span class="input-group-addon">$</span>
                 <input type="text" class="form-control" name="price" placeholder="12.000" required/>
             </div>
           </div>
           <div class="col-md-6" style="padding-top:35px">
             {{Form::checkbox('role', '0', null)}}
             <label id="check_main" class="white space-form" for="price" style="padding-left:10px">Es la Promo principal?</label>
           </div>
         </div>
         <div class="row" style="margin-top:15px">
           <div class="col-md-12">
             {{Form::submit('Guardar', ['class' => 'btn btn-success btn-block'])}}
           </div>
         </div>
        {!!Form::close()!!}
     </div>
   </div>
   <div class="row" style="margin-top: 45px;">
      <div class="col-md-8 col-md-offset-2" style="margin-top: 15px;">
      @if(count($promos) >= 1)
         <table class="table">
            <thead>
               <th>Nombre:</th>
               <th>Descripción</th>
               <th>Precio:</th>
               <th>Rol:</th>
               <th colspan="4">Acciones:</th>
            </thead>
            <tbody>
            @foreach($promos as $promo)
               <tr>
                  <td style="vertical-align: middle; font-weight: 600"> {{$promo->name}} </td>
                  <td style="vertical-align: middle; font-weight: 600"> {{$promo->desc}} </td>
                  <td style="vertical-align: middle; font-weight: 600"> ${{number_format($promo->price, 3)}} </td>
                  <td style="vertical-align: middle; font-weight: 600">
                     @if($promo->role === 0)
                        <img src="{{asset('img/no.png')}}" class="img-responsive center-block" style="width: 20px;">
                     @elseif($promo->role === 1)
                        <img src="{{asset('img/ok.png')}}" class="img-responsive center-block" style="width: 20px;">
                     @endif
                  </td>
                  <td><a href="{{route('promoContent.get', $promo->id)}}" type="button" class="btn btn-info btn-block btn-sm">Contenido</a></td>
                  <td><button type="button" class="btn btn-warning btn-block btn-sm" data-toggle="modal" data-target="#edit_{{$promo->id}}">Editar</button></td>
                  <!-- MODAL -->
                 <div class="modal fade" id="edit_{{ $promo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                       <div class="modal-content" style="background-color: #313340;">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title" id="myModalLabel">Editar - {{ $promo->name }}</h4>
                          </div>
                          <div class="modal-body">
                             {!! Form::model($promo, [ 'route' => ['promotion.update', $promo->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                             {{Form::label('name', 'Nombre', ['class' => 'white'])}}
                             {{Form::text('name', null, ['class' => 'form-control', 'required'])}}
                             {{Form::label('desc', 'Descripción', ['class' => 'white space-form'])}}
                             {{Form::text('desc', null, ['class' => 'form-control',  'required'])}}
                             <div class="row">
                               <div class="col-md-6">
                                 <label class="white space-form" for="price"> Precio</label>
                                 <div class="input-group">
                                     <span class="input-group-addon">$</span>
                                     <input type="text" class="form-control" name="price" placeholder="12.000" required value="{{number_format($promo->price, 3)}}"/>
                                 </div>
                               </div>
                               <div class="col-md-6" style="padding-top:35px">
                                 {{Form::checkbox('role', '0', null)}}
                                 <label id="check_main" class="white space-form" for="price" style="padding-left:10px">Es la Promo principal?</label>
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
                  <td>
                     {!!Form::open(array('route' => array( 'promotion.destroy', $promo->id), 'method' => 'DELETE', 'style' => 'text-align:center','id' => 'formPrevent'))!!}
                        {{Form::button('Borrar', ['type' => 'submit', 'class' => 'btn btn-danger btn-block btn-sm', 'id' => 'delete'])}}
                     {!!Form::close()!!}
                  </td>
               </tr>
            @endforeach
            </tbody>
         </table>
         @else
            <div class="alert alert-warning text-center"><strong>Todavía no tenés promociones actívas!</strong></div>
         @endif
      </div>
   </div>

@stop

@section('specificAdminJs')
   @include('partials._parsley')
   <script>
   $("input[type=checkbox]").on("click", function(){
      if($(this).is(":checked")) {
         $(this).val('1');
         $('#check_main').css({"color":"#69c36a"}).text('Promo Principal');
     } else {
         $(this).val('0');
         $('#check_main').css({"color":""}).text('Es la Promo principal?');
     }
   });

   </script>


@stop
