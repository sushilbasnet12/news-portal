@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <title>Home</title>
</head>

<body>
    <div class="sidenav">
        <a href="{{ route('category.index') }}">Category</a>
        <a href="{{ route('news.index') }}">News</a>
    </div>
</body>

</html>
