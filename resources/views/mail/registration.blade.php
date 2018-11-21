@component('mail::message')
# Новая регистрация на сайте

Информация о новом клиенте
<br>
<br>
<strong>Имя:</strong> {{ $registerData['name'] }}<br>
<strong>Фамилия:</strong> {{ $registerData['last_name'] }}<br>
<strong>Посольство:</strong> {{ $registerData['embassy'] }}<br>
<strong>Номер дип. карты:</strong> {{ $registerData['code'] }}<br>
<strong>Номер телефона:</strong> {{ $registerData['phone_number'] }}<br>
<strong>E-mail:</strong> {{ $registerData['email'] }}<br>

@component('mail::button', ['url' => route('user.index')])
Пользователи
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
