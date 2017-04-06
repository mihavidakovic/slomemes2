@extends('layouts.app')

@section('content')
<div class="popup-wrap">
  <div class="popup">
    <h2>Yo! Pozdravljen na Slomemes.si</h2>
    <p>Ker opažamo, da si na tej spletni strani prvič, ti želimo dati nekaj napotkov kako navigirati po njen.</p>
    <div class="mobile hidden-xl hidden-lg hidden-md hidden-sm">
      <ul class="swipe">
        <li>
          <svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#E1464B" id="icon-18-one-finger-swipe-left"><path d="M13.1361237,7 C13.3426558,6.41316896 13.8977039,6 14.549999,6 C15.3842018,6 16.049999,6.67543961 16.049999,7.50863659 L16.049999,14.5 L16.049999,17 L17.049999,17 L17.049999,14.4325233 L17.049999,12.4908981 C17.049999,11.6762201 17.7215719,11 18.549999,11 C19.3842018,11 20.049999,11.6674978 20.049999,12.4908981 L20.049999,14.5082011 L20.049999,16 L21.049999,16 L21.049999,14.5082011 L21.049999,13.4912653 C21.049999,12.6625444 21.7215719,12 22.549999,12 C23.3842018,12 24.049999,12.6676622 24.049999,13.4912653 L24.049999,14.6781559 L24.049999,17 L25.049999,17 L25.049999,16.7497253 L25.049999,14.5063976 C25.049999,13.6764628 25.7215719,13 26.549999,13 C27.3842018,13 28.049999,13.6744372 28.049999,14.5063976 L28.049999,19.2468012 L28.049999,22.5 C28.049999,26.6421358 24.6921348,30 20.549999,30 C16.7902839,29.9995418 14.5599948,27.9488875 12.7973745,24.9830936 C8.88536099,18.4007216 6.08386193,15.3887562 7.17103171,14.2957153 C8.28162878,13.1791206 10.9915994,15.5979243 13.049999,17.7983451 L13.049999,8 L6,8 L9.25,11.25 L8.5,12 L4,7.5 L8.5,3 L9.25,3.75 L6,7 L13.1361237,7 L13.1361237,7 Z" id="one-finger-swipe-left"/></g></g></svg>
          <p>Povleci v levo če ti meme mi všeč</p>
        </li>
        <li>
          <svg height="32px" version="1.1" viewBox="0 0 32 32" width="32px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#E1464B" id="icon-19-one-finger-swipe-right"><path d="M15.1151466,8 L15.1151466,14.5 L15.1151466,17 L16.1151466,17 L16.1151466,14.4325233 L16.1151466,12.4908981 C16.1151466,11.6762201 16.7867195,11 17.6151466,11 C18.4493494,11 19.1151466,11.6674978 19.1151466,12.4908981 L19.1151466,14.5082011 L19.1151466,16 L20.1151466,16 L20.1151466,14.5082011 L20.1151466,13.4912653 C20.1151466,12.6625444 20.7867195,12 21.6151466,12 C22.4493494,12 23.1151466,12.6676622 23.1151466,13.4912653 L23.1151466,14.6781559 L23.1151466,17 L24.1151466,17 L24.1151466,16.7497253 L24.1151466,14.5063976 C24.1151466,13.6764628 24.7867195,13 25.6151466,13 C26.4493494,13 27.1151466,13.6744372 27.1151466,14.5063976 L27.1151466,19.2468012 L27.1151466,22.5 C27.1151466,26.6421358 23.7572825,30 19.6151466,30 C15.8554315,29.9995418 13.6251425,27.9488875 11.8625221,24.9830936 C7.95050863,18.4007216 5.14900956,15.3887562 6.23617935,14.2957153 C7.34677642,13.1791206 10.056747,15.5979243 12.1151466,17.7983451 L12.1151466,7.50863659 C12.1151466,6.66642015 12.7867195,6 13.6151466,6 C14.2706533,6 14.8221757,6.41705896 15.028382,7 L23.049999,7 L19.799999,3.75 L20.549999,3 L25.049999,7.5 L20.549999,12 L19.799999,11.25 L23.049999,8 L15.1151466,8 L15.1151466,8 Z" id="one-finger-swipe-right"/></g></g></svg>
          <p>Povleci v levo če ti je meme všeč</p>
        </li>
      </ul>
    </div>
    <div class="desktop visible-xs visible-lg visible-md visible-sm hidden-xs" style="display: none">
       <p>Če ti je meme, ki je prikazan, všeč ali pa ne, z gumbom <i class="ion ion-thumbsup"></i> in <i class="ion ion-thumbsdown"></i> oceni in prikazal se ti bo nasljednji izmed top memeov današnjega dneva. Vse lajkane in dislajkane memese lahko vidiš na podstrani <a href="#">Moj profil</a>.</p>
    </div>
    <div class="button-zapri">
      Okej, zapri popup
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
      <div class="main box col-lg-12">
        @include('partials.picture')
      </div>
    </div>
</div>
@endsection
