<?php
include_once("header.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

include_once("users.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($error_msg!="") { ?>
            <div class="form-group">
                <?php
                if($error_msg==md5("not_found_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not found!</label>
                <?php
                }
                else if($error_msg==md5("activate_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Unable to activate!</label>
                <?php
                }
                ?>
            </div>
        <?php
        } 
        
        else if($success_msg!="") { ?>
            <div class="form-group">
                <?php
                if($success_msg=="activated")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Activated!</label>
                <?php
                }
                ?>
            </div>
        <?php 
        }
        ?>

        <div class="table-responsive text-center">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>User ID</th> <?php } ?>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>District</th>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>E-mail Address</th> <?php } ?>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>Contact No.</th> <?php } ?>
                        <th>Status</th>
                        <th>Priority</th>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>ACTION</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        if($total_users > 0){
                            $i=0;
                            while($row_users = mysqli_fetch_assoc($result_users)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <?php if($_SESSION['user_status']=='2'){ ?> <td><?php echo $row_users['user_id']; ?> </td> <?php } ?>
                                <td><?php echo $row_users['username']; ?></td>
                                <td><?php echo $row_users['firstname']; ?></td>
                                <td><?php echo $row_users['lastname']; ?></td>
                                <td><?php echo $row_users['district']; ?></td>
                                <?php if($_SESSION['user_status']=='2'){ ?> <td><?php echo $row_users['email']; ?> </td> <?php } ?>
                                <?php if($_SESSION['user_status']=='2'){ ?> <td><?php echo $row_users['telephone']; ?> </td> <?php } ?>
                                <td>
                                    <?php if($row_users['status'] == "0") { ?>
                                        <span style="color:red">Inactive</span>
                                    <?php } else { ?>
                                        <span style="color:green">Active</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($row_users['status'] == "2") { ?>
                                        <span style="color:purple">Admin</span>
                                    <?php } else { ?>
                                        <span style="color:blue">User</span>
                                    <?php } ?>
                                </td>
                                <?php if($_SESSION['user_status']=='2'){ ?>
                                <td>
                                    <?php if($row_users['status'] == "0") { ?>
                                        <button type="button" class="btn btn-danger btn-padding-sm" onclick="location.href='user.activate.php?user_id=<?php echo $row_users['user_id']; ?>'">ACTIVATE</button>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                    <?php } } else { ?>
                        <tr><td class="text-center" colspan="6">No records found.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>