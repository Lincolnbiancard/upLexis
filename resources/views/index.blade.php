@extends('layout')

@section('content')

    <div class="content">
            <h1 class="heading">Artigos do blog upLexi </h1>

            <p class="description">Passe o mouse sobre a imagem para ver mais detalhes do artigo.</p>
            <a class="card" href="#!">
            
    @foreach ($articles as $article)
        {{-- Front --}}
        <div class="front" style="background-image: url({{ $article->image }}); background-size: cover;">
            <p>
                {{ $article->title }}
            </p>
        </div>

        {{-- back --}}
        <div class="back">
        <div>
        <p>{{ $article->title }}</p>
        
        {{-- btn para ir para o artigo no blog --}}
        <form target="blank" action="{{ $article->link }}"
         method="get">
            <button type="submit" class="button">Veja mais</button>
        </form>

        <br>

        {{-- btn deletar --}}
        <form action="destroy/{{ $article->id }}" method="post">
            <input class="btn btn-danger" type="submit" value="Excluir" />
            <input type="hidden" name="_method" value="delete" />
            {!! csrf_field() !!}
        </form>

        </div>
        
        </div></a><a class="card" href="#!">
    @endforeach
        
@endsection