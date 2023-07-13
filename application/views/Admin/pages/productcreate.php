<a class="btn btn-primary" style="float:left;margin-top:20px;margin-bottom:10px" href="<?php echo base_url('categories'); ?>"> Back</a>

<div class="pagetitle">
    <h1>Form Create-Categroy</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Add New Category</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">



    <form method="post" action="<?php echo base_url('adminside/Product/store'); ?>" enctype="multipart/form-data">

        <?php


        if ($this->session->flashdata('errors')) {

            echo '<div class="alert alert-danger">';

            echo $this->session->flashdata('errors');

            echo "</div>";
        }


        ?>


        <div class="row">






            <strong>Select Category:</strong>

            <select class="js-example-basic-multiple form-control" name="category_id[]" multiple="multiple">

                <?php foreach ($category as $categorydata) { ?>
                    <option value="<?php echo $categorydata->id ?>"><?php echo $categorydata->title ?></option>
                <?php } ?>
            </select>


            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Title:</strong>

                    <input type="text" name="title" class="form-control">

                </div>

            </div>
            <div class="form-group">

                <strong>Image:</strong>

                <input type="file" name="image" class="form-control">

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Description:</strong>

                    <textarea name="description" class="form-control"></textarea>

                </div>



            </div>
            <div class="form-group">

                <strong>Price:</strong>

                <input type="text" name="price" class="form-control">

            </div>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>
</section>