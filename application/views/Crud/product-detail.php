<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Product Details</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url('assets/webasset/img/core-img/favicon.ico') ?>">

    <!-- Core Style CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/webasset/css/core-style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/webasset/style.css') ?>">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>



        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">

                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?= base_url('uploads/' . $singlerocords->image); ?>);">
                                    </li>
                                    <?php foreach ($productgallery as $key => $getimages) { ?>
                                        <li data-target=" #product_details_slider" data-slide-to="<?php echo base_url($getimages->id) ?>" style="background-image:  url(<?= base_url('uploads/' . $getimages->uploadedFiles); ?>);">
                                        </li>
                                        <!-- <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(<?php echo base_url('assets/webasset/img/product-img/pro-big-3.jpg') ?>);"> -->

                                    <?php } ?>
                                    <!-- </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(<?php echo base_url('assets/webasset/img/product-img/pro-big-4.jpg') ?>);">
                                    </li> -->
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="<?= base_url('uploads/' . $singlerocords->image); ?>">
                                            <img class="d-block w-100" src="<?= base_url('uploads/' . $singlerocords->image); ?>" alt="">
                                        </a>
                                    </div>
                                    <?php foreach ($productgallery as $getimages) { ?>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="<?= base_url('uploads/' . $getimages->uploadedFiles); ?>">
                                                <img class="d-block w-100" src="<?= base_url('uploads/' . $getimages->uploadedFiles); ?>" alt="">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <!-- <div class="carousel-item">
                                        <a class="gallery_img" href="<?php echo base_url('assets/webasset/img/product-img/pro-big-3.jpg') ?>">
                                            <img class="d-block w-100" src="<?php echo base_url('assets/webasset/img/product-img/pro-big-3.jpg') ?>" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="<?php echo base_url('assets/webasset/img/product-img/pro-big-4.jpg') ?>">
                                            <img class="d-block w-100" src="<?php echo base_url('assets/webasset/img/product-img/pro-big-4.jpg') ?>" alt="Fourth slide">
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">$<?php echo $singlerocords->price ?></p>
                                <a href="product-details.html">
                                    <h6><?php echo $singlerocords->title ?></h6>
                                </a>
                                <!-- Ratings & Review -->

                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $singlerocords->description ?></p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->



    <script src="<?php echo base_url('assets/webasset/js/jquery/jquery-2.2.4.min.js') ?>"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets/webasset/js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets/webasset/js/bootstrap.min.js') ?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url('assets/webasset/js/plugins.js') ?>"></script>
    <!-- Active js -->
    <script src="<?php echo base_url('assets/webasset/js/active.js') ?>"></script>









</body>

</html>