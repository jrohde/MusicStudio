    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Retina.js - Load first for faster HQ mobile images. -->
    {{ Html::script('js/plugins/retina/retina.min.js') }}
    {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- FONTS -->
    {{ Html::style( asset('font-awesome/css/font-awesome.min.css') ) }}
    {{ Html::style( asset('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic') ) }}
    {{ Html::style( asset('http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900') ) }}
    {{ Html::style( asset('http://fonts.googleapis.com/css?family=Montserrat:400,700') ) }}
    <!-- Plugin CSS -->
    {{ Html::style( asset('css/plugins/owl-carousel/owl.carousel.css') ) }}
    {{ Html::style( asset('css/plugins/owl-carousel/owl.theme.css') ) }}
    {{ Html::style( asset('css/plugins/owl-carousel/owl.transitions.css') ) }}
    {{ Html::style( asset('css/plugins/magnific-popup.css') ) }}
    {{ Html::style( asset('css/plugins/background.css') ) }}
    {{-- Html::style( asset('css/plugins/animate.css') ) --}}
    {{ Html::style( asset('css/plugins/sweetalert.css') ) }}
    {{ Html::style( asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css') ) }}
    {{-- Html::style( asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker-standalone.min.css') ) --}}
    {{ Html::style( asset('css/style.css') ) }}
    {{ Html::style( asset('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css') ) }}
    {{ Html::style( asset('css/plugins/animations.css') ) }}
    {{ Html::style( asset('https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css') ) }}
    {{ Html::script('https://www.google.com/recaptcha/api.js') }}
    <!-- IE8 support for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->