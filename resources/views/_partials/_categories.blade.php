<div class="shadow-sm sticky-top bg-dark shadow pt-5">
    <div class="container d-flex align-items-center">
        <a class="mr-auto p-0" href="/">
            <img id="logo" class="m-2 transition-500" src="/images/2.5.png" style="width:120px; height:auto;" alt="">
        </a>

        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('jewelry') }}">
                    <img src="{{ asset('images/icons/discount.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.discount')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('alcohol') }}">
                    <img src="{{ asset('images/icons/wine.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.alkogol')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('cigaretes') }}">
                    <img src="{{ asset('images/icons/pipe.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.tobacco')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('jewelry') }}">
                    <img src="{{ asset('images/icons/diamond.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.jewelry')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('perfume') }}">
                    <img src="{{ asset('images/icons/perfume.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.perfumery')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('coffee') }}">
                    <img src="{{ asset('images/icons/coffee-bean.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.coffee')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('accessories') }}">
                    <img src="{{ asset('images/icons/wristwatch.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.accessories')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  font-weight-bold text-light" href="{{ route('accessories') }}">
                    <img src="{{ asset('images/icons/gift.svg') }}" class="svg category_logo" width="30" height="30">
                    <p class="m-0">{{__('categories.gift')}}</p>
                </a>
            </li>
        </ul>
        <ul class="nav ml-auto">
            <li class="nav-item">
                @include('_partials._cart')
            </li>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        $('.cart').tooltip();
    </script>

    <script>
        $(function(){
            jQuery('img.svg').each(function(){
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');

                    // Add replaced image's ID to the new SVG
                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if(typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass+' replaced-svg');
                    }

                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');

                    // Check if the viewport is set, else we gonna set it if we can.
                    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                    }

                    // Replace image with new SVG
                    $img.replaceWith($svg);

                }, 'xml');

            });
        });

    </script>
@endpush