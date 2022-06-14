
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="assets/design sb-admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/design sb-admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/design sb-admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datepicker/jquery.datetimepicker.css"/>
           <script src="assets/link/jquery.min.js"></script>  
           <script src="assets/link/jquery.dataTables.min.js"></script>  
           <script src="assets/link/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="assets/link/dataTables.bootstrap.min.css" /> 
  
        <link href="/assets/print/vendor/bootstrap-for-print/css/bootstrap_2.css" rel="stylesheet">
        <link href="/assets/print/assets/css/style.css" rel="stylesheet">
        <script src="/assets/print/vendor/jquery-1.10.2.min.js"></script>
        <script src="/assets/print/assets/js/jquery.printpage.js"></script>
</head>
<body>
<div class="container" style="margin-top: 25px;">


<section class="content">
  <div class="form-group pull-right" style="margin-top: 30px;margin-right: 40px;">
      <img name ="Photo" src="brosure.PNG">
  </div>
</section><!-- /.section --> 
 
</div><br>
<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border: 1px solid;
    padding-right: 25px;
}

.table > thead > tr > .emptyrow {
    border: 1px solid;
    padding-right: 25px;
}

.table > tbody > tr > .highrow {
    border: 3px solid;
    padding-right: 25px;
}
.table > thead > .mediumrow {
    border: 1px solid;
}
</style>
<span class="print"><a href="#"></a></span>
<script>
    $(document).ready(function() {
        $('span.print').printPage();
        $('span.print > a').trigger("click");
    });
</script>
</body>
</html>