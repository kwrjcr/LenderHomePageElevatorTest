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
        <buttons-list></buttons-list><br />
        @{{ message }}
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="{{ URL::to('js/app.js') }}"></script>
<link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</html>

{{-- <div id="appdiv">
    <elevator-component></elevator-component>
</div>
<div class="floor-buttons">
    @{{ message }}
    <button-component></button-component>
</div> --}}
