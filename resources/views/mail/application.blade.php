@component('mail::message')
    # Form sent

    Name: {{ $application->name }}

    Phone number: {{ $application->phone }}

    Message: {!! nl2br(htmlspecialchars($application->message)) !!}


    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
