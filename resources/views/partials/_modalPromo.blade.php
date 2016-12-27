<!-- Modal -->
<div class="modal fade" id="modalPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #313340;">
                <div class="modal-body" style="color: #f7f7f7;">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        {!! Form::open(['route' => 'contact_promo', 'method' => 'POST', 'data-parsley-validate' => '', 'class' => 'form-horizontal', 'id' => 'form_promo']) !!}
                            <form method="POST" action="" class="form-horizontal" id="form_promo">
                                <h3 class="text-center" style="color:#f7f7f7" id="h3_promo_change">Que Promo te interesa?</h3 class="text-center">
                                <h3 class="text-center" style="color:#f7f7f7; display: none;" id="new_promo_change"></h3 class="text-center">
                                <select class="form-control input-lg" name="plan" id="select_plan" required>
                                    <option value=" ">Elegí...</option>
                                    <option value="Jimi Hendrix">Jimi Hendrix</option>
                                    <option value="Cacho Castaña">Cacho Castaña</option>
                                    <option value="Miguel Abuelo">Miguel Abuelo</option>
                                </select>
                                <hr>
                                <div class="form-group">
                                    <label for="name"  class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre completo" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel" class="col-sm-2 control-label">Teléfono</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="tel" placeholder="Teléfono" name="tel">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-sm-12'>
                                        <div class="form-group">
                                            <label for="date"  class="col-sm-2 control-label">Cuando?</label>
                                            <div class='input-group date col-sm-8' id='datetimepicker1'>
                                                <input type='text' class="form-control" name="date" id="date" placeholder="Fecha evento" style="margin-left: 15px;" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar" style="margin-left: 15px;"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="col-sm-2 control-label">Mensaje</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" name="message" placeholder="Decínos algo más..."></textarea>
                                    </div>
                                </div>
                                <div class="response"></div>
                                <div class="col-sm-10 col-sm-offset-2" style="padding-right: 0;padding-left: 5px;margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-default btn-block" id="submit_form_promo">Reserva Tu Promo </button>
                                    <img src="{{asset("img/eq-loader.gif")}}" class="center-block" style="width:200px;display:none;-webkit-filter:brightness(0) invert(1);filter:brightness(0) invert(1)" id="loader">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #252327; border:none;">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white">&times;</span></button>
                </div>
            </div>
      </div>
</div>
