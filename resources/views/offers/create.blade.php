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
    </style>
</head>
<body>


{{--Navbar--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item active">
                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
            @endforeach
        </ul>

    </div>
</nav>

{{--Form--}}
@if(Session::has('success'))
<div class="alert alert-success">
    <h1>{{Session::get('success')}}</h1>
</div>
@endif

<form method="POST" action="{{ route('offers.store') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Offer name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter offer name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="exampleInputEmail1">Offer price</label>
        <input type="text" class="form-control" name="price" placeholder="Enter price">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="exampleInputEmail1">Offer details</label>
        <input type="text" class="form-control" name="details" placeholder="Enter details">
        @error('details')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-primary">save offer</button>
</form>
</body>
</html>
