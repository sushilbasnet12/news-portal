@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-two">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-5">
                <div class="card p-3">
                    <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $news->title }}">
                            <br>

                            <label>Description</label>
                            <input type="text" name="description" class="form-control"
                                value="{{ $news->description }}">
                            <br>

                            <label>Image</label>
                            <input type="file" name="image" class="form-control" value="{{ $news->image }}">
                            <br>

                            <label>Category</label>
                            <select
                                style="width: 100%;padding: 8px;background:rgb(241, 241, 241);border: solid 1px rgb(255, 255, 255);"
                                name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($news->category_id == $category->id) selected @endif>{{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            <br><br>

                            <button type="submit" class="btn btn-dark">Submit</button>

                            <a href="{{ route('news.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
