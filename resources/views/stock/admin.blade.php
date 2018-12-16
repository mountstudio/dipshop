@extends('admin.index')

@section('admin_content')

    <div class="row mb-3 justify-content-end">
        <div class="col-auto">
            <a href="{{ route('stock.create') }}" class="btn btn-success">Новая акция</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="stocks-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Начало</th>
                    <th>Конец</th>
                    <th>Действия</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@push('stylesheets')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

@endpush

@push('scripts')
    <script>
        $(function() {
            $('#stocks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getstocks') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'end_date', name: 'end_date' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>

    <script>
        $(function () {
            $('#delete-confirmation').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('form#delete-form').attr('action', '/admin/stock/' + id);
            })
        });
    </script>
@endpush