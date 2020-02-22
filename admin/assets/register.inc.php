<?php

$user_id="";
$firstname="";
$lastname="";
$username="";
$password="";
$retype_password="";
$email="";
$telephone="";
$district="";

if (isset($_POST['register'])) {
    $user_id = "USER".time();
    $firstname = ucwords($_POST['firstname']);
    $lastname = ucwords($_POST['lastname']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $district = $_POST['district'];
    $register_date = date('Y-m-d H:i:s');

    $error_return_value="firstname=".$firstname."&lastname=".$lastname."&username=".$username."&email=".$email."&telephone=".$telephone."&district=".$district;
    
    $query1 = "SELECT * FROM tbl_users WHERE username = '$username'";
    $results1 = mysqli_query($db,$query1);

    $query2 = "SELECT * FROM tbl_users WHERE email = '$email'";
    $results2 = mysqli_query($db,$query2);

    if (mysqli_num_rows($results1)==0) {
        if (mysqli_num_rows($results2)==0) {
            if ($password == $retype_password) {
                $password =md5($password);
                $query = "INSERT INTO tbl_users VALUES('$user_id','$firstname','$lastname','$username','$password','$email','$telephone','$district','0','$register_date')";
                mysqli_query($db, $query);
            
                redirect("register.php?success=saved");
            }
            else {
                //echo '<meta http-equiv="refresh" content="0; URL=register.php?error='.md5("password_error").'&'.$error_return_value.'">';
                redirect('register.php?error='.md5("password_error").'&'.$error_return_value);
            }
        }
        else {
            $error_return_value="firstname=".$firstname."&lastname=".$lastname."&username=".$username."&telephone=".$telephone."&district=".$district;
            redirect('register.php?error='.md5("email_error").'&'.$error_return_value);
        }
    }
    else {
        if (mysqli_num_rows($results2)==0) {
            $error_return_value="firstname=".$firstname."&lastname=".$lastname."&email=".$email."&telephone=".$telephone."&district=".$district;
            redirect('register.php?error='.md5("username_error").'&'.$error_return_value);
        }
        else {
            $error_return_value="firstname=".$firstname."&lastname=".$lastname."&telephone=".$telephone."&district=".$district;
            redirect('register.php?error='.md5("account_error").'&'.$error_return_value);
        }
    }
}

?>