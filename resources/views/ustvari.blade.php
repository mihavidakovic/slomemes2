@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row subpage dodaj">
      <div class="col-lg-8 col-md-8 col-sm-8" style="margin-bottom: 20px; float: left;">
        <div class="inside box">
          <header>
            <p>Ustvari svoj meme</p>
          </header>
          <div class="content">
            <input type="text" id="url" name="2" placeholder="Vnesi url slike">
            <input oninput="memePreview()" type="text" id="tekst" name="1" placeholder="Tekst">
            <canvas id="meme"></canvas>
            <br>
            <button id="dodaj">Dodaj</button>
            <br>
            <button id="shrani">Shrani</button>
            <br>
            <button id="reset">Reset</button>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="inside box">
          <header>
            <p>Stranska vrstica</p>
          </header>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

        </div>      
      </div>
    </div>
</div>
@endsection
