@extends('admin.index')

@section('admin_content')

    <form action="{{ route('stock.store') }}" method="POST" class="col-8" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name_of_stock">Название акции</label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_stock" placeholder="Название акции" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label for="start_date">Начало акции</label>
                <input class="form-control" type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group col-6">
                <label for="end_date">Конец акции</label>
                <input class="form-control" type="date" id="end_date" name="end_date" required>
            </div>
        </div>

        <div id="selects">

        </div>

        <div class="form-group text-center">
            <a href="#" id="create-select" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        <!-- TODO create inputs with jquery ajax -->

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script>
        let option = [];

        $.ajax({
            url: '/api/products',
            method: 'GET',
            success: function (res) {
                let products = res.products;

                for (let i = 0; i < products.length; i++) {
                    option.push('<option value="' + products[i].id + '">' + products[i].name + '</option>');
                }
            },
            error: function () {
                console.log('error');
            }
        });

        let createBtn = $('#create-select');

        createBtn.click(function(e) {
            e.preventDefault();

            appendSelect();
        });

        let selectId = 0;

        function appendSelect() {
            let formRow = '<div class="form-row position-relative" id="new-row-' + selectId + '"></div>';
            let formGroupSelect = '<div class="form-group col-6" id="new-select-group-' + selectId + '"></div>';
            let formGroupInput = '<div class="form-group col-6" id="new-input-group-' + selectId + '"></div>';
            let input = '<label for="new-input-\' + selectId + \'">Акционная цена</label><input name="prices[]" type="text" id="new-input-' + selectId + '" class="form-control" required>';
            let select = '<label for="new-select-' + selectId + '">Продукт</label><select name="products[]" class="" id="new-select-' + selectId + '" required></select>';
            const removeBtn = $('<div class="btn btn-danger position-absolute" data-id="' + selectId + '" style="right: -40px; bottom: 22px;"><i class="fas fa-times"></i></div>');

            $('#selects').append(formRow);
            $('#new-row-'+selectId).append(formGroupSelect).append(formGroupInput).append(removeBtn);
            removeSelect(removeBtn);
            $('#new-select-group-'+selectId).append(select);
            $('#new-input-group-'+selectId).append(input);
            appendOptions();
            selectId++;
        }

        function appendOptions() {
            let select = $('#new-select-'+selectId);
            select.append(option);
            select.selectize();
        }

        function removeSelect(item) {
            item.click(function (e) {
                e.preventDefault();

                let id = $(this).data('id');
                $('#new-row-'+id).remove();
            });
        }
    </script>
@endpush