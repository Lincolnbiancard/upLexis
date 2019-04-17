@extends('layout')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@section('content')



<div id="form" class="container">

        <div class="cover">
          <h1 id="titulo">Pesquise por alguma palavra chave no blog upLexis</h1>
          <form  class="flex-form" action="search" method="POST">
            @csrf
            <label for="from">
              <i class="ion-location"></i>
            </label>
            <input type="search" name="param" placeholder="Pensando em algo?">
            <input type="submit" value="Pesquisar">
          </form>

        {{-- msg de login --}}
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>	

                <strong>{{ $message }}</strong>

        </div>

        @endif


        @if ($message = Session::get('error'))

        <div class="alert alert-danger alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>	

                <strong>{{ $message }}</strong>

        </div>

        @endif


        @if ($message = Session::get('warning'))

        <div class="alert alert-warning alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>	

            <strong>{{ $message }}</strong>

        </div>

        @endif


        @if ($message = Session::get('info'))

        <div class="alert alert-info alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>	

            <strong>{{ $message }}</strong>

        </div>

        @endif


        @if ($errors->any())

        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert">×</button>	

            Please check the form below for errors

        </div>

        @endif
        {{-- FIM msg de login --}}


          <div id="madeby">
            <span>
              Photo by <a href="https://unsplash.com/@benblenner" target="_blank">Ben Blennerhassett</a>
            </span>
          </div>
        </div>
</div>

@endsection