<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset("assets/css/new_wala.css")}} " rel="stylesheet" />
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}} "></script>
    <title>Review My Review</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Review My review</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{url('show')}}">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url("post")}}">Submit</a></li>
                    <!--                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>-->

                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('logout')}}">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>


@yield('content')



<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Review my review</p></div>
</footer>
</html>
