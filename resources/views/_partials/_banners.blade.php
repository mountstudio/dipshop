<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12 p-0 owl-carousel owl-theme">
            <img src="/images/big-banner.png" class="img-fluid" alt="">
            <img src="/images/big-banner.png" class="img-fluid" alt="">
            <img src="/images/big-banner.png" class="img-fluid" alt="">
            <img src="/images/big-banner.png" class="img-fluid" alt="">
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplayTimeout: 1000,
            nav:true,
            dots: false,
            items: 1,
            navText : ['<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>']
        });
    </script>
@endpush
