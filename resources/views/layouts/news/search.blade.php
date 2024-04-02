@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row gx-8">
            @foreach ($news as $article)
                <div class="col-5 mb-4">
                    <div class="card">
                        <a href="{{ route('news-details', $article->slug) }}">
                            <img src="{{ $article->getFirstMediaUrl('news') }}" style="width: 545px; height: 500px;"
                                alt="{{ $article->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($news->count() == 0)
        <div class="container">
            <p>No results found for '{{ $keyword }}'</p>
        </div>
    @endif
@endsection
