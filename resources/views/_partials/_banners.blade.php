<div class="container-fluid position-relative bg-white">
    <div class="backdrop"></div>
    <div class="row">
        <div id="offers" class="col-12 p-0 owl-carousel owl-theme">
            <img src="/images/mini-images/1.jpg" class="img-fluid" alt="">
            <img src="/images/mini-images/2.jpg" class="img-fluid" alt="">
            <img src="/images/mini-images/3.jpg" class="img-fluid" alt="">
            <img src="/images/mini-images/4.jpg" class="img-fluid" alt="">
            <img src="/images/mini-images/5.jpg" class="img-fluid" alt="">
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#offers').owlCarousel({
            loop:true,
            autoplayTimeout: 1000,
            nav:true,
            dots: false,
            items: 1,
            navText : ['<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>']
        });
    </script>
@endpush
