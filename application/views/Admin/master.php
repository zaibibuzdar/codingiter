<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php  echo $pages_title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php  require "includes/css.php"?>

 


</head>

<body>
     <?php require "includes/header.php"?>
     <?php require "includes/sidebar.php"?>
     <main id="main" class="main">
<?php $this->load->view('Admin/pages/'.$pages.'.php');?>
</main>
<?php require "includes/footer.php"?>
<?php  require "includes/js.php"?>


</script>
</body>

</html>