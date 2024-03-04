@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container-two">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-5">
                <div class="card p-3">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="name" class="form-control" value=""><br>

                            <label> Description </label>
                            <input type="text" name="name" class="form-control" rows="4" value=""><br>

                            <label> Image </label>
                            <input type="file" name="name" class="form-control" value=""><br>

                            <label> Category </label>
                            <input type="text" name="name" class="form-control" value=""><br>

                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
