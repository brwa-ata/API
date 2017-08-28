<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{ route('verify' , $user->verification_token ) }}

@component('mail::message')
    # Hello {{$user->name}}

    Thank you for create an account. Please verify your emails using this button:

    @component('mail::button', ['url' =>  route('verify' , $user->verification_token ) ])
        Verified Account
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
</body>
</html>