@extends('include.header')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"> <?php echo $review_name ?> </h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $date ?></div>
                    <!-- Post categories-->

                </header>
                <!-- Preview image figure-->
                <div class= "row-cols-auto align-items-center">
                    <figure class="align-middle" ><img class="img-fluid align-middle rounded" src="review_image/<?php echo $image ?> " alt="..." /></figure>
                    <!-- Post content--></div>


                <section class="mb-5">
                    <p class="fs-5 mb-4"> <?php echo nl2br($review_description);   ?> </p>
                </section>
            </article>
            <!-- Comments section-->

            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="insert_comment.php" method="post">
                            <textarea class="form-control" rows="3" name="comment" placeholder="Join the discussion and leave a comment!"></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button></form>
                        <!-- Comment with nested comments-->
                        <!-- Single comment-->
                        <?php foreach  ($result_comment as $row) {?>
                        <div class="d-flex mb-4">
                            <div class="d-flex">

                                <?php if (empty($row['password'])) { ?>
                                <div class="flex-shrink-0"><img class="rounded-circle" width="40" height="40" style = "object-fit: cover; object-position: 100% 0;" src="<?php echo $row['image'] ?>" alt="" /></div>

                                <?php } else {  ?>
                                <div class="flex-shrink-0"><img class="rounded-circle" width="40" style = "object-fit: cover; object-position: 50% 50%;" height="40" src="../upload/<?php echo $row['image'] ?>" alt=""> </div>
                                <?php } ?>

                                <div class="ms-3">
                                    <div class="fw-bold">  <?php echo $row['firstName'] . " " . $row['lastName']  ?></div>
                                    <?php  echo $row['content_comment'] ?>

                                </div>
                            </div>

                            <?php if ( (trim($_SESSION['id'])) == (trim($row['user_id']))) { ?>
                            <div class="ms-auto p-2 bd-highlight">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <img src="../../../../laravel/project/review_site/public/assets/images/three-dots-vertical.svg" alt="">
                                            <span class="visually-hidden">Button</span>
                                        </button>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="delete_comment.php?id=<?php echo $row['comment_id']?> ">Delete</a></li>


                                    </ul>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <?php
                        } ?>

                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-4">
            <!-- Search widget-->

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Other reviews you might like</div>
                <div class="card-body">
                    <div class="row">
                        <div >
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($result_list as $list)  { ?> <li> <a href="view.php?id=<?php echo $list["review_id"]?>" > <?php echo $list["review_name"]?></a> </li>
                                <?php
                                } ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- Side widget-->

            </div>
        </div>
    </div>
</div>
<!-- Footer-->
@endsection

<!-- Bootstrap core JavaScript -->
<script src="/web/20201011125907js_/https://startbootstrap.github.io/startbootstrap-blog-post/vendor/jquery/jquery.min.js"></script>
<script src="/web/20201011125907js_/https://startbootstrap.github.io/startbootstrap-blog-post/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
