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
<form action="{{action([\App\Http\Controllers\PagesController::class,'update'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$student->id}}">
    <label >Name</label>
    <input type="text" name="name" value="{{$student->name}}">
    <label >Address</label>
    <input type="text" name="address" value="{{$student->address}}">
    <label >date</label>
    <input type="date" name="dob" value="{{$student->dob}}">
    <label >Image</label>
    <input type="file" name="image">
    <input type="submit">
</form>
</body>
</html>

<?php
