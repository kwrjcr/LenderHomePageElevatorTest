<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/vue"></script>
    <script src="{{ URL::to('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">

    <title>Buttons!</title>

    <style>

    </style>

    <script>
    </script>

</head>
<body>

    <button name="elevator-button" id="up-button-id">Up</button>

    <br/>
    <br/>

    <button name="elevator-button" id="down-button-id">Down</button>

    <br/>
    <br/>

    <div id="display-info">
    </div>

</body>
</html>