@extends('layouts.main')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row gx-5">
            <div class="col-9">
                <h5>{{ $news->title }}</h5>
                <img src="{{ $news->getFirstMediaUrl('news') }}" class="news-img" alt="{{ $news->title }}">
                <p>{{ $news->description }}</p>
            </div>
        </div>
    </div>
@endsection
