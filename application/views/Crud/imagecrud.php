<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multiple image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Multiple Image product Add Gallery</h4>
                        <a href="<?php echo base_url('Test/create') ?>" class="btn btn-info float-end"> Create Product</a>
                    </div>
                    <div class="card-body"></div>
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>product-title</th>

                                <th>Product-Discription</th>
                                <th>Product-image</th>
                                <th>Product-Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($products as $productdetail) { ?>
                                <tr>
                                    <td><?php echo $productdetail->id ?></td>
                                    <td><?php echo $productdetail->title ?></td>

                                    <td><?php echo substr_replace($productdetail->description, "...", 7); ?></td>

                                    <td><img class="img-fluid" src="<?= base_url('uploads/' . $productdetail->image); ?>" style="width: 50px; height: 50px;"> </td>
                                    <td><?php echo $productdetail->price ?></td>
                                    <td>
                                        <form method="DELETE" action="<?php echo base_url('Test/delete/' . $productdetail->id); ?>">



                                            <a class="btn btn-primary" href="<?php echo base_url('Test/edit/' . $productdetail->id) ?>"> Edit</a>
                                            <a class="btn btn-info" href="<?php echo base_url('Test/show/' . $productdetail->id) ?>"> show</a>
                                            <button type="submit" class="btn btn-danger"> Delete</button>

                                        </form>
                                    </td>

                                </tr>

                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>