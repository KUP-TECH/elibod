<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>
<body>

    {{ $slot }}

</body>
</html>