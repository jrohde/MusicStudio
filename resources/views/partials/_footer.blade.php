    <nav class="navbar navbar-default navbar-static-bottom">
        <div class="container footer">
            <div class="row">
                <div class="col-md-6">
                @include('partials._messages')
                    <h3>Let's keep in touch!</h3>
                    {!!Form::open(['route' => 'contact_footer', 'method' => 'POST', 'class' => 'form-contact-footer', 'id' => 'form_footer', 'files' => true, 'data-parsley-validate' => '', 'novalidate' => ''])!!}
                        <div class="form-group">
                            <!-- <label for="email">Email </label> -->
                            <input type="email" class="form-control input-lg" id="email" placeholder="Email" name="email" data-parsley-type="email"  required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="Nombre">Nombre </label> -->
                            <input type="text" class="form-control input-lg" id="name" placeholder="Name" name="name" data-parsley-minlength="3" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="Nombre">Como podemos ayudarte? </label> -->
                            <textarea rows="3" type="text" class="form-control input-lg" id="name" placeholder="How can we help you?" name="message" data-parsley-minlength="10" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning btn-block" id="enviar">Send</button>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-default adjunta-demo btn-block" id="button-demo" data-toggle="modal" data-target=".modal_archivo">HAVE A DEMO!?</button>
                            </div>
                        </div>
                        <div id="response"></div>
                         <!--INICIO MODAL ARHIVO-->
                             <div class="modal fade modal_archivo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row" style="padding-top: 15px; padding-bottom: 25px ">
                                            <div class="col-md-10 col-md-offset-1">
                                                <h4> Have a demo?! </h4>
                                                <hr>
                                                <input type="text" style="background-color: #eee;color:#444" class="form-control input-lg" id="demo_link" placeholder="Link" name="demo_link" data-parsley-minlength="8">
                                                <input type="text" style="background-color: #eee;margin-top: 15px; color:#444" class="form-control input-lg" id="demo_link" placeholder="Link" name="demo_link1" data-parsley-minlength="8">
                                                <input type="text" style="background-color: #eee;margin-top: 15px;color:#444" class="form-control input-lg" id="demo_link" placeholder="Link" name="demo_link2" data-parsley-minlength="8">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cerrar</button>
                                            {{-- <button type="submit" class="btn btn-success btn-sm">Guardar</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN MODAL ARHIVO-->
                    {!!Form::close()!!}
                </div>

                <div class="col-md-6 col-address">
                   <h3>Made by...</h3>
                   <address>
                    <strong>GABRIELE BATTIATO</strong><br>
                    battiatogabriele@gmail.com<br>
                    Tel: 111-111-111<br>
                   </address>
                   <h3>Using...</h3>
                   <ul class="list-inline" style="margin-top: 25px; margin-bottom: 15px;">
                     <li><img src="{{url('img/icons/html_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                     <li><img src="{{url('img/icons/css_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                     <li><img src="{{url('img/icons/boot_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                     <li><img src="{{url('img/icons/jquery_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                     <li><img src="{{url('img/icons/laravel_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                     <li><img src="{{url('img/icons/mysql_icon.png')}}" class="img-responsive block-center" width="40px"></li>
                   </ul>
                </div>
<!--                 <div class="col-md-4">
                    <img src="http://www.destination360.com/south-america/argentina/buenos-aires/hilton-buenos-aires-map.gif" class="img-responsive">
                </div> -->
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row social">
            <div class="col-md-12 text-center">
                <h3 class="text-center">Follow us on:</h3>
                <ul class="list-inline" style="margin-top: 25px; margin-bottom: 15px;">
                  <li><a href="#" target="_blank"><img src="{{url('img/icons/face.png')}}" class="img-responsive block-center" width="40px"></a></li>
                  <li><a href="#" target="_blank"><img src="{{url('img/icons/insta.png')}}" class="img-responsive block-center" width="40px"></a></li>
                  <li><a href="#" target="_blank"><img src="{{url('img/icons/you.png')}}" class="img-responsive block-center" width="40px"></a></li>
                  <li><a href="#" target="_blank"><img src="{{url('img/icons/sound.png')}}" class="img-responsive block-center" width="40px"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-static-bottom two">
        <div class="container footer-two">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">All rights Reserved</p>
                </div>
            </div>
        </div>
    </nav>
    <!-- Core Scripts -->
    {{ Html::script('http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js') }}
    {{ Html::script('js/plugins/jquery.easing.min.js') }}
    {{ Html::script('js/plugins/classie.js') }}
    {{ Html::script('js/plugins/owl-carousel/owl.carousel.js') }}
    {{ Html::script('js/plugins/jquery.magnific-popup/jquery.magnific-popup.min.js') }}
    {{ Html::script('js/plugins/background/core.js') }}
    {{ Html::script('js/plugins/background/transition.js') }}
    {{ Html::script('js/plugins/background/background.js') }}
    {{ Html::script('js/plugins/wow/wow.min.js') }}
    {{ Html::script('js/plugins/jquery.mixitup.js') }}
    {{ Html::script('js/contact_me.js') }}
    {{ Html::script('js/plugins/jqBootstrapValidation.js') }}
    {{ Html::script('js/vitality.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js') }}
    {{ Html::script('js/plugins/css3-animate-it.js') }}
    {{ Html::script('js/plugins/Parsley/dist/parsley.js') }}
    {{ Html::script('js/plugins/Parsley/dist/i18n/es.js') }}
    <script id="dsq-count-scr" src="//tridente.disqus.com/count.js" async></script>
    {{ Html::script('https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js') }}
    {{ Html::script('https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js') }}

    <script>
        $(document).ready(function(){
            $('.listen').click(function(){
                $(this).closest('.row#row-listen').fadeOut('slow', function(){
                    $(this).siblings('.row#row-btn-listen').fadeIn(800);
                });
            });
            $('.row#row-btn-listen').mouseleave(function(){
                $(this).fadeOut('fast', function(){
                    $(this).siblings('.row#row-listen').fadeIn('fast');
                });
            });
            $('#btn-event').on('click', function(){
                $('.row.projects').fadeOut('fast');
                $('.row.records').fadeOut('fast');
                $('.row.events').delay(185).fadeIn('slow');
            });
            $('#btn-rec').on('click', function(){
                $('.row.projects').fadeOut('fast');
                $('.row.events').fadeOut('fast');
                $('.row.records').delay(185).fadeIn('slow');
            });
            $('#btn-prod').on('click', function(){
                $('.row.events').fadeOut('fast');
                $('.row.records').fadeOut('fast');
                $('.row.projects').delay(185).fadeIn('slow');
            });

            $('#btn-fotos').on('click', function(){
                $('.row.historial-prog').fadeOut('fast');
                $('.row.videos-prog').fadeOut('fast');
                $('.row.fotos-prog').delay(185).fadeIn('slow');
            });
            $('#btn-videos').on('click', function(){
                $('.row.historial-prog').fadeOut('fast');
                $('.row.fotos-prog').fadeOut('fast');
                $('.row.videos-prog').delay(185).fadeIn('slow');
            });
            $('#btn-historial').on('click', function(){
                $('.row.videos-prog').fadeOut('fast');
                $('.row.fotos-prog').fadeOut('fast');
                $('.row.historial-prog').delay(185).fadeIn('slow');
            });

            $('#btn-prod').on('click', function(){
                $('#change-title').html('Producciones');
                $('#change-sub').html('Nuestras Producciones y Grabaciones');
                $('#change-p').html('Nuestras producciones y grabaciones ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            });
            // $('#btn-rec').on('click', function(){
            //     $('#change-title').html('Grabaciones');
            //     $('#change-sub').html('Nuestras Grabaciones');
            //     $('#change-p').html('Las nuestras grabaciones ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            // });
            $('#btn-event').on('click', function(){
                $('#change-title').html('Eventos');
                $('#change-sub').html('Nuestros Eventos');
                $('#change-p').html('Nuestros eventos ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
            });


            $('.btn-project').click(function(){
                $('.btn-project').each($).removeClass('btn-project-dark');
                $(this).addClass('btn-project-dark');
               //$(this).toggleClass('btn-project-blue');
            });

            $('.btn-radio-program').click(function(){
                $('.btn-radio-program').each($).removeClass('btn-project-dark');
                $(this).addClass('btn-project-dark');
               //$(this).toggleClass('btn-project-blue');
            });

            $('.img-conductor').mouseover(function(){
                $(this).siblings('h5').css('color', '#DE4545');
            });
            $('.img-conductor').mouseleave(function(){
                $(this).siblings('h5').css('color', '#EFEFEF');
            });


    //FORM FOOTER CONTACT

            $('#form_footer').submit(function(event){
                event.preventDefault();
                $('#enviar').attr('disabled', true).html('Enviando...');
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    //cache: false,
                    //contentType: false,
                    //processData: false,
                    success: function(rta){
                        if (rta.success === true) {
                            $('#response').addClass('alert alert-success').html('<strong>Tu mensaje ha sido enviado con éxito!</strong>').css('margin-top', '25px');
                            $('#enviar').attr('disabled', true).html('Enviado!');
                            $('input[type="text"]').val('');
                            $('input[type="email"]').val('');
                            $('textarea').val('');
                        }
                    }
                    // error: function(xhr){
                    //     if (xhr === true) {
                    //         $('#response').addClass('alert alert-warning').html('<strong>Tu mensaje no se ha podido enviar! Volvé a intentarlo</strong>').css('margin-top', '25px');
                    //     }
                    // }
                })
            })

    // END FORM FOOTER CONTACT

    //FORM PROMOCIONES

            $('select[name=plan]').on('change', function(){
                var selected = $('select[name=plan]').val();
                $('#h3_promo_change').fadeOut('fast', function(){
                    if (selected === '0') {
                        $('#h3_promo_change').fadeIn('fast');
                        $('#new_promo_change').hide();
                    }else{
                        $('#new_promo_change').fadeIn('fast').text('Promo: ' + selected);
                    }
                })
            })

            $('#form_promo').submit(function(event){
                event.preventDefault();
                $('#submit_form_promo').hide();
                $('#loader').fadeIn('fast');
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(rta){
                        if (rta.success === true) {
                            $('.response').html('<div class="col-sm-10 col-sm-offset-2" style="padding-right: 0;padding-left: 5px; margin-top: 10px;margin-bottom: 10px;"><div class="alert alert-success text-center"><strong>Reserva enviada.<br> En la brevedad nos pondremos en contacto con vos!</strong></div></div>').css('margin-top', '15px');
                            $('#form_promo input').attr('disabled', true).val('');
                            $('#form_promo select').attr('disabled', true).val('');
                            $('#form_promo textarea').attr('disabled', true).val('');
                            $('#loader').fadeOut('fast');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        $('.response').html('<div class="col-sm-10 col-sm-offset-2" style="padding-right: 0;padding-left: 5px; margin-top: 10px;margin-bottom: 10px;"><div class="alert alert-danger text-center"><strong>Tu reserva no se ha podido efectuar!<br>' + jqXHR.status +' || '+textStatus+' </strong></div></div>').css('margin-top', '15px');
                        $('#form_promo input').attr('enable', true);
                        $('#form_promo select').attr('enable', true);
                        $('#form_promo textarea').attr('enable', true);
                        $('#loader').fadeOut('fast');
                        $('#submit_form_promo').attr('enable', true).html('Reserva tu Promo');
                    }
                });
            })

        // END FORM PROMOCIONES
        });
    </script>
