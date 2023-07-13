<!-- <?php


        if ($this->session->flashdata('success')) {

            echo '<div class="alert alert-success">';

            echo $this->session->flashdata('success');

            echo "</div>";
        }

        ?> -->
<a class="btn btn-primary" style="float:right;margin-top:20px;margin-bottom:10px" href="<?php echo base_url('categories'); ?>"> Back</a>

<div class="pagetitle">
    <h1>Form Edit-Category</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">categories</li>
            <li class="breadcrumb-item active">Edit Category</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">

    <!-- <form method="POST" action="<?php echo base_url('category/update/' . $category_edit->id); ?>">





    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                <input type="text" name="title" class="form-control" value="<?php echo $category_edit->title; ?>">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                <textarea name="description" class="form-control"><?php echo $category_edit->discription; ?></textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>


</form> -->




    <form method="post" action="<?php echo base_url('category/update/' . $category_edit->id); ?>">

        <?php


        if ($this->session->flashdata('errors')) {

            echo '<div class="alert alert-danger">';

            echo $this->session->flashdata('errors');

            echo "</div>";
        }


        ?>


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <select class="form-select" aria-label="Default select example" name="parent_id">
                        <option selected>Open this select Category</option>
                        <?php foreach ($category as $categorydata) { ?>
                            <option value="<?php echo $categorydata->id ?>" <?php echo $category_edit->parent_id == $categorydata->id ? 'selected' : '' ?>><?php echo $categorydata->title ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Title:</strong>

                        <input type="text" name="title" class="form-control" value="<?php echo $category_edit->title; ?>">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Description:</strong>

                        <textarea name="discription" class="form-control"><?php echo $category_edit->discription; ?></textarea>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </div>


    </form>

</section>