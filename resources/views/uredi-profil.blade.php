@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row subpage uredi-profil">
      <div class="col-lg-offset-3 col-lg-5 col-md-8 col-sm-8 col-xs-12" style="margin-bottom: 20px; float: left;">
        <div class="inside box">
          <header>
            <p>Uredi profil</p>
          </header>
          <div class="content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('flash_message'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok" style="margin-right: 10px;"></span><em> {!! session('flash_message') !!}</em></div>
            @endif   
            <form method="post">
              <div class="form-group">
                <label for="username">Uporabniško ime</label>
                <input type="text" class="form-control" id="username" value="{{$user->name}}" disabled="">
              </div>
              <hr>
              <div class="form-group">
                <label for="username">Podpis na forumu <small>(max 100 znakov)</small></label>
                <textarea name="forum_podpis" class="form-control">{{$user->forum_podpis}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary" style="float: left;">Shrani spremembe</button>
              <button type="reset" class="btn btn-default" style="float: right;">Deaktiviraj račun</button>
              {{csrf_field()}}
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
