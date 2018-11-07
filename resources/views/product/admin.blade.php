@extends('admin.index')

@section('admin_content')

    <div class="row mb-3 justify-content-end">
        <div class="col-auto">
            <a href="{{ route('product.create') }}" class="btn btn-success">Новый продукт</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="products-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Категория</th>
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
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getproducts') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'category.name', name: 'category.name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>

    <script>
        $(function () {
            $('#delete-confirmation').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('form#delete-form').attr('action', '/admin/product/' + id);
            })
        });
    </script>
@endpush