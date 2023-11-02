<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body{
            margin-left: 1%;
            margin-top: 1%;
        }
        .alert.alert-danger{
            color: red;
            font-size: medium;
            margin-top: 5px;
        }
        .alert.alert-success{
            background: green;
            width: 20%;
            color: white;
            font-size: medium;
            font-family: Al-Jazeera-Arabic-Bold, cursive;
            border-bottom-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .alert.alert-success h1 {
            text-align: center;
        }

        input[type="text" i] {
            padding-block: 1px;
            padding-inline: 2px;
            margin-left: 1%;
        }
    </style>
</head>
<body>


{{--Navbar--}}
@include('offers.NavBar')

<div class="title m-b-md">
    Video Viewer(50)

</div>
</body>
</html>
