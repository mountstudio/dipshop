<div class="shadow-sm sticky-top bg-dark border-top border-bottom pb-2 pt-5">
    <div class="container d-flex align-items-center">
        <a class="mr-auto p-0" href="/"></a>

        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light" href="{{ route('alcohol') }}">
                    <img src="{{ asset('images/icons/wine.svg') }}" class="svg category_logo" width="30" height="30">
                    <p>Алкоголь</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light" href="{{ route('cigaretes') }}">
                    <img src="{{ asset('images/icons/pipe.svg') }}" class="svg category_logo" width="30" height="30">
                    <p>Сигареты</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light" href="{{ route('jewelry') }}">
                    <img src="{{ asset('images/icons/wine.svg') }}" class="svg category_logo" width="30" height="30">
                    <p>Драгоценности</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light" href="{{ route('perfume') }}">
                    <img src="{{ asset('images/icons/perfume.svg') }}" class="svg category_logo" width="30" height="30">
                    <p>Парфюмерия</p>
                </a>
            </li>
            <li class="nav-item">
                <img src="{{ asset('images/icons/coffee-bean.svg') }}" class="svg category_logo" width="30" height="30">
                <a class="nav-link font-weight-bold text-light" href="{{ route('coffee') }}">Кофе</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-light" href="{{ route('accessories') }}">
                    <img src="{{ asset('images/icons/wristwatch.svg') }}" class="svg category_logo" width="30" height="30">
                    <p>Аксессуары</p>
                </a>
            </li>
        </ul>
        <ul class="nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light position-relative font-weight-light cart" data-toggle="tooltip" data-placement="bottom" title="Корзина временно не доступна">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span class="badge badge-pill badge-light position-absolute" style="top: 0; right: -7px;">1</span>
                </a>
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