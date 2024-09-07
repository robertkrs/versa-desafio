@extends('layouts.basico')

@section('titulo', 'Cadastro de Usuário')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastro de Usuário</h1>
        </div>
      
        <div class="informacao-pagina">
            <div style="width:50%; margin-left: auto; margin-right: auto;">
                <form action={{ route('user.store') }} method="post" id="form-usuario">
                    @csrf
                    <input type="hidden" name="_method" value="{{ isset($method) ? $method : 'POST' }}" />
                    <input type="hidden" name="id" value="{{ isset($model->id) ? $model->id : null }}" />
                    
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input name="name" type="text" value="{{ old('name', $model->name) }}" placeholder="Nome" class="form-control">
                            {{ $errors->has('name') ? $errors->first('name') : ''}}
                        </div>
                    </div>

                    <div clas="row">
                        <div class="col-sm-12 mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input name="email" type="text" value="{{ old('email', $model->email) }}" placeholder="E-mail" class="form-control" {{$model->id ? 'readonly' : ''}}>
                            {{ $errors->has('email') ? $errors->first('email') : ''}}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input name="cpf" type="text" value="{{ old('cpf', $model->cpf) }}" placeholder="CPF" class="form-control">
                            {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}    
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input name="telefone" type="text" value="{{ old('telefone', $model->telefone) }}" placeholder="Telefone" class="form-control">
                            {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input name="senha" type="password"  value="{{ old('senha') }}"placeholder="Senha" class="form-control">
                            {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="outra-senha" class="form-label">Outra Senha:</label>
                            <input name="outra-senha" type="password"  value="{{ old('outra-senha') }}"placeholder="Repita a mesma senha" class="form-control">
                            {{ $errors->has('outra-senha') ? $errors->first('outra-senha') : ''}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $form = $('#form-usuario');
            
            $form.find('[name=cpf]').inputmask(['999.999.999-99', '99.999.999/9999-99']);

            $form.find('[name=telefone]').inputmask("(99) 9999-99999")
            .focusout(function (event) {  
                var target, phone, element;  
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                phone = target.value.replace(/\D/g, '');
                element = $(target);  
                element.unmask();  
                if(phone.length > 10) {  
                    element.inputmask("(99) 99999-9999");  
                } else {  
                    element.inputmask("(99) 9999-99999");  
                }  
            });
        });
    </script>
@endpush
