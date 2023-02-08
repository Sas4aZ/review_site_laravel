@extends('include.header')

@section('content')


<div class="album py-5 bg-light">

    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($rev as $revs)

            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset($revs->review_image)}}?> " class="bd-placeholder-img card-img-top" width="100%" height="300" style = "object-fit: cover; object-position: 100% 0;" alt="">

                    <div class="card-body">
                        <h5 class="card-title"> {{$revs->review_name }}</h5>
                        <p class="card-text">By  </p>
                        <p class="card-text"> {{$revs->review_foreword}} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="view.php?id={{$revs->review_id}}" > <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </a>

                                <a href="delete_post.php?id=" > <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </a>

                            </div>
                            <small class="text-muted">{{$revs->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>

@endsection
