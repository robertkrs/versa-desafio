<div class="titulo-pagina">
    <h1>{{$model->id ? 'Editar' : 'Criação'}} de Agendamento</h1>
</div>
<div class="informacao-pagina">
    <div style="width:30%; margin-left: auto; margin-right: auto;">
        <form action={{ $model->id ? route('agenda.update', [$model->id]) : route('agenda.store') }} method="post" id="agenda-form">
            @csrf
            <input type="hidden" name="_method" value="{{ isset($method) ? $method : 'POST' }}" />
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="titulo" class="form-label">Titulo:</label>
                    <input name="titulo" type="text" value="{{ old('titulo', $model->titulo) }}" placeholder="Titulo" class="form-control">
                    {{ $errors->has('titulo') ? $errors->first('titulo') : ''}}
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-6 form-group">
                    <label for="data_inicio" class="form-label">Data Inicial:</label>
                    <input name="data_inicio" type="text" value="{{ old('data_inicio', $model->data_inicio) }}" placeholder="Data Inicial" class="form-control">
                    {{ $errors->has('data_inicio') ? $errors->first('data_inicio') : ''}}
                </div>

                <div class="col-sm-6 form-group">
                    <label for="data_fim" class="form-label">Data Final:</label>
                    <input name="data_fim" type="text" value="{{ old('data_fim', $model->data_fim) }}" placeholder="Data Final" class="form-control">
                    {{ $errors->has('data_fim') ? $errors->first('data_fim') : ''}}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12 form-group">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" rows="5" style="resize: none; width:100%">{{$model->descricao ? $model->descricao : ''}}</textarea>
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}
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
