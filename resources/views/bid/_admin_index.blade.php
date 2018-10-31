@extends('admin.index')

@section('admin_content')
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="bids-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Question</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#bids-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getbids') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'question', name: 'question' },
                ]
            });
        });
    </script>
@endpush