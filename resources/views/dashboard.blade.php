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
<p>Hello world </p>
<h1>{{$name}}</h1>
<p>This is a register email. TO activate your account, click <a href="{{url('/activate/'.$user_id)}}">here</a></p>
</body>
</html>
