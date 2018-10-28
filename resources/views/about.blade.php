@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 f-size-18 font-weight-normal">
                <p>
                    Компания "ОсОО Дипмаркет" специализируется на розничной торговле беспошлинными товарами для посольств, консульств, международных организаций и всех, кто имеет привилегии покупать товары без пошлины. То есть для лиц и организаций, которые аккредитованы в министерстве иностранных дел Кыргызской Республики.
                </p>
                <p>
                    Основой деятельности компании служит Венская Конвенция 1961-го года «О правах и обязанностях дипломатов». В связи с этим и была создана наша торговая марка "1961".
                </p>
                <p>
                    Наши партнеры в Германии работают напрямую и в тесном сотрудничестве с ведущими мировыми брэндами и обеспечивают своевременную поставку качественных товаров.
                </p>
                <p>
                    Наша команда в Кыргызстане заботится о персональном сервисе, индивидуальном подходе и VIPобслуживание наших клиентов.
                </p>
                <p>
                    Для Вашего удобства мы открыли магазин в Бишкеке, где Вы можете приобрести штучные товары без длительных ожиданий по поставкам.
                </p>
                <p>
                    Безусловно, мы предлагаем снабжение товарами для Ваших протокольных мероприятий. Обращайтесь к нам за специальными предложениями и доставками дипломатической почтойпрямо в нужную Вам точку.
                </p>
                <p>
                    Наши возможности по снабжению неограничены. А ассортимент продуктов составляет несколько тысяч единиц. Если Вы интересуетесь определенным товаром, но не нашли его на полках нашего магазина или в каталоге, просто обратитесь к нам и мы сделаем всё возможное, чтобы Вам его доставить.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <div class="d-flex font-weight-normal">
                    <div class="col-4">
                        <img src="{{ asset('images/contacts/dipshop.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <p>Maxim Nudelmann, <span class="text-muted">COO</span></p>
                        <p>Tel: +49 173 203 93 93</p>
                        <p>Address: Chingiz Aitmatov Ave 299/1 Bishkek, KG</p>
                        <p>Site: <a href="http://www.1961.kg/" target="_blank">http://www.1961.kg/</a>, <a href="http://www.dipmarket.kg/" target="_blank">http://www.dipmarket.kg/</a></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex font-weight-normal">
                    <div class="col-4">
                        <img src="{{ asset('images/contacts/diplomatic.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col">
                        <p>AEREA GmbH</p>
                        <p>Tel: +49 30 30 20 67 62</p>
                        <p>Address: Kurfürstendamm 110 10711 Berlin</p>
                        <p>Site: <a href="http://www.aerea-group.com/" target="_blank">http://www.aerea-group.com/</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection