@extends('admin.index')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Зарегистрирован</th>
                    <th>Номер телефона</th>
                    <th>Дип. номер</th>
                    <th>Посольство</th>
                    <th>Скидка</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('users._activate_modal')

@endsection


@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getusers') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'code', name: 'code' },
                    { data: 'embassy', name: 'embassy' },
                    { data: 'percent', name: 'percent' },
                    { data: 'is_active', name: 'status'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
    <script>
        $('#activate-user').on('show.bs.modal', function (e) {
            let btn = $(e.relatedTarget);
            $('#activate-user').find('form').attr('action', btn.data('url'));
        })
    </script>
@endpush