@extends('include.header')

@section('content')


<div class="album py-5 bg-light">

    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>

        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


            @foreach($rev as $revs)

            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{asset($revs->review_image)}}?> " class="bd-placeholder-img card-img-top" width="100%" height="300" style = "object-fit: cover; object-position: 100% 0;" alt="">

                    <div class="card-body">
                        <h5 class="card-title"> {{$revs->review_name }}</h5>
                        <p class="card-text">By {{$revs->user->name}}  </p>
                        <p class="card-text"> {{$revs->review_foreword}} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{url('review/'.$revs->id)}}" > <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </a>
                                @if($revs->user_id == Auth::id())
                                <a href="{{url('review/'.$revs->id.'/edit')}}" > <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </a>
                                    <form action="{{ url('review/'.$revs->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                 <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                 </form>
                                @endif
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
