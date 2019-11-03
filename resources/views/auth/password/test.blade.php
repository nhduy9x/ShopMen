@component('mail::message')
Rest password

Mã xác nhận tài khoản:{{$content['code']}}

@component('mail::button', ['url' => $content['hrel']])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent