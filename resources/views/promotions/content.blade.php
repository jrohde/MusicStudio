@extends('adminMain')

@section('title', '| Agregar Articulos')

@section('content')

   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         @include('partials._messages')
         <h1 class="text-center" style="color:#DEBF45"> Promo: {{$promo->name}}</h1>
         <h4 class="text-center" style="color:#DEBF45">Agrega los articulos</h4>
      </div>
   </div>
   <div class="row" style="margin-top:35px">

        @foreach ($types as $type)
           {!!Form::open(['route' => ['promoContent.store', $promo->id], 'method' => 'POST', 'data-parsley-validate' => ''])!!}
           <input type="hidden" name="promo_id" value="{{$promo->id}}">
           <div class="col-md-6 col-md-offset-3">
              <div class="panel panel-primary" style="border:none">
                  <div class="panel-heading" style="color:#fff; font-weight:600; font-size:16px; text-transform:uppercase">{{$type->name}} <img src="{{asset($type->icon)}}" style="width:26px; filter: brightness(0) invert(1);opacity:1; margin-left:5px"></div>
                  @foreach ($type->articles as $articles)
                     <ul class="list-group">
                        <li class="list-group-item" style="color:#444; font-weight:600; padding-top:15px; padding-bottom:15px">
                           {{$articles->name}} {{$articles->desc}}
                           <span class="badge" style="float:none; background-color:#a94442">{{$articles->stock}}</span>
                           {{Form::checkbox('article_id[]',$articles->id, null, ['style' => 'float:right; margin-right:115px', 'class' => 'article'])}}
                           <input type="number" name="amount[]" class="form-control" style="position:absolute; display:inline-block; top:9px; right:15px;width:17%; background:#eee" placeholder="Max:{{$articles->stock}}" max:"{{$articles->stock}}">
                        </li>
                     </ul>
                  @endforeach
                  {{Form::submit('Guardar '. $type->name, ['class' => 'btn btn-success btn-block', 'style' => 'border-radius:0'])}}
               </div>
            </div>
           {!!Form::close()!!}
         @endforeach
   </div>

@stop

@section('specificAdminJs')
   <script>
      $(".article").on("click", function(){
         var parent = $(this).parent(".list-group-item");
         if ($(this).is(":checked")) {
            parent.css({"background-color":"#d0f1d0", "color": "#269826"});
         }else{
            parent.css({"background-color":"#fff", "color": "#444"});
         }
      })
   </script>
   @include('partials._parsley')
@stop
