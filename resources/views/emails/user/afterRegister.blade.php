@component('mail::message')
# Welecome !

Hi {{ $user->name }}
<br>

Welcome to Laracamp, your account has been created successfully. Now your can choose your best match camp!
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
