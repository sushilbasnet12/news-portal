@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row gx-5">
            <div class="col-md-12" id="category">
                <div class="row">
                    @foreach ($category->news as $article)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h6>{{ $article->title }}</h6>
                                    <a href="{{ route('news-details', $article->slug) }}">
                                        <img src="{{ $article->getFirstMediaUrl('news') }}" class="card-img-top"
                                            alt="News Image">
                                    </a>
                                </div>
                                <p> {{ $article->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
