@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="post" id="login-form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="usuario" class="form-label">Usuário:</label>
                            <input name="usuario" type="text" value="{{ old('usuario') }}" placeholder="Usuário" class="form-control">
                            {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="senha" class="form-label">Senha:</label>
                            <input name="senha" type="password"  value="{{ old('senha') }}"placeholder="Senha" class="form-control">
                            {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                        <div class="col-sm-6 text-center">
                            <a href="{{route('user.index')}}" class="btn btn-primary">Cadastrar-se</a>
                        </div>
                    </div>
                </form>
            </div>
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
