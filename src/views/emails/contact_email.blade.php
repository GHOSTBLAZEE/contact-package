@component('mail::message')
# New Enquiry From Shoots360
{{ $email_id }}<br>
{{$mobile_number}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
