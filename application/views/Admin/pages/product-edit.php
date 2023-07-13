<!-- <?php


        if ($this->session->flashdata('success')) {

            echo '<div class="alert alert-success">';

            echo $this->session->flashdata('success');

            echo "</div>";
        }

        ?> -->
<a class="btn btn-primary" style="float:right;margin-top:20px;margin-bottom:10px" href="<?php echo base_url('products'); ?>"> Back</a>

<div class="pagetitle">
    <h1>Form Edit-Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">

    <form method="post" action="<?php echo base_url('product-update/' . $product->id); ?>" enctype="multipart/form-data">

        <?php


        if ($this->session->flashdata('error')) {

            echo '<div class="alert alert-danger">';

            echo $this->session->flashdata('error');

            echo "</div>";
        }


        ?>


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Title:</strong>

                    <input type="text" name="title" class="form-control" value="<?php echo $product->title; ?>">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    <textarea name="description" class="form-control"><?php echo $product->description; ?></textarea>

                </div>

            </div>


            <div class="form-group">

                <strong>Image:</strong>
                <input type="hidden" name="old_image" value="<?php echo $product->image ?>">
                <input type="file" name="image" class="form-control">

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Price:</strong>

                    <input type="text" name="price" class="form-control" value="<?php echo $product->price; ?>">

                </div>

            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Update</button>

            </div>

        </div>


    </form>
    <img src="<?= base_url('uploads/' . $product->image); ?>" class="w-100" alt="image">
</section>