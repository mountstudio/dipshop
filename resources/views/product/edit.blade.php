@extends('admin.index')

@section('admin_content')

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_of_product">Название продукта</label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_product" placeholder="Название продукта" value="{{ $product->name }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>
        <div class="col-4">
            <img src="{{ asset('uploads/'.$product->image) }}" class="img-fluid" alt="">
        </div>
        <div class="form-group">
            <label for="image_of_product">Картинка продукта</label>
            <input name="image" type="file" id="image_of_product" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
            @if($errors->has('image'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('image') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="category_of_product">Тип продукта</label>
                <select name="category_id" id="category_of_product" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                    <option value="{{ null }}" disabled>Выберите тип продукта...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('category_id') }}</strong>
					</span>
                @endif
            </div>
            <div id="hidden-select" class="form-group mx-4 d-none">
                <label for="child-category">Категория продукта</label>
                <select id="child-category" class="form-control {{ $errors->has('child-category') ? 'is-invalid' : '' }}"></select>
                @if($errors->has('child-category'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('child-category') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="price_of_product">Цена</label>
            <input name="price" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $product->price }}" id="price_of_product" placeholder="Цена">
            @if($errors->has('price'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin_product_categories.js') }}"></script>
@endpush