@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row gx-5">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" id="category">
                        <div class="mb-4">
                            <div class="">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
