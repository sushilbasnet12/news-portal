<div class="topbar image ms-4">
    <div class="dateandtime ms-4">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50px" class="mt-4">
        </a>
        <p>
            <span style="color: rgb(0, 0, 255)">{{ \Carbon\Carbon::now()->format('l') }},</span>
            <span style="color: rgb(255, 0, 0)">{{ \Carbon\Carbon::now()->format('F d') }},</span>
            <span style="color: rgb(0, 0, 255)">{{ \Carbon\Carbon::now()->format('Y') }}</span>
        </p>
    </div>
    <div class="top-right p-4">
        <form class="form-inline d-flex">
            <input class="form-control form-control-sm mr-sm-2" style="max-width: 300px;" type="search" name="query"
                placeholder="Search News">
            <button class="btn btn-outline-primary btn-sm ms-2 my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-primary mt-1">
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
