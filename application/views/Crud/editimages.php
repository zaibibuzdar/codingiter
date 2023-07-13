<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product image crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit image details</h4>
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
                        <form class="row g-3" action="<?php echo base_url('Test/update/' . $editrecords->id) ?>" enctype="multipart/form-data" method="post">
                            <div class="col-md-6">
                                <label for="inputtitle" class="form-label">Product-Title:</label>
                                <span id="error_name" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $editrecords->title ?>">
                            </div>
                            <div class="col-md-6">

                                <label for="inputImage" class="form-label">Prodct-image:</label>
                                <span id="error_image" class="text-danger ms-3"></span>
                                <input type="hidden" name="old_image" value="<?php echo $editrecords->image ?>">
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="col-md-6">

                                <label for="description" class="form-label">Product-Description:</label>
                                <span id="error_description" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" name="description" id="description" value="<?php echo $editrecords->description ?>">
                            </div>
                            <div class="col-md-6">

                                <label for="Miltiimage" class="form-label">Add Gallery-images:</label>
                                <span class="text-danger ms-3" id="error_multiple_image"></span>
                                <?php foreach ($editimages  as $key => $getimages) { ?>
                                    <input type="hidden" name="galleryid[]" value="<?php echo $getimages->id ?>">
                                <?php } ?>
                                <input type="file" class="form-control" name="uploadedFiles[]" id="images" multiple="">
                            </div>
                            <div class="col-md-6">

                                <label for="inputPrice" class="form-label">Price:</label>
                                <span id="error_price" class="text-danger ms-3"></span>
                                <input type="text" class="form-control" name="price" id="price " value="<?php echo $editrecords->price ?>">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary ">Update</button>
                            </div>
                        </form>

                        <?php foreach ($editimages as $getimages) { ?>

                            <div class="row">
                                <div class="column">

                                    <?php echo $getimages->id ?>
                                    <button type="submit" class="delete_image" value="<?php echo $getimages->id ?>"><i class="fa fa-remove" style="color:red"></i></button>
                                    <img src="<?= base_url('uploads/' . $getimages->uploadedFiles); ?>" alt="Snow" style="width:30%">
                                </div>

                            </div>
                            <!-- <tr>
                            <td><?php echo $getimages->product_id ?> </td>
                            <td><img class="img-fluid" src="<?= base_url('uploads/' . $getimages->uploadedFiles); ?>" style="width: 50px; height: 50px;"> </td>
                            </td>
                        </tr> -->

                        <?php } ?>

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

            $('.delete_image').on('click', function() {
                var deleteid = $('body').find(this).val();
                $.ajax({
                    url: "<?php echo base_url('Test/deleteimage') ?>",
                    type: "post",
                    data: {
                        'deleteid': deleteid
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // alert('delete successfully');
                        // var result = jQuery.parseJSON(response);
                        if (response.success == 1) {
                            alert('successfuly');
                            window.location.reload();

                        }
                    }
                });

            });
        });
    </script>

</body>

</html>