<?php
require_once 'configs/app_top_user.php';
  if(ISSET($_POST['login'])){

    $usr_email = $_POST['usr_email'];
    $usr_pass = $_POST['usr_pass'];
    $conn = new mysqli("localhost", "root", "", "information system") or die(mysqli_error());
    $query = $conn->query("SELECT * FROM `users`"
      ." WHERE `usr_email` = '$usr_email' && `usr_pass` = '$usr_pass'") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $valid = $query->num_rows;
    $section = $fetch['usr_level']; 

    ///////////////////////////////////////////
    $admin_1 = $conn->query("SELECT * FROM `admin1`") or die(mysqli_error());
    $ad1 = $admin_1->fetch_array();
    
    $admin_2 = $conn->query("SELECT * FROM `admin2`") or die(mysqli_error());
    $ad2 = $admin_2->fetch_array();
    
    $admin_3 = $conn->query("SELECT * FROM `admin3`") or die(mysqli_error());
    $ad3 = $admin_3->fetch_array();
    
    $admin_4 = $conn->query("SELECT * FROM `admin4`") or die(mysqli_error());
    $ad4 = $admin_4->fetch_array();
    //////////////////////////////////////////
      if($valid > 0){
        // <!-- Hidden Jutsu user level 
        // 0 = admin 1 
        // 1 = admin 2 
        // 2 = admin 3 
        // 3 = admin -->
        if($section == "1"){
          $_SESSION['usr_id'] = $fetch['usr_id'];
          $_SESSION['usr_name'] = $fetch['usr_name'];
          $_SESSION['usr_contact'] = $fetch['usr_contact'];
          $_SESSION['usr_email'] = $fetch['usr_email'];
          $_SESSION['usr_pass'] = $fetch['usr_pass'];
          $_SESSION['usr_answer'] = $fetch['usr_answer'];
          $_SESSION['active'] = $fetch['active'];
          $_SESSION['usr_level'] = $fetch['usr_level'];
          $_SESSION['admin1_id'] = $ad1['admin1_id'];
          $_SESSION['usr_position'] = $fetch['usr_position'];
          header("location: admin 1/index.php");
        }
        elseif($section == "2"){
          $_SESSION['usr_id'] = $fetch['usr_id'];
          $_SESSION['usr_name'] = $fetch['usr_name'];
          $_SESSION['usr_contact'] = $fetch['usr_contact'];
          $_SESSION['usr_email'] = $fetch['usr_email'];
          $_SESSION['usr_pass'] = $fetch['usr_pass'];
          $_SESSION['usr_answer'] = $fetch['usr_answer'];
          $_SESSION['active'] = $fetch['active'];
          $_SESSION['usr_level'] = $fetch['usr_level'];
          $_SESSION['admin2_id'] = $ad2['admin2_id'];
          $_SESSION['usr_position'] = $fetch['usr_position'];
          header("location: admin 2/index.php");
        }
        elseif($section == "3"){
          $_SESSION['usr_id'] = $fetch['usr_id'];
          $_SESSION['usr_name'] = $fetch['usr_name'];
          $_SESSION['usr_contact'] = $fetch['usr_contact'];
          $_SESSION['usr_email'] = $fetch['usr_email'];
          $_SESSION['usr_pass'] = $fetch['usr_pass'];
          $_SESSION['usr_answer'] = $fetch['usr_answer'];
          $_SESSION['active'] = $fetch['active'];
          $_SESSION['usr_level'] = $fetch['usr_level'];
          $_SESSION['admin3_id'] = $ad3['admin3_id'];
          $_SESSION['usr_position'] = $fetch['usr_position'];
          header("location: admin 3/index.php");
        }
        elseif($section == "4"){
          $_SESSION['usr_id'] = $fetch['usr_id'];
          $_SESSION['usr_name'] = $fetch['usr_name'];
          $_SESSION['usr_contact'] = $fetch['usr_contact'];
          $_SESSION['usr_email'] = $fetch['usr_email'];
          $_SESSION['usr_pass'] = $fetch['usr_pass'];
          $_SESSION['usr_answer'] = $fetch['usr_answer'];
          $_SESSION['active'] = $fetch['active'];
          $_SESSION['usr_level'] = $fetch['usr_level'];
          $_SESSION['admin4_id'] = $ad4['admin4_id'];
          $_SESSION['usr_position'] = $fetch['usr_position'];
          header("location: admin 4/index.php");
        }
        elseif($section == "5"){
        } else {
          $_SESSION["errorMsg"] = "Account Does Not Exist! Please Try Again.";
          $_SESSION["errorType"] = "danger";
          header("Location: login.php");
        }
      }else{
        $_SESSION["errorMsg"] = "Account Does Not Exist! Please Try Again.";
        $_SESSION["errorType"] = "danger";
        header("Location: login.php");
      }
    $conn->close();
            
    
    }
