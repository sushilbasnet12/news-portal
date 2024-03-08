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
                    <form method="POST" action="{{ route('category.update', $category->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label> Category Name </label>
                            <input type="text" name="category_name" class="form-control"
                                value="{{ $category->category_name }}"><br>

                            <label> Description </label>
                            <input type="text" name="description" class="form-control" rows="4"
                                value="{{ $category->description }}"><br>

                            <label> Image </label>
                            <input type="file" name="image" class="form-control"
                                value="{{ $category->image }}"><br>

                            <button type="submit" class="btn btn-dark">Update</button>

                            <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
