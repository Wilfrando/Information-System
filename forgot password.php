<?php 
require_once 'configs/app_top_user.php';
$title ='login';
session_start();

if(isset($_POST['insert'])) {

    $numbers = $_POST['number'];
    $rad = mt_rand(1000000,9999999);
    $barangay = "63".$numbers."";
    $messages = "Greetings! your forgot password code is (". $rad .")";


    try{ $gotcha = mysqli_query($connect, "UPDATE users SET "
                . "forgot_password = '$rad' WHERE usr_contact = $barangay");
        
        if($gotcha)
        {
            if(mysqli_affected_rows($connect) > 0)
            {

              // Authorisation details.
              $username = "dutertesenpai30@gmail.com";
              $hash = "5b383aba1571fd4d72dc012944a636773f87a3b280d663016669337280d03847";

              // Config variables. Consult http://api.txtlocal.com/docs for more info.
              $test = "0";

              // Data for text message. This is the text message data.
              $sender = "San Nicolas DSWD"; // This is who the message appears to be from.
              $numbers = ''.$barangay.'.'; // A single number or a comma-seperated list of numbers
              $message = ''.$messages.'.';
              // 612 chars or less
              // A single number or a comma-seperated list of numbers
              $message = urlencode($message);
              $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
              $ch = curl_init('http://api.txtlocal.com/send/?');
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              $result = curl_exec($ch); // This is the result from the API
              curl_close($ch);

              $_SESSION["errorMsg"] = "Code has been send to your number. please enter the code.";
              $_SESSION["errorType"] = CLASSNAME_SUCCESS;
              header("Location: forgot password check.php?id=$barangay");
            }else{
              $_SESSION["errorMsg"] = "your number is not registered!";
              $_SESSION["errorType"] = "warning";
              header("Location: login.php"); 
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }

}

?>

<?php include 'include/login-head.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>

<?php if ($msg <> "") { ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-<?php echo $type; ?>" style="text-align: left;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $msg; ?>
        </div>
    </div>
<?php } ?><br>  

<div class="form">
<h1>Forgot Password</h1>
  <form action="forgot password.php" method="post" autocomplete="off">
    <div class="field-wrap">
    <label>
      Enter 9-digits of your contact number
    </label>
    <input type="number" required autocomplete="off" name="number"/>
  </div>
  <input style="margin-bottom: 5px;" type="submit" class="button button-block" name="insert" value="Send Code" >
  <a href="login.php">Back To Login</a>
  </form> 
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php include 'include/foot.php' ?>
<?php include 'include/footer.php' ?>  