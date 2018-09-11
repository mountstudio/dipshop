<div class="shadow-sm sticky-top bg-white border-top border-bottom py-2">
    <div class="container d-flex align-items-center">
        <a class="mr-auto p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:50px; height:auto;" alt=""></a>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('alcohol') }}">Алкоголь</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Сигареты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Драгоценности</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Подарки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Аксессуары</a>
            </li>
        </ul>
        <ul class="nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-dark position-relative font-weight-light disabled cart" href="#" data-toggle="tooltip" data-placement="bottom" title="Корзина временно не доступна">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span class="badge badge-pill badge-dark position-absolute" style="top: 0; right: -7px;">1</span>
                </a>
            </li>
        </ul>
    </div>
</div>

@push('scripts')
    <script>
        $('.cart').tooltip();
    </script>
@endpush