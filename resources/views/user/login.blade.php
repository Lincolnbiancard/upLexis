<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css') }}">
    <link rel="stylesheet" rel href="https://fonts.googleapis.com/css?family=Fredoka+One">
        <title>Login UpLexis</title>
    </head>
    <body>

        

        <div class="background"></div>

        <section id="conteudo-view" class="login">

            <h1>UpLexis</h1>
            <h3>Consulta ao blog UpLexis</h3>

            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}


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

                <p>Acesse o sistema</p>

                <label for="">
                    {!! Form::text('name', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}
                </label>

                <label for="">
                    {!! Form::password('password', null, ['class' => 'input', 'placeholder' => 'Senha']) !!}
                </label>

                {!! Form::submit('Entrar') !!}

            {!! Form::close()  !!}

        </section>

    </body>
</html>