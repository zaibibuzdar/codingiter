<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php  echo $pages_title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php  require "includes/css.php"?>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
     
<?php $this->load->view('Admin/pages/'.$pages.'.php');?>


<?php  require "includes/js.php"?>
</body>

</html>