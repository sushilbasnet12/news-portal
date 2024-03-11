<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <div class="image">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50px" class="mt-4">
        </a>
    </div>

    <nav class="navbar navbar-expand-lg bg-primary mt-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-color" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-5">
                <a class="nav-item nav-link text-light ms-3" href="">Trending News 🔥</a>
                <a class="nav-item nav-link text-light ms-3" href="">Politics</a>
                <a class="nav-item nav-link text-light ms-3" href="">Sports</a>
                <a class="nav-item nav-link text-light ms-3" href="">Education</a>
                <a class="nav-item nav-link text-light ms-3" href="">Economy</a>
                <a class="nav-item nav-link text-light ms-3" href="">Health</a>
                <a class="nav-item nav-link text-light ms-3" href="">Fashion</a>
                <a class="nav-item nav-link text-light ms-3" href="">Business</a>
            </div>
        </div>


        <a class="nav-item nav-link text-light ms-0 me-5" style="font-size: 24px;" href="home">🏠</a>
    </nav>

    @foreach ($latestNews as $article)
        <div class="card" style="width: 1300px;">
            <div class="card-body">
                <p class="card-text" style="max-height: 100px; overflow: hidden;">{{ $article->description }}</p>
                <img src="{{ $article->getFirstMediaUrl('news') }}" class="card-img-top" alt="News Image">
                <p class="card-text"><strong>Category:</strong> {{ $article->category->category_name ?? '' }}</p>

            </div>
        </div>
    @endforeach




</body>

</html>
