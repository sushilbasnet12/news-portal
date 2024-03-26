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
            @foreach ($categories as $category)
                <a class="nav-item nav-link text-light ms-3"
                    href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
            @endforeach
        </div>
    </div>

    <a class="me-5" style="font-size: 24px;" href="{{ route('home') }}">🏠</a>
</nav>
