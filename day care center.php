<?php require_once 'configs/app_top_user.php'; ?>
<?php 
$title ='Child Development Center';





?>
<?php include 'include/head.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>
<?php include 'include/picture.php' ?>



<!-- Top Navigation -->
<section class="content-header" style="padding-bottom: 20px;">
<h1>
  <i class="fa fa-list-alt"></i> Child Development Center
  <!-- <small><i class="fa fa-home"></i> <?php echo $title ?></small> -->
</h1>
<ol class="breadcrumb">
  <li><a href="/dswd/index.php"><i class="fa fa-university"></i> Home</a></li>
  <li class="active"><i class="fa fa-home"></i> <?php echo $title ?></li>
</ol>
</section>

<section class="content">
<div class="panel panel-primary">
  <div class="panel-heading">
      <span class="fa fa-home"></span> <?php echo $title; ?></div>
  <div class="panel-body">
  <div class="table-responsive">
      <table id="employee_data" class="table table-hover table-datatable table-striped table-condensed">
        <thead>
            <tr>
                <th style="text-align: left;">#ID</th>
                <th style="text-align: center;">Child Development Center</th>
                <th style="text-align: center;">Barangay</th>
                <th style="text-align: center;">Teacher</th>
                <th style="text-align: center;">Status</th>
            </tr>
        </thead>
          <tbody>
          <?php $conn = new mysqli("localhost", "root", "", "information system") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM day_care_center_try, teacher_list "
                . "WHERE dcc_name = tcher_dcc_id and day_care_center_try.status ='yes' ") or die(mysqli_error());
            while($fetch = $query->fetch_array()){ 
          ?>
            <tr>
              <th style="text-align: left;"><?php echo $fetch['dcc_id']?></th>
              <td style="text-align: center;"><?php echo $fetch['dcc_name']?></td>  
              <td style="text-align: center;"><?php echo $fetch['dcc_barangay']?></td>  
              <td style="text-align: center;"><?php echo $fetch['teacher_name']?></td>  
              <td style="text-align: center;">
                    <?php if ($fetch['status'] == "yes") { ?>
                        <span class="label label-success">Active</span>
                    <?php } else { ?>
                        <span class="label label-danger">Inactive</span>
                    <?php } ?>
              </td>
            </tr>
          <?php } $connect->close() ?>
          </tbody>
      </table>
  </div>
  </div>

  </div>  
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