@extends('admin.index')

@section('admin_content')
    @if(Session::has('status'))
        <div class="alert alert-info fixed-top w-25 alert-dismissible fade show" role="alert" style="left: auto; right: 10px; top: 10px;">
            {{ Session::get('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="baskets-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Embassy</th>
                    <th>Delivery</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('_partials._basket_show_modal')
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#baskets-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getbaskets') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'embassy', name: 'embassy' },
                    { data: 'delivery', name: 'delivery' },
                    { data: 'is_delivered', name: 'status'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
    <script>
        $('#show-basket').on('show.bs.modal', function (e) {
            let btn = $(e.relatedTarget);

            $.ajax({
                url: '/basket/' + btn.data('id'),
                success: function (res) {
                    $('#show-basket').find('#basket_id').html('Детали заказа №'+res.basket_id);
                    $('#show-basket').find('.modal-body').html(res.view);
                },
                error: function () {
                    console.log('error');
                }
            });
        })
    </script>
@endpush