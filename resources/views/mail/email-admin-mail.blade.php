@component('mail::message')
We got an inquiry from {{ $inquiry->email }}.
The customer want {{ $inquiry->type->name }} with minimum order {{ $inquiry->min_order }} pieces.
this is the link to <a href="{{ route('admin.inquiry.show', $inquiry) }}">the detail</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
