@extends('include.header')

@section('content')

<div class="container mt-5">
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>

    @endif
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"> {{$rev->review_name}} </h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">{{$rev->created_at}}</div>
                    <!-- Post categories-->

                </header>
                <!-- Preview image figure-->
                <div class= "row-cols-auto align-items-center">
                    <figure class="align-middle" ><img class="img-fluid align-middle rounded" height="600" width="500" src="{{asset($rev->review_image)}}" alt="..." /></figure>
                    <!-- Post content--></div>


                <section class="mb-5">
                    <p class="fs-5 mb-4"> {!! $rev->review_description  !!}</p>
                </section>
            </article>
            <!-- Comments section-->

            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="{{route('comments.store')}}" method="post">
                            @csrf
                            <input type="hidden"  name="review_id" id="review_id" value="{{$rev->id}}">
                            <textarea id="comment-box" class="form-control" rows="3" name="comment" placeholder="Join the discussion and leave a comment!"></textarea>
                            <button type="submit" class="btn btn-primary" id="comment-button">Submit</button></form>
                        <!-- Comment with nested comments-->
                        <!-- Single comment-->
                        @foreach($rev->comments as $comments)
                        <div class="d-flex mb-4">
                            <div class="d-flex">

                                <div class="flex-shrink-0"><img class="rounded-circle" width="40" style = "object-fit: cover; object-position: 50% 50%;" height="40" src="{{asset('assets/images/person.svg')}}" alt=""> </div>

                                <div class="ms-3">
                                    <div class="fw-bold"> {{$comments->user->name}}</div>
                                    {{$comments->content}}

                                </div>
                            </div>

@if( $comments->user_id == Auth::id() )

                            <div class="ms-auto p-2 bd-highlight">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <img src="{{asset('assets/images/three-dots-vertical.svg')}}" alt="">
                                            <span class="visually-hidden">Button</span>
                                        </button>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form action="{{url('comments/'.$comments->id)}}" method="POST">
                                        @csrf
                                            @method("DELETE")
                                            <button class="dropdown-item" type="submit">Delete</button>
                                        </form>



                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>

                        @endforeach
                    </div>
                </div>
            </section>
        </div>


        <div class="col-lg-4">
            <!-- Search widget-->

            <!-- Categories widget-->
{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">Other reviews you might like</div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div >--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <?php foreach ($result_list as $list)  { ?> <li> <a href="view.php?id=<?php echo $list["review_id"]?>" > <?php echo $list["review_name"]?></a> </li>--}}
{{--                                <?php--}}
{{--                                } ?>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Side widget-->

            </div>
        </div>
    </div>
</div>
<!-- Footer-->

@endsection

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="/web/20201011125907js_/https://startbootstrap.github.io/startbootstrap-blog-post/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
