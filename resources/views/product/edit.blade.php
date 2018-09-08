@extends('admin.index')

@section('admin_content')

    <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
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
                <label for="type_of_product">Тип продукта</label>
                <select name="type_id" id="type_of_product" class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
                    <option value="{{ null }}" disabled>Выберите тип продукта...</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $product->type->id === $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_id'))
                    <span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('type_id') }}</strong>
					</span>
                @endif
            </div>
            <div class="form-group">
                <label for="price_of_product">Цена</label>
                <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $product->price }}" id="price_of_product" placeholder="Цена">
                @if($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection