@extends('admin.index')

@section('admin_content')

	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
	  	<div class="form-group">
	    	<label for="name_of_product">Название продукта</label>
	    	<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_product" aria-describedby="emailHelp" placeholder="Название продукта">
	  	</div>
	  	<div class="form-group">
	    	<label for="exampleInputPassword1">Password</label>
	    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  	</div>
	  	<div class="form-group form-check">
	    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
	   		<label class="form-check-label" for="exampleCheck1">Check me out</label>
	  	</div>
	  	<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endsection