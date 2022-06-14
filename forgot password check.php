<?php 
require_once 'configs/app_top_user.php';
$title ='login';
session_start();

$id = $_GET['id'];
//selecting data associated with this particular id
$rsult = mysqli_query($connect, "SELECT * FROM users WHERE usr_contact=$id");

while($res = mysqli_fetch_array($rsult))
{
  $a = $res['forgot_password'];
  $b = $res['usr_email'];
  $c = $res['usr_contact'];

}
if(isset($_POST['insert'])) {


    $entercode = mysqli_real_escape_string($connect, $_POST['code']);
    $barangays = $_POST['barangay'];
    $hiddencode = mysqli_real_escape_string($connect, $_POST['hiddencode']);
    if ($entercode != $hiddencode) {
      $_SESSION["errorMsg"] = "Invalid Code! Please Try Again.";
      $_SESSION["errorType"] = "warning";
      header("Location: login.php"); 
    } else {
      $password = mt_rand(1000000,9999999);
      $messages = "Greetings! your username is (". $b .") and your new password is (". $password .") You can change your password to your profile after you login. dont tell anybody about your username and password thank you!";


    try{ $gotcha = mysqli_query($connect, "UPDATE users SET "
                . "usr_pass = '$password' WHERE forgot_password = $entercode");
        
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
              $numbers = ''.$barangays.'.'; // A single number or a comma-seperated list of numbers
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


              $_SESSION["errorMsg"] = "Your new username and password has been send to your number.";
              $_SESSION["errorType"] = CLASSNAME_SUCCESS;
              header("Location: login.php");
            }else{
              $_SESSION["errorMsg"] = "Invalid Code. please try again!";
              $_SESSION["errorType"] = "warning";
              header("Location: login.php"); 
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }

    }
}

?>

<?php include 'include/login-head.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>

<?php if ($ERROR_TYPE <> "") { ?>
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-<?php echo $ERROR_TYPE; ?>" style="text-align: left;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $ERROR_MSG; ?>
        </div>
    </div>
<?php } ?><br>

<div class="form">
<h1>Forgot Password</h1>
  <form method="post" autocomplete="off">
    <div class="field-wrap">
    <label>
      Enter Code<span class="req">*</span>
    </label>
    <input type="hidden" name="barangay" value="<?php echo $c; ?>">
    <input type="number" required autocomplete="off" name="code"/>
    <input type="hidden" required autocomplete="off" name="hiddencode" value="<?php echo $a; ?>" />
  </div>
  <input style="margin-bottom: 5px;" type="submit" class="button button-block" name="insert" value="change password">
  <a href="login.php">Back To Login</a>
  </form> 
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php include 'include/foot.php' ?>
<?php include 'include/footer.php' ?>