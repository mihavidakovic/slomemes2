<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Najboljši slovenski memesi ustvarjeni z našim novim meme generatorjem!" />
    <meta name="Keywords" content="slo memes, slo, memes, memeji, slovenian_memes, slovenian memes, smešne slike, zabavne slike, vici, vic, smešno, lol" />
    <meta name=“robots” content=index,follow>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Slomemes</title>
    <meta property="og:url"                content="{{url()->current()}}" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.atwho.css') }}" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    
    <!-- Scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('js')
    <script src="/js/jquery.caret.js"></script>
    <script src="/js/jquery.atwho.js"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    @include('mentions::assets')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('css')
</head>
<body onload="pridobiPoste()">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/sl_SI/sdk.js#xfbml=1&version=v2.8&appId=239832329821923";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span>SLO</span>
                        <span>MEMES</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav menu-levo">
                        <li class="active"><a href="{{route('domov')}}">Domov</a></li>
                        <li class="disabled"><a href="">🔥 Najboljše 🔥</a></li>
                        <li><a href="{{route('chatter.home')}}">Forum</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Prijava</a></li>
                            <li><a href="{{ route('register') }}">Registracija</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('profil', Auth::user()->name)}}"><i class="ion ion-person"></i> Moj profil</a>
                                    </li>
                                    <li>
                                        <a href="{{route('profil-uredi')}}"><i class="ion ion-edit"></i> Uredi profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ion ion-android-walk"></i> Odjava
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="dodaj">
                                <div class="button">
                                    <p>Dodaj meme</p>
                                    <div class="chose">
                                        <a href="{{ route('meme-ustvari') }}" class="ustvari"><i class="ion ion-paintbrush"></i> Ustvari</a>
                                        <a href="{{ route('meme-dodaj') }}" class="dodaj"><i class="ion ion-plus"></i> Dodaj</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70811643-2', 'auto');
  ga('send', 'pageview');

</script>
@if(Request::is('/'))
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@endif
@if(Request::is('meme/ustvari'))
    <script type="text/javascript" src="{{ asset('js/meme-generator.js') }}"></script>
@endif

</body>
</html>
