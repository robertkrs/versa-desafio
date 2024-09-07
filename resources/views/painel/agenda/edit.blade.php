@extends('layouts.basico')
@section('titulo', 'Editar Agendamento')

@section('conteudo')
    @include('painel.agenda.form', ['method' => 'PUT'])
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var $form = $('#agenda-form');
            $form.find('[name=data_inicio]').datetimepicker({
                format: 'YYYY/MM/DD',
                icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
                }
            })

            $form.find('[name=data_fim]').datetimepicker({
                format: 'YYYY/MM/DD',
                icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
                }
            })
        });
    </script>
@endpush