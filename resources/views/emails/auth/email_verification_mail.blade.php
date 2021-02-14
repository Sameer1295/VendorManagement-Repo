@component('mail::message')

Hello {{$vendor->name}}
@component('mail::button', ['url' => route('verify_email',$vendor->email_verification_code)])
Click here to verify email address
@endcomponent

<a href="{{route('verify_email',$vendor->email_verification_code)}}"> click here</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
