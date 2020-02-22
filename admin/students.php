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

$user = "";
if(isset($_GET['user_id'])) {
    $user = $_GET['user_id'];
}

$checked = "";
if(isset($_GET['checked'])) {
    $checked = $_GET['checked'];
}

include_once("students.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($_SESSION['user_status']>0){ ?>
            <div class="justify-content-center align-items-center text-center">
                <a href="student.add.php"><button type="button" class="btn btn-primary">Add New Student</button></a>
                <a href="student.details.php"><button type="button" class="btn btn-danger">Check Student's Details</button></a>
                <?php if(!isset($_GET['user_id']) && !isset($_GET['checked'])) { ?>
                    <a href="students.php?user_id=<?=$_SESSION['user_id'];?>"><button type="button" class="btn btn-purple">View My Entries</button></a>
                <?php } else { ?>
                    <a href="students.php"><button type="button" class="btn btn-reddish-pink">View All Entries</button></a>
                <?php } ?>
                <a href="students.php?checked=0"><button type="button" class="btn btn-brown">View Unchecked</button></a>
                <?php if($_SESSION['user_status'] == 2) { ?>
                    <a href="students.errors.php"><button type="button" class="btn btn-dark">View Errors</button></a>
                <?php } ?>
            </div>
        <?php } ?>
        
        <br>
        
        <?php if($error_msg!="") { ?>
            <div class="form-group">
                <?php
                if($error_msg==md5("not_found_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not found!</label>
                <?php
                }
                else if($error_msg==md5("delete_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Unable to delete!</label>
                <?php
                }
                else if($error_msg==md5("update_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to update!</label>
                <?php
                }
                else if($error_msg==md5("check_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to check!</label>
                <?php
                }
                ?>
            </div>
        <?php
        } 
        
        else if($success_msg!="") { ?>
            <div class="form-group">
                <?php
                if($success_msg=="deleted")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Deleted!</label>
                <?php
                }
                else if($success_msg=="updated")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Updated!</label>
                <?php
                }
                else if($success_msg=="checked")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Checked!</label>
                <?php
                }
                ?>
            </div>
        <?php 
        }
        ?>

        <input type="search" class="form-control search student-search" id="search" placeholder="Search"/>
        
        <div id = "student_database">
        </div>
                
    </div>
</div>

<script>
    $(document).ready(function() {
        var user = '<?php echo $user; ?>';
        var checked = '<?php echo $checked; ?>'
        var search = '';
        var page = 1;
        var pagefirstshow = 1;
        var pagelastshow = 10;
        load_database(user, '', page, pagefirstshow, pagelastshow, checked);
        function load_database(user, query, page, pagefirstshow, pagelastshow, checked) {
            $.ajax({
                url: "students.table.php",
                method: "POST",
                data: {user:user,query:query,page:page,pagefirstshow:pagefirstshow,pagelastshow:pagelastshow,checked:checked},
                success: function(data) {
                    $("#student_database").html(data);
                }
            });
        }

        $('#search').keyup(function(){
            search = $(this).val();
            if(search != '') {
                load_database(user, search, 1, 1, 10, checked);
            } else {
                load_database(user, '', 1, 1, 10, checked);
            }
        });

        $(document).on('click', '.page-link', function() {
            page = Number($(this).attr("pid"));
            if(pagefirstshow > page) {
                if(page <= 10){
                    pagefirstshow = 1;
                    pagelastshow = 10;
                } else {
                    pagefirstshow = page - 9;
                    pagelastshow = page;
                }
            } else if(pagelastshow < page) {
                pagefirstshow = page - 9;
                pagelastshow = page;
            }else{
                pagefirstshow = pagefirstshow;
                pagelastshow = pagelastshow;
            }
            load_database(user, search, page, pagefirstshow, pagelastshow, checked);
        });
    });
</script>

<?php
include_once("footer.php");
?>