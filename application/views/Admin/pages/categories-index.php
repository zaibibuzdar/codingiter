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
<!-- <?php echo get_category(21) ?> -->
<div class="pagetitle">

  <h1>Categories Tables</h1>

  <nav>

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('categories') ?>">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Categories </li>
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
          <a class="btn btn-primary" style="float:right;margin-top:20px" href="<?php echo base_url('categories-create'); ?>"> Add category</a>
          <form action="<?php echo base_url('adminside/CategoryController/export'); ?>">

            <button class="btn btn-primary" style="float:right;margin-top:20px;margin-right:40px">Export</button>
          </form>

          <h5 class="card-title">Default Table</h5>

          <!-- Default Table -->
          <table id="item-list" class="table ">

            <thead>
              <tr>
                <th>ID</th>
                <th>Title category</th>
                <th>Parent category</th>
                <th>category Description</th>

                <th width="220px">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($category as $key => $item) { ?>

                <tr>
                  <td><?php echo $item->id; ?></td>
                  <td><?php echo $item->title; ?></td>
                  <td><?php echo get_category($item->parent_id); ?></td>
                  <td><?php echo $item->discription; ?></td>


                  <td>

                    <form method="DELETE" action="<?php echo base_url('adminside/CategoryController/delete/' . $item->id); ?>">

                      <!-- <a class="btn btn-info" href="<?php echo base_url('itemCRUD/' . $item->id) ?>"> show</a> -->

                      <a class="btn btn-primary" href="<?php echo base_url('Edit-category/' . $item->id) ?>"> Edit</a>

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
<div class="form-control">
  <form action="<?php echo base_url('adminside/CategoryController/import'); ?>" enctype="multipart/form-data" method="post">
    <input type="file" name="upload_excel" required />
    <button class="btn btn-primary" type="submit" style="float:right;margin-top:40px;margin-right:500px" name="excel-sheet">Import-data</button>
    <?php if ($this->session->flashdata('success')) { ?>
      <p><?= $this->session->flashdata('success') ?></p>
    <?php  } ?>
    <?php if ($this->session->flashdata('error')) { ?>
      <p><?= $this->session->flashdata('error') ?></p>
    <?php  } ?>
  </form>
</div>