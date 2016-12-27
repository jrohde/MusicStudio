@if(Request::is('/'))

<header style="background-image: url('http://wallpapercave.com/wp/PqZjYhp.jpg');">
    <div class="intro-content">
        <!-- <img src="{{--url('img/isologo_big_yellow.png')--}}" class="img-responsive img-centered" alt=""> -->
            <div class="brand-name">A Music Project</div>
            <hr style="width:40%">
            <div class="brand-name-subtext">made by Gabriele Battiato and Laravel</div>
    </div>
    <div class="scroll-down">
        <a class="btn page-scroll" href="#home"><i class="fa fa-angle-down fa-fw"></i></a>
    </div>
</header>

@elseif(Request::is('blog'))
    <header style="background-image: url('http://goo.gl/SJJT3d');background-attachment:fixed" id="headerOthers">
        <div class="intro-content">
            <div class="brand-name">
                News
            </div>
        </div>
    </header>

@elseif(Request::is('promociones'))
    <header style="background-image: url('http://goo.gl/Weza51');background-attachment:fixed" id="headerOthers">
        <div class="intro-content">
            <div class="brand-name">
                Let's Combo!
            </div>
        </div>
    </header>

@elseif(Request::is('proyectos', 'proyectos/imagenes/*', 'proyectos/videos/*'))
    <header style="background-image: url('https://goo.gl/ZMqdtB');background-attachment:fixed" id="headerOthers">
        <div class="intro-content">
            <div class="brand-name">
                Our Projects
            </div>
        </div>
    </header>
@elseif(Request::is('radio', 'radio/programa/*'))
    <header style="background-image: url('http://goo.gl/nIvFuC');background-attachment:fixed" id="headerOthers">
        <div class="intro-content">
            <div class="brand-name">
                Radio
            </div>
        </div>
    </header>

@endif
