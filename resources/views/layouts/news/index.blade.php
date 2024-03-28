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
    <title>Home</title>
</head>

<body>
    <div class="sidenav">
        <a href="{{ route('categories.index') }}">Category</a>
        <a href="{{ route('news.index') }}">News</a>
    </div>

    <div class="container-one">
        <div class="text-right">
            <a href="{{ route('news.create') }}" class="btn btn-success mt-3">Add News </a>
        </div>
        <div class="table-responsive">
            <table class="table mt-1 ms-5">
                <thead>
                    <tr>
                        <th>S No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $i => $article)
                        <tr>
                            <td>{{ $i + 1 }} </td>
                            <td>{{ $article->title }}</td>
                            <td>{!! $article->description !!} </td>
                            <td><img src="{{ $article->getFirstMediaUrl('news') }}" class="square" width="50"
                                    height="40" alt="Image" width="100"></td>
                            <td>{{ $article->category->category_name ?? '' }}</td>
                            <td>
                                <a href="{{ route('news.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('news.destroy', $article->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>
