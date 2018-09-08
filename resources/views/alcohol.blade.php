@extends('layouts.app')

@section('content')

    @include('_partials._banners')
	@include('_partials._categories') 

	<div class="container w-100 py-5 border-bottom">
		@include('_partials._filters')
	</div>
			
	<div class="container py-4">
		@include('_partials._cards')
	</div>    

@endsection

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplayTimeout: 1000,
            nav:false,
            dots: true,
            items: 1
        })
    </script>
@endpush