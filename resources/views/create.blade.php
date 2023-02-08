<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if($errors-> any())
    @foreach($errors->all() as $errors)
        {{$error}}
    @endforeach
@endif
<form action="{{action([\App\Http\Controllers\PagesController::class,'store'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <label >Name</label>
    <input type="text" name="name">
    <label >Adress</label>
    <input type="text" name="address">
    <label >date</label>
    <input type="date" name="dob">
    <label >Image</label>
    <input type="file" name="image">
<input type="submit">
</form>
</body>
</html>

<?php
