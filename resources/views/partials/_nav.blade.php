<!-- Navigation -->
    <!-- Note: navbar-default and navbar-inverse are both supported with this theme. -->
    <nav class="navbar navbar-inverse navbar-fixed-top @if(Request::is('/')) {{'navbar-expanded'}} @endif">
        <a class="navbar-brand page-scroll" href="#page-top">
            <img src="{{url('img/isologo_big_yellow.png')}}" class="img-responsive logo-nav" alt="" style="">
        </a>
        @if(Auth::check()) <span style="display: block;position: absolute;margin-left: 130px;margin-top: 8px;font-size: 20px;color: white;font-weight: 400;">Bienvenido {{Auth::user()->name}} </span> @endif
        <div class="container-fluid fluid-navbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li class="{{(Request::is('/') ? "active" : "")}}">
                        <a class="page-scroll" href="/">Home</a>
                    </li>
                    <li class="{{(Request::is('promociones') ? "active" : "")}}">
                        <a class="page-scroll" href="/promociones">Promos</a>
                    </li>
                    <li class="{{(Request::is('proyectos', 'proyectos/producciones/imagenes/*', 'proyectos/producciones/videos/*', 'proyectos/grabaciones/imagenes/*', 'proyectos/grabaciones/videos/*') ? "active" : "")}}">
                        <a class="page-scroll" href="/proyectos">Projects</a>
                    </li>
                     <li class="{{(Request::is('radio', 'radio/programa/*') ? "active" : "")}}">
                        <a class="page-scroll" href="/radio">Radio</a>
                    </li>
                    <li class="{{(Request::is('blog', 'blog/post/*') ? "active" : "")}}">
                        <a class="page-scroll" href="/blog">News</a>
                    </li>
                        @if(Auth::check())
                            <li>
                                <a class="page-scroll" href="/admin" target="_blank">Admin</a>
                            </li>
                        @endif
                    <li>
                        @if(Auth::check())
                            <a class="page-scroll" href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                        @else
                            <a class="page-scroll hidden-sm hidden-xs" href="{{route('login')}}"  target="_blank"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!--<nav class="navbar navbar-default navbar-static-top hidden-sm hidden-xs" style="padding-top: 65px; margin-bottom: 0; background-color: #E8CD62">
      <div class="container-fluid fluid-navbar">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-right" role="search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Busca novedades..." style="border:none">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-warning" type="button" style="padding-top:6px; padding-bottom: 6px; padding-left: 10px; padding-right: 10px"><span class="glyphicon glyphicon-search"></span> </button>
                            </span>
                        </div>
                    </div>
                </div>
            <a href="#" class="btn btn-circle-sm" style="margin-left: 40px;margin-right: 10px; background-color: transparent; border:1px solid #fff;"><span class="glyphicon glyphicon-user" style="color:white; opacity: 0.99;"></span></a>
            <span style="color:white;"><a href="#" style="font-weight: 500;">Login</a></span>
          </form>
        </div>
      </div>
    </nav>-->
