<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product image crud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create image crud</h4>
                    </div>
                    <div class="card-body">

                        <?php


                        if ($this->session->flashdata('success')) {

                            echo '<div class="alert alert-success">';

                            echo $this->session->flashdata('success');

                            echo "</div>";
                        }


                        ?>
                        <?php


                        if ($this->session->flashdata('errors')) {

                            echo '<div class="alert alert-danger">';

                            echo $this->session->flashdata('errors');

                            echo "</div>";
                        }


                        ?>
                        <form class="row g-3" action="<?php echo base_url('Test/store') ?>" enctype="multipart/form-data" method="post">
                            <div class="col-md-6">
                                <label for="inputtitle" class="form-label">Product-Title:</label>
                                <span id="error_name" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="col-md-6">

                                <label for="inputImage" class="form-label">Prodct-image:</label>
                                <span id="error_image" class="text-danger ms-3"></span>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="col-md-6">

                                <label for="description" class="form-label">Product-Description:</label>
                                <span id="error_description" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="col-md-6">

                                <label for="Miltiimage" class="form-label">Add Gallery-images:</label>
                                <span class="text-danger ms-3" id="error_multiple_image"></span>
                                <input type="file" class="form-control" name="uploadedFiles[]" id="images" multiple="">
                            </div>
                            <div class="col-md-6">

                                <label for="inputPrice" class="form-label">Price:</label>
                                <span id="error_price" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" name="price" id="price">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary ">Add Product</button>
                            </div>
                        </form>


                    </div>


                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.ajax-save').click(function(e) {
                e.preventDefault();
                // if ($('#title').val().length == 0) {
                //     // alert('asdg');
                //     error_name = 'please Enter title product';
                //     $('#error_name').text(error_name);
                // } else {
                //     error_email = '';
                //     $('#error_name').text(error_email);
                // }
                if ($('#title').val().length == 0) {
                    error_name = ' Product Title is Required';
                    $('#error_name').text(error_name);
                } else {
                    error_name = '';
                    $('#error-name').text(error_name)
                }
                if ($('#image').val().length == 0) {
                    error_image = 'Cover Image is  required';
                    $('#error_image').text(error_image);
                } else {
                    error_image = '';
                    $('#error_image').tex(error_image);
                }
                if ($('#description').val().length == 0) {
                    error_description = 'Product Description is  required';
                    $('#error_description').text(error_description);
                } else {
                    error_description = '';
                    $('#error_description').tex(error_description);
                }
                if ($('#images').val().length == 0) {
                    error_multiple_image = 'Product Description is  required';
                    $('#error_multiple_image').text(error_multiple_image);
                } else {
                    error_multiple_image = '';
                    $('#error_multiple_image').tex(error_multiple_image);
                }
                if ($('#price').val().length == 0) {
                    error_price = 'Product Description is  required';
                    $('#error_price').text(error_price);
                } else {
                    error_price = '';
                    $('#error_price').tex(error_price);
                }

            });
        });
    </script>

</body>

</html>