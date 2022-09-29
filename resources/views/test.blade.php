@component('mail::message')
# {{ $mail['subject'] }}

{{ $mail['message'] }}

@component('mail::button', ['url' => 'https://google.com'])
visit google
@endcomponent

Thanks for your patronage,<br>
{{ config('app.name') }}
@endcomponent
