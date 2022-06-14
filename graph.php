<?php require_once 'configs/app_top_user.php'; ?>
<?php 
$title ='Total Feeding Program Graph';

?>
<?php include 'include/head.php' ?>
<?php include 'action/feeding program-head.php'; ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>
<?php include 'include/picture.php' ?>



<!-- Top Navigation -->
<section class="content-header" style="padding-bottom: 20px;">
<h1>
  <i class="fa fa-file-text-o"></i> <?php echo $title ?>
  <!-- <small><i class="fa fa-home"></i> <?php echo $title ?></small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/dswd/index.php"><i class="fa fa-university"></i> Home</a></li>
  <li class="active"><i class="fa fa-file-text-o"></i> <?php echo $title ?></li>
</ol>
</section>

</section><!-- /.section  -->

<section class="content">
  <div class="content-header" style="border-bottom: 3px solid;margin-bottom: 10px;">
    <h1>Total Feeding Program Graph</h1>
  </div>
  <style>
  div.scrollmenu {
    background-color; #333;
    overflow: auto;
    white-space: nowrap;
  }
  div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding:14px;
    text-decoration: none;
  }
  div.scrollmenu a:hover {
    background-color:#777;
  }
</style>
  <div class="scrollmenu well">
      <div class="chartContainer" style="height: 300px; width: 4000px;"></div> 
  </div>
</section>



<?php include 'include/foot.php' ?>
<?php include 'include/footer.php' ?>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable()  
 });  
 $("tr").not('.first').hover(
    function () {
      $(this).css("background","#2E8B57");
      $(this).css("color","#F0F8FF");
    },
    function () {
      $(this).css("background","");
      $(this).css("color","");
    }
    // 3CB371
    // 8FBC8F
  ); 
 </script>  