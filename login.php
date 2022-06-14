<?php 
require_once 'configs/app_top_user.php';
require'admin 1/include/configs/app_top_user.php';
$title ='login';

function safe_output() {
    return $connect->escape_string;
}

$usr_level = $_POST['usr_level'];
$active = $_POST['active'];

$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
$firstnlast = $user_fname." ".$user_lname;

$usr_email = $_POST['usr_email'];
$usr_contact = $_POST['usr_contact'];

// $usr_pass = $connect->escape_string(password_hash($_POST['usr_pass'], PASSWORD_BCRYPT));
$usr_pass = $_POST['usr_pass'];
$confirm_password = $_POST['confirm_password'];

$usr_answer = $_POST['usr_answer'];

// Insert
$msg ="";
$type ="";

if(isset($_POST['register']))
{

   if ($usr_pass != $confirm_password) {
      $_SESSION["errorMsg"] = "Password Do not Match Please Make Sure Your Password and Confirm Password are the same";
      $_SESSION["errorType"] = CLASSNAME_WARNING;
      header("Location: login.php");
    }

    else {

    $users = "INSERT INTO `users`(`usr_name`,`usr_contact`,`usr_email`, `usr_pass`, `usr_answer`,`active`,`usr_level`) 
      VALUES ('$firstnlast','$usr_contact','$usr_email','$usr_pass','$usr_answer','$active','$usr_level')";
    try{
        $users_result = mysqli_query($connect, $users);
        
        if($users_result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
              $_SESSION["errorMsg"] = ROW_ADDED_SUCCESS;
              $_SESSION["errorType"] = CLASSNAME_SUCCESS;
              header("Location: login.php");
            }else{
              $_SESSION["errorMsg"] = ROW_ADDED_FAILED;
              $_SESSION["errorType"] = CLASSNAME_WARNING;
              header("Location: login.php");
            }
        }
    } catch (Exception $ex) {
        // echo 'Error Register '.$ex->getMessage();
        $_SESSION["errorMsg"] = "Your Email Address has been taken! Please Try Again.";
        $_SESSION["errorType"] = CLASSNAME_WARNING;
        header("Location: login.php");
    }
  } // End Else
} //End Isset Post


?>

<?php include 'include/login-head.php' ?>
<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>

<!-- <?php// if ($msg <> "") { ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-<?php //echo $type; ?>" style="text-align: left;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php //echo $msg; ?>
        </div>
    </div>
 <?php // } ?><br> -->  

<?php if ($ERROR_TYPE <> "") { ?>
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-dismissible alert-<?php echo $ERROR_TYPE; ?>" style="text-align: left;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $ERROR_MSG; ?>
        </div>
    </div>
<?php } ?><br><br>

  <div class="form">
      
      <div class="content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login-auth.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="usr_email">
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="usr_pass">
          </div>
          
          <p class="forgot"><a href="forgot password.php">Forgot Password?</a></p>
          
          <input type="submit" class="button button-block" name="login" value="Log In">
          
          </form>

        </div>
          
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php include 'include/foot.php' ?>
<?php include 'include/footer.php' ?>