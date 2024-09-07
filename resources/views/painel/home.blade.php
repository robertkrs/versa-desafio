@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h4>Seja Bem Vindo!! {{($_SESSION['nome'])}}
        </div>
    </div>

    <div class="rodape">
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(33) 98886-9730</span>
            <br>
            <span>robertreis323@gmail.com</span>
        </div>
    </div>
@endsection
