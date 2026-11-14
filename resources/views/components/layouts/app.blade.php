<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ filled($title ?? null) ? $title.' · '.config('app.name') : config('app.name') }}</title>
        <meta name="theme-color" content="#0b0d12">
        <link rel="icon" type="image/svg+xml" href="{{ asset('dachhost.svg') }}">
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
