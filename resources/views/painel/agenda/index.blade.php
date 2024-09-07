@extends('layouts.basico')

@section('titulo', 'Gestão da Agenda')

@section('conteudo')

<div id="container-agenda">
    <div class="titulo-pagina">
        <h1>Gestão da Agenda</h1>
    </div>
    <div style="width:60%; margin-left: auto; margin-right: auto;">
        <a href="{{route('agenda.create')}}" class="btn btn-primary mb-3" id="add-agenda"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</a>
        <table id="table-agenda" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($model))
                        @foreach($model as $agenda)
                        <tr>
                            <td>{{$agenda->titulo}}</td>
                            <td>{{$agenda->data_inicio}}</td>
                            <td>{{$agenda->data_fim}}</td>
                            <td class="text-center">
                                <a href="{{ route('agenda.edit', [$agenda->id]) }}" id="agenda-editar" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true" title="Editar Registro"></i></a>
                                <a href="{{ route('agenda.show', [$agenda->id]) }}" id="agenda-show" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true" title="Exibir Registro"></i>
                                </a>
                                <a href="{{ route('agenda.destroy', [$agenda->id]) }}" id="agenda-destroy" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true" title="Remover Registro"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
        </table>
    </div>
</div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $table = $('#table-agenda');
            $table.on('click', '#agenda-destroy', function(e){
                var link = $(this).attr('href');

                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: link,
                    type: 'POST',
                    data: {_method: 'DELETE'},
                    success: function (data) {
                        if(data.error) {
                            return false;
                        }else{
                            window.location.reload(true);
                        }
                    }
                })
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
@endpush