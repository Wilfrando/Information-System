
<script src="../assets/datepicker/build/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
    $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
    $.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:  '1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#datetimepicker5').datetimepicker({
    
    lang:'eng',
    timepicker:false,
    format:'Y-m-d',
    formatDate:'Y-m-d',
});
$('#datetimepicker4').datetimepicker({
    
    lang:'eng',
    timepicker:false,
    format:'Y-m-d',
    formatDate:'Y-m-d',
});
$('#datetimepicker3').datetimepicker({
    
    lang:'eng',
    timepicker:false,
    format:'Y-m-d',
    formatDate:'Y-m-d',
});
$('#datetimepicker2').datetimepicker({
    
    lang:'eng',
    timepicker:false,
    format:'Y-m-d',
    formatDate:'Y-m-d',
});
$('#datetimepicker1').datetimepicker({
    datepicker:false,
    format:'h:i a',
    step:5
});

</script>
<!-- jQuery 2.2.3 --><!-- 
<script src="assets/design sb-admin/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<!-- Bootstrap 3.3.6 -->
<script src="assets/design sb-admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/design sb-admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/design sb-admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/design sb-admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/design sb-admin/dist/js/demo.js"></script>

</body>
</html>