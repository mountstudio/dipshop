<div class="container-fluid position-relative bg-white">
    <div class="row">
        <div id="similar-carousel" class="col-12 p-0 owl-carousel similar-carousel owl-theme">
            @include('product._list')
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('.similar-carousel').owlCarousel({
        loop:true,
        autoplayTimeout:1000,
        margin: 10,
        nav:true,
        dots:false,
        navText : ['<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:8
            }
        }
    });
</script>
@endpush