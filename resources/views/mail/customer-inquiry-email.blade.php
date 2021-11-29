@component('mail::message')
# Hi, {{ $inquiry->name }}

Thank you for sending us <a href="{{ $url }}">your inquiry</a>.
Our team will review this and get in touch with you soon.
if you have any more question or come across any other issue, let us know, we will be happy to help.

Have a great day,<br>
{{ config('app.name') }}
@endcomponent
