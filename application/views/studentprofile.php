<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <?php include "components/header.php" ?>
    <?php linkCSS("assets/css/css/jquery.dataTables.min.css"); ?>
</head>
<body>
<?php include "components/nav.php"; ?>

   <div class="container mt-5">
   <div class="row">
   <div class="col-md-12">
   <?php include "components/messages.php"; ?>
    <?php include "components/detaildatatable.php"; ?>

   </div>
   <!-- Close col-md-5 -->
   </div>
   <!-- Close row -->
   </div>
   <?php include "components/footer.php"; ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php linkJS('assets/js/js/jquery.dataTables.min.js');?>


</body>
</html>