<div class="container-fluid position-relative bg-white">
    <div class="row">
        <div id="similar-carousel" class="col-12 p-0 owl-carousel similar-carousel owl-theme">
            @include('product._list')
        </div>
    </div>
</div>

@prepend('scripts')
<script>
    $('.similar-carousel').owlCarousel({
        loop: true,
        rewind: true,
        autoplayTimeout:1000,
        margin: 10,
        nav:true,
        dots:false,
        navText : ['<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>'],
        responsive:{
            0:{
                items:1
            },
            300:{
                items:2
            },
            600:{
                items:3
            },
            700:{
                items:4
            },
            800:{
                items:5
            },
            1000:{
                items:5
            },
            1300:{
                items:7
            },
            1600:{
                items:8
            }
        }
    });
</script>
@endprepend