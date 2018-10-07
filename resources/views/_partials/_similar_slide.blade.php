<div class="container-fluid position-relative bg-white">
    <div class="backdrop"></div>
    <div class="row">
        <div id="similar-carousel" class="col-12 p-0 owl-carousel similar-carousel owl-theme">
            @foreach($similars as $similar)
                <div class="col-3 d-inline">
                    <img src="{{ asset('uploads/'.$similar->image) }}" class="" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('#similar-carousel').owlCarousel({
        loop:true,
        autoplayTimeout: 1000,
        nav:false,
        dots: true,
        items: 4,
        // navText : ['<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>']
    });
</script>
@endpush