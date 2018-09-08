@extends('admin.index')

@section('admin_content')

	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
	  	<div class="form-group">
	    	<label for="name_of_product">Название продукта</label>
	    	<input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_product" placeholder="Название продукта" value="{{ old('name') }}">
			@if($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
	  	</div>
		<div class="form-group">
			<label for="image_of_product">Картинка продукта</label>
			<input type="hidden" name="edit" value="1">
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
					<option value="{{ null }}" {{ old('type_id') ? '' : 'selected' }} disabled>Выберите тип продукта...</option>
					@foreach($types as $type)
						<option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
				<input name="price" type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}" id="price_of_product" placeholder="Цена">
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