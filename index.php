<?php require_once 'configs/app_top_user.php'; ?>
<?php 
require 'action/feeding program-sql.php'

?>
<?php include 'include/head.php' ?>
<?php include 'action/feeding program-head.php'; ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>
<?php include 'include/picture.php' ?>

 <section class="content">
<!-- start content here -->
<div class="">
<div class="panel panel-primary">
  <div class="panel-heading">
      <span class="fa fa-cog"></span> Feeding Program</div>
  <div class="panel-body">
    <div style="text-align: left;">
      <p><span class="label label-primary"> Note:</span> Feeding program in every barangay is <b> MONDAY - FRIDAY 10am - 12pm </b>    </p><br>
    </div>
    <div style="text-align: center;">
      <p><span class="label label-primary"> Status Legend: </span></p>
      <p> <span class="label label-success"> Available</span> Child development Center feeding program are available for today.</p>
      <p> <span class="label label-danger"> Canceled</span> Child Development Center feeding program are canceled for today.</p>
    </div>
  <div class="table-responsive" style="padding-bottom: 70px;">
      <table id="employee_data" class="table table-hover table-datatable table-striped table-condensed">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Child Development Center</th>
                <th style="text-align: center;">Child Development worker</th>
                <!-- <th style="text-align: left;">Start Date</th>
                <th style="text-align: left;">End Date</th> -->
                <!-- <th style="text-align: center;">Start Time</th> -->
                <th style="text-align: center;">Status</th>
            </tr>
        </thead>
          <tbody>
          <?php
            $number = 0; 
           $conn = new mysqli("localhost", "root", "", "information system") or die(mysqli_error());
            $query = $conn->query("SELECT *"
                . " FROM day_care_center_try, teacher_list "
                . " WHERE dcc_name = tcher_dcc_id ORDER BY dcc_name") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
                
               if ($fetch['dcc_id']) {
                    $number++;
                }
          ?>
            <tr>
              <th style="text-align: center;"><?php echo $number; ?></th>
              <td style="text-align: center;"><?php echo $fetch['dcc_name']?></td>   
              <td style="text-align: center;"><?php echo $fetch['teacher_name']?></td>
              <!-- <td style="text-align: left;"><?php echo $fetch['dateta']?></td>
              <td style="text-align: left;"><?php echo $fetch['dateta_start']?></td> -->
              <!-- <td style="text-align: center;"><?php echo $fetch['fg_time']?></td>  -->
              <td style="text-align: center;">
                    <?php if ($fetch['fg_status_desu'] == "yes") { ?>
                        <span class="label label-success">Available</span>
                    <?php } else { ?>
                        <span class="label label-danger">Canceled</span>
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
</section><!-- /.section  -->
<!-- <section class="content">
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
</section> -->


</section><!-- /.content -->
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
<?php include 'include/foot.php' ?>
<?php include 'include/footer.php' ?>