<!-- Modal -->
<div class="modal fade" id="show_{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content"  style="background-color: #313340;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$type->name}} <img src="{{asset($type->icon)}}" alt="{{$type->icon}}" style="width:35px; filter: brightness(0) invert(1);margin-left:15px"/></h4>
      </div>
      <div class="modal-body modal-articles">
         <div class="row">
           <div class="col-md-2"><h4>Nombre</h4></div>
           <div class="col-md-3"><h4>Descripción</h4></div>
           <div class="col-md-2"><h4>Cantidad</h4></div>
           <div class="col-md-5"><h4>Acciones</h4></div>
         </div>
         <hr style="margin-top:0; margin-bottom:0">
         @foreach ($type->articles as $articles)
            <div class="row" style="padding:10px;background:#2a2a2d">
              <div class="col-md-2"><p>{{$articles->name}}</p></div>
              <div class="col-md-3"><p>{{$articles->desc}}</p></div>
              <div class="col-md-2"><p>{{$articles->stock}}</p></div>
              <div class="col-md-5">
                 <div class="row">
                   <div class="col-md-6">
                      {!!Form::open(['route' => ['article.destroy', $articles->id], 'id' => 'formPreventArticle', 'method' => 'DELETE'])!!}
                        {{Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:#fff; font-size: 16px"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-block', 'id' => 'deleteArticle'])}}
                     {!!Form::close()!!}
                   </div>
                   <div class="col-md-6">
                      <button type="button" class="btn btn-warning btn-block">Editar</button>
                   </div>
                 </div>
              </div>
            </div>
            <hr style="margin-top:0px; margin-bottom:0px">
         @endforeach
      </div>
      <div class="modal-footer" style="border:none">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
