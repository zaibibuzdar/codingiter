<a class="btn btn-success" style="float:right;margin-top:20px;margin-bottom:10px; margin-right: 10px;" href="<?php echo base_url('adminside/Product/create'); ?>"> Add Products</a>



<?php


if ($this->session->flashdata('delete')) {

    echo '<div class="alert alert-danger">';

    echo $this->session->flashdata('delete');

    echo "</div>";
}


?>

<?php


if ($this->session->flashdata('success')) {

    echo '<div class="alert alert-success">';

    echo $this->session->flashdata('success');

    echo "</div>";
}


?>

<div class="container">
    <div class="row">
        <div class="card-body">
            <div class="card-header">
                get category
            </div>
            <table>
                <thead>

                    <th>id</th>
                    <th>name</th>

                </thead>


                <tbody>
                    <tr>
                        <?php foreach ($categries as $category) { ?>
                            <td> :</td>
                            <td> <?php echo get_category($category->category_id); ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="pagetitle">
    <h1>Products Tables</h1>
    <nav>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('products') ?>">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Products </li>
        </ol>
    </nav>

</div>
<!-- End Page Title -->

<!-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary"><li class="ni ni-fat-add">Add New Category</li></a> -->

<section class="section">

    <div class="row">
        <div class="col-lg-18">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Default Table</h5>

                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Title</th>
                                <th>Product-category</th>
                                <!-- <th>Product-categories</th> -->
                                <th>Product-Image</th>

                                <th>Product-description</th>
                                <th>Product-Price</th>
                                <th width="220px">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach ($products as $product) { ?>

                                <tr>
                                    <td><?php echo $product->pro_id; ?></td>
                                    <td><?php echo $product->title; ?></td>
                                    <!-- <td><?php print_r(get_categories($product->category_id)); ?></td> -->
                                    <td> <img class="img-fluid" src="<?= base_url('uploads/' . $product->image); ?>" style="width: 50px; height: 50px;"> </td>
                                    <td><?php echo $product->description; ?></td>
                                    <td><?php echo $product->price; ?></td>

                                    <td>

                                        <form method="DELETE" action="#">
                                            <a class="btn btn-info" href="<?php echo base_url('itemCRUD/') ?>"> show</a>
                                            <a class="btn btn-primary" href="<?php echo base_url('products-edit/' . $product->pro_id) ?>"> Edit</a>
                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>



                        </tbody>
                    </table>




                    <!-- End Default Table Example -->
                </div>
            </div>


        </div>


</section>