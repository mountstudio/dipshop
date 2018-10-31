<table class="table table-bordered mb-0">
    <thead class="f-size-20 font-weight-bold">
    <tr>
        <th class="text-center" scope="col">№</th>
        <th class="text-center" scope="col">Картинка</th>
        <th class="text-center" scope="col">Наименование</th>
        <th class="text-center" scope="col">Цена</th>
        <th class="text-center" scope="col">Количество</th>
        <th class="text-center" scope="col">Сумма</th>
    </tr>
    </thead>
    <tbody>
    @foreach($basket->products as $product)
        <tr>
            <th class="align-middle" scope="row">
                <div class="row justify-content-center f-size-20 font-weight-bold">
                    {{ $loop->index + 1 }}
                </div>
            </th>
            <td class="p-1">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-auto">
                        <img class="img-fluid" width="90" height="90" src="http://dipshop/uploads/small/{{ $product->image }}">
                    </div>
                </div>
            </td>
            <td class="align-middle">
                <span class="font-weight-bold">{{ $product->name }}</span>
                <br>
                <b>{{ $product->category->name }}</b>
            </td>
            <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="font-weight-bold ml-1">{{ $product->price }}&euro;</span>
                </div>
            </td>
            <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="mx-1 font-weight-bold text-center" style="min-width: 13px;">{{ $product->pivot->qty }}</span>
                </div>
            </td>
            <td class="align-middle">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="font-weight-bold ml-1">{{ $product->pivot->price }}&euro;</span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row justify-content-end mt-3 f-size-20 font-weight-bold">
    <div class="col-auto">
        Итого: {{ $basket->total_price }}&euro;
    </div>
</div>

<div class="row f-size-16 font-weight-normal">
    <div class="col-12">
        <h2>Информация о покупателе</h2>
    </div>
    <div class="col-6">
        <p><span class="font-weight-bold">Имя:</span> {{ $basket->name }}</p>
    </div>
    <div class="col-6">
        <p><span class="font-weight-bold">Фамилия:</span> {{ $basket->last_name }}</p>
    </div>
    <div class="col-6">
        <p><span class="font-weight-bold">Посольство:</span> {{ $basket->embassy }}</p>
    </div>
    <div class="col-6">
        <p><span class="font-weight-bold">№ дип.карты:</span> {{ $basket->code }}</p>
    </div>
    <div class="col-6">
        <p><span class="font-weight-bold">Доставка:</span> {{ $basket->delivery ? 'есть' : 'нет' }}</p>
    </div>
    @if($basket->delivery)
        <div class="col-12">
            <p><span class="font-weight-bold">Адрес доставки:</span> {{ $basket->address }}</p>
        </div>
        <div class="col-6">
            <p><span class="font-weight-bold">Дата доставки:</span> {{ date('d/m/Y', strtotime($basket->delivery_date)) }}</p>
        </div>
        <div class="col-6">
            <p><span class="font-weight-bold">Время доставки:</span> {{ $basket->delivery_time }}</p>
        </div>
    @endif
</div>