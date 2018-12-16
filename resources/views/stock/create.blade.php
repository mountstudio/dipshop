@extends('admin.index')

@section('admin_content')

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name_of_stock">Название акции</label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_stock" placeholder="Название акции" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <!-- TODO create inputs with jquery ajax -->

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin_product_categories.js') }}"></script>
@endpush