

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset("assets/css/new_wala.css")}}" rel="stylesheet" />
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>

    <title>Login</title>

    <link href="{{asset("assets/css/signin.css")}}" rel="stylesheet">
</head>

<body class="text-center">

<main class="form-signin">
    <form action="{{action([\App\Http\Controllers\PagesController::class,'loginForm'])}}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <img class="mb-4" src="{{asset("assets/images/book.svg")}}" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" value="" required class="form-control " id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">

            </div>
        </div>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control  "  required value="" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>

        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Sign in</button>


    </form>
    <div class="row">
        <div class="col"> <a href="{{url('/signUp/')}}"> <button class="w-100 btn btn-lg btn-secondary">Register</button></a>
        </div>
        <div class="col">
            <a href="{{ url('authorized/google') }}">
                <button type="button" class="w-100 btn btn-lg btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"></path>
                    </svg>
                    Login
                </button>
            </a>
        </div>
    </div>
</main>

</body>

