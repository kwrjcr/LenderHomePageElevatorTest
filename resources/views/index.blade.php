<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buttons!</title>

    <style>

    </style>

</head>
<body>
    <div id="root-element">
        <span class="users-floor">Please choose user's current floor.</span>
        <span class="request-floor">Which floor would you like to go to?</span>
        <ul class="list-buttons">
            <buttons-list></buttons-list><br />
        </ul>
        <span class="class-elevator"><h1>@{{ elevator }}</h1></span>
        <span class="class-destination"><h1>@{{ destination }}</h1></span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="{{ URL::to('js/app.js') }}"></script>
<link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</html>

