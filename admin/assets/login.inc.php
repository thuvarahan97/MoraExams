<?php
if(!isset($_SESSION['user_id'])){
    $username="";
    $password="";

    if (isset($_POST['login'])) {

        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        $password = md5($password);
        
        $query = "SELECT * FROM tbl_users WHERE `username` = '$username' AND `password` = '$password'";
        $results = mysqli_query($db,$query);
        
        if (mysqli_num_rows($results)==1){

            $row = mysqli_fetch_array($results);

            if($row['status']=="0"){
                $error = md5("activation_error");
                redirect("index.php?error=".$error);
            }else{
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_status'] = $row['status'];
                
                $id = time();
				$user_id = $_SESSION['user_id'];
                $login_time = date('Y-m-d H:i:s');
                $ip_address = getUserIpAddress();
                
                $sql_login = "INSERT INTO tbl_login_history VALUES ('$id','$user_id','$login_time','','$ip_address')";
                mysqli_query($db,$sql_login);

                redirect("home.php");
            }

        }else{
            $error = md5("username_password_error");
            redirect("index.php?error=".$error);
            
        }
    }
}
?>