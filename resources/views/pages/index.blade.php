@extends('main')

@section('title', '| Home')

@section('content')

<div class="container intro" id="home" data-anchor="top">
     <div class="row animatedParent animateOnce">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h1>...Make it loud!</h1>
                    <h3><small><em>code nice</em></small></h3>
                </div>
                <div class="col-md-4">
                     <img src="{{url('img/icons/sound-icon.png')}}" class="img-responsive" alt="sound waves" style="width: 100px; opacity: 0.4">
                </div>
            </div>
            <hr>
            <p class="intro-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
        </div>
        <div class="col-md-4">
            <a href="{{url('promociones')}}" type="button" class="btn btn-primary btn-block btn-promo-home animated bounceIn">Our Promos</a>
        </div>
    </div>
    <div class="row intro-panels animatedParent animateOnce" data-sequence='500'>
        <div class="col-md-4 animated fadeIn" data-id='1'>
            <div class="panel panel-default">
              <div class="panel-body">
                <h4>Basic panel example</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
        </div>
        <div class="col-md-4 animated fadeIn" data-id='2'>
            <div class="panel panel-default">
              <div class="panel-body">
                <h4>Basic panel</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
        </div>
        <div class="col-md-4 animated fadeIn" data-id='3'>
            <div class="panel panel-default">
              <div class="panel-body">
                <h4>Basic panel example sit amet</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
        </div>
    </div>

</div>

<!--INIZIO PROFILES-->

<div class="row">
    <div class="col-md-6 col-pic-cv hidden-sm hidden-xs">
    <div class="profile-image-rob"></div>
       <!--  <img src="assets/img/profile_1.jpg" class="img-responsive" alt="Roberto Calzoni" style="min-height:500px;max-height: 500px; width:100%"> -->
    </div>
    <div class="col-md-6 col-cv-rob">
        <h2 class="text-center profile-h2-rob">Bob Dylan</h2>
        <h3 class="text-center profile-h3-rob">Songwriter - Flok</h3>
        <hr class="hr-profile">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                 <p class="text-center profile-p-rob">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </p>
            </div>
        </div>
<!--                 <div class="row row-icons-attitude">
            <div class="col-md-4">
                 <img class="img-circle icons-attitude center-block" src="assets/img/icons/guitar.png" alt="">
            </div>
            <div class="col-md-4">
                 <img class="img-circle icons-attitude center-block" src="assets/img/icons/guitar.png" alt="">
            </div>
            <div class="col-md-4">
                 <img class="img-circle icons-attitude center-block" src="assets/img/icons/guitar.png" alt="">
            </div>
        </div> -->
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-cv-fab">
        <h2 class="text-center profile-h2-fab">David Bowie</h2>
        <h3 class="text-center profile-h3-fab">Songwriter - Glam Rock</h3>
        <hr class="hr-profile">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                 <p class="text-center profile-p-fab">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-pic-cv hidden-sm hidden-xs">
    <div class="profile-image-fab"></div>
       <!--  <img src="assets/img/profile_1.jpg" class="img-responsive" alt="Roberto Calzoni" style="min-height:500px;max-height: 500px; width:100%"> -->
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-pic-cv hidden-sm hidden-xs">
    <div class="profile-image-nic"></div>
       <!--  <img src="assets/img/profile_1.jpg" class="img-responsive" alt="Roberto Calzoni" style="min-height:500px;max-height: 500px; width:100%"> -->
    </div>
    <div class="col-md-6 col-cv-nic">
        <h2 class="text-center profile-h2-nic">BB KING</h2>
        <h3 class="text-center profile-h3-nic">Songwriter - Blues</h3>
        <hr class="hr-profile">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                 <p class="text-center profile-p-nic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </p>
            </div>
        </div>
    </div>
</div>

<!--END PROFILES-->

<!--SECOND PARALLAX-->

<div class="row second-parallax" style="background-image: url('https://goo.gl/DnU6a4');">
    <div class="col-md-10 col-md-offset-1">
        <div class="intro-content">
            <div class="brand-name text-center">Why Us?</div>
            <br>
            <div class="brand-name-subtext text-center">Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
        </div>
    </div>
</div>

<!--END SECOND PARALLAX-->

<!--  INIZIO GALLERIA -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center" style="margin-top: 0; margin-bottom:25px">...select a category!</h2>
        </div>
    </div>
    @foreach($categories->chunk(5) as $categorie)
        <div class="row" style="margin-bottom:25px;">
            <div class="col-md-6 col-md-offset-3">
                <select class="form-control input-lg" id="selectCateg">
                        <option value="all">Todas</option>
                    @foreach($categorie as $category)
                        <option value=".category-{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-warning text-center" style="display: none;" id="alert-images"></div>
        </div>
    </div>
</div>

<div class="container" id="Container">
    @if(count($imagenesHome) > 0)
        @foreach($imagenesHome as $imageHome)
            <div class="mix category-{{$imageHome->id_categs}}" style="margin-top: -25px;">
                <div class="image-wrapper overlay-fade-in">
                    <span class="thumbnail" style="margin:0; padding:0; border:none">
                        <a href="{{asset($imageHome->image)}}" data-lightbox="{{$imageHome->id}}"><img src=" {{$imageHome->image}}" class="img-responsive imagehome" id="imgHome">
                            <div class="image-overlay-content">
                                <h2 id="lenteRadioHome"><i class="fa fa-search fa-4x"></i></h2>
                            </div>
                        </a>
                    </span>
                </div>
            </div>
        @endforeach
    @else
        @include('partials._noData')
    @endif
</div>
<!-- END GALLERIA -->

@section('specificJs')
    {{ Html::script('js/plugins/cbpAnimatedHeader.js') }}
     <script>
         $(function(){
            var $selectCateg = $('#selectCateg'),
                $container = $('#Container');

            $('#Container').mixItUp({
                selectors: {
                    filter: '.filter'
                },
                animation: {
                    enable: true,
                    effects: 'fade scale',
                    duration: 600,
                    easing: 'ease-in-out',
                    perspectiveDistance: '3000px',
                    perspectiveOrigin: '50% 50%',
                    queue: true,
                    queueLimit: 1,
                    animateChangeLayout: false,
                    animateResizeContainer: true,
                    animateResizeTargets: false,
                    staggerSequence: null,
                    reverseOut: false
                    },
                callbacks: {
                    onMixFail: function(){
                        $('#alert-images').html('<strong>Actualizeremos esta sección en breve!</strong>').css('margin-bottom','35px').fadeIn(10, function(){
                            $('#alert-images').delay(2000).fadeOut(50);
                        });
                        // we may wish to provide users with feedback when no matching items are found
                    }
                }
              });
            $selectCateg.on('change', function(){
                $container.mixItUp('filter', this.value);
            });
          });

    </script>
@endsection

@stop
