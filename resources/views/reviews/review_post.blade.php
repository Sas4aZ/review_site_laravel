
@extends('include.header')

@section('content')
<script src= "{{asset("assets/js/ckeditor.js")}}"> </script>
<body>

<div class="b-example-divider"></div>



<div class="container col-xxl-8 px-4 py-5">
    <form action="{{action([\App\Http\Controllers\PagesController::class,'review_post'])}}" method="post" enctype="multipart/form-data">
        @csrf
        Title of your review: <input type="text" class="form-control" placeholder="Enter title here" name="review_name"> <br>
        A sentence about your review : <input type="text"  class="form-control" placeholder="Your Foreword" name="review_foreword">
        Insert your review here:<br> <textarea  class="form-control" cols="40" rows="10" id="editor" name="review_description"></textarea> <br>

        <input class="form-control" type="file" id="image" name="image" >
        <label class="mb-3" for="image">Image of the book/anything related.</label> <br>

        <input type="submit" class="btn btn-primary mb-4" value="Submit">
    </form>
</div>
</body>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
