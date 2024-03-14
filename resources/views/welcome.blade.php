<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pokhara News</title>
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
                <a class="nav-item nav-link text-light ms-3" href="/?category=Politics">Politics</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Sports">Sports</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Education">Education</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Economy">Economy</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Health">Health</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Fashion">Fashion</a>
                <a class="nav-item nav-link text-light ms-3" href="/?category=Business">Business</a>
            </div>
        </div>


        <a class="nav-item nav-link text-light ms-0 me-5" style="font-size: 24px;" href="home">🏠</a>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row gx-5">
            <div class="col-md-8">
                {{-- Display only recently added news on big screen --}}
                @foreach ($latestNews->take(1) as $article)
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text" style="max-height: 100px; overflow: hidden;">
                                {{ $article->description }}</p>
                            <a href="#">
                                <img src="{{ $article->getFirstMediaUrl('news') }}" class="card-img-top"
                                    alt="News Image">
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- Display news for each category --}}
                <div class="row">
                    <div class="col-md-12" id="category">
                        @foreach ($categories as $category)
                            <div class="mb-4">
                                <h3>{{ $category->category_name }}</h3>
                                <div class="row">
                                    <button class="btn btn-primary button1">View All</button>
                                    @foreach ($category->news as $article)
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <p class="card-text" style="max-height: 100px; overflow: hidden;">
                                                        {{ $article->description }}</p>
                                                    <a href="#">
                                                        <img src="{{ $article->getFirstMediaUrl('news') }}"
                                                            class="card-img-top" alt="News Image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h2>Latest News</h2>
                <div class="col-md-8">
                    {{-- Display the rest of the latest news --}}
                    @foreach ($latestNews->slice(1) as $article)
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="card-text" style="max-height: 100px; overflow: hidden;">
                                    {{ $article->description }}</p>
                                <a href="#">
                                    <img src="{{ $article->getFirstMediaUrl('news') }}" class="card-img-top"
                                        alt="News Image">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
