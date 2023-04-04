<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset("assets/css/new_wala.css")}} " rel="stylesheet" />
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}} "></script>


    <title>Sign up</title>
</head>
<body>

<div class="b-example-divider"></div>
<div class="row align-items-center">
    <div class="col-sm-7 mx-auto col-lg-7">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>

        @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form class="p-4 p-md-5 border rounded-3 bg-light row g-3 " action="{{action([\App\Http\Controllers\PagesController::class,'signUpForm'])}}" method="post" enctype="multipart/form-data">
           @csrf
            <h3>Sign Up</h3>
            <hr>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" required class="form-control"  id="floatingUsername"  name="name" placeholder="Username">
                    <label for="floatingUsername">Username</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" required class="form-control "  name="first_name" id="first_name" placeholder="First Name">
                    <label for="first_name">First Name</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" required class="form-control "  name="last_name" id="last_name" placeholder="Last name">
                    <label for="last_name">Last name</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">

                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" required class="form-control "  id="floatingEmail" name="email" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" required class="form-control"  id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" required class="form-control"   id="floatingPassword2" name="confirm_password" placeholder="Re-enter password">
                    <label for="floatingPassword2">Re-enter Password</label>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>


            <div class="col-12">
            </div>


            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Sign in</button>

            </div>
            <div class="col-md-6"><a href="{{url('authorized/google')}}"> <button class="btn btn-secondary">Google login </button></a>
                <a href="../index.php" <button type="button" class="btn btn-secondary">Already have an account? </button> </a></div>



        </form>
    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>



