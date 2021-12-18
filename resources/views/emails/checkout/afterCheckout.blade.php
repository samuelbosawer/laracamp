@component('mail::message')
# Register camp : {{ $checkout->camp->title }}

Hi {{ $checkout->user->name }}

<br>
Thank you for register on <b>{{ $checkout->camp->title }}, plase see payment instruction by click on the button below.</b>
@component('mail::button', ['url' => route('dashboard',$checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
