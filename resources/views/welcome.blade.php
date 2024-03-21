@extends('layouts.main')

@section('content')
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
                                <img src="{{ $article->getFirstMediaUrl('news') }}" class="card-img-top" alt="News Image">
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
                                <div class="">
                                    <div class="row">
                                        <a href="{{ route('category', $category->slug) }}"
                                            class="btn btn-primary col-2 ms-auto">View All</a>
                                    </div>
                                    <div class="row">
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Display the rest of the latest news --}}
            <div class="col-md-4">
                <h2>Latest News</h2>
                <div class="col-md-8">
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
@endsection
