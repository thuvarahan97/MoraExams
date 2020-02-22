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

$unchecked = "";
if(isset($_GET['unchecked'])) {
    $unchecked = $_GET['unchecked'];
}

$subject_option = array(
    '01' => 'Physics',
    '02' => 'Chemistry',
    '09' => 'Biology',
    '10' => 'Maths',
    '20' => 'ICT'
);

$subject_num = "";
$subject_name = "";
if(isset($_GET['subject'])) {
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $_GET['subject']) {
            $subject_num = $_GET['subject'];
            $subject_name = $subj_name;
            break;
        }
    }
}

include_once("marks.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($_SESSION['user_status']>0){ ?>
            <div class="justify-content-center align-items-center text-center">
                <a href="marks.enter.php?subject=<?=$subject_num?>&part=1"><button type="button" class="btn btn-primary">Enter <?=$subject_name?> - I Marks</button></a>
                <a href="marks.enter.php?subject=<?=$subject_num?>&part=2"><button type="button" class="btn btn-info">Enter <?=$subject_name?> - II Marks</button></a>
                <a href="marks.details.php?subject=<?=$subject_num?>&part=1"><button type="button" class="btn btn-danger">Check <?=$subject_name?> - I Marks</button></a>
                <a href="marks.details.php?subject=<?=$subject_num?>&part=2"><button type="button" class="btn btn-danger">Check <?=$subject_name?> - II Marks</button></a>
                <a href="marks.php?subject=<?=$subject_num?>&part=1&unchecked=p1"><button type="button" class="btn btn-brown">View <?=$subject_name?> - I Unchecked</button></a>
                <a href="marks.php?subject=<?=$subject_num?>&part=2&unchecked=p2"><button type="button" class="btn btn-brown">View <?=$subject_name?> - II Unchecked</button></a>
                <?php if(isset($_GET['unchecked']) && !empty($_GET['unchecked'])) { ?>
                    <a href="marks.php?subject=<?=$subject_num?>&part=2"><button type="button" class="btn btn-reddish-pink">View All Entries</button></a>
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
                else if($error_msg==md5("stream_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Incorrect Subject Stream!</label>
                <?php
                }
                else if($error_msg==md5("already_checked_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Already Checked!</label>
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
                if($success_msg=="updated")
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

        <div id = "student_marks">
        </div>
                
    </div>
</div>

<script>
    $(document).ready(function() {
        var user = '<?php echo $user; ?>';
        var search = '';
        var page = 1;
        var subject = <?php echo $subject_num; ?>;
        var unchecked = '<?php echo $unchecked; ?>';
        var pagefirstshow = 1;
        var pagelastshow = 10;
        load_database(user, '', page, subject, unchecked, pagefirstshow, pagelastshow);
        function load_database(user, query, page, subject, unchecked, pagefirstshow, pagelastshow) {
            $.ajax({
                url: "marks.table.php",
                method: "POST",
                data: {user:user,query:query,page:page,subject:subject,unchecked:unchecked,pagefirstshow:pagefirstshow,pagelastshow:pagelastshow},
                success: function(data) {
                    $("#student_marks").html(data);
                }
            });
        }

        $('#search').keyup(function(){
            search = $(this).val();
            if(search != '') {
                load_database(user, search, 1, subject, unchecked, 1, 10);
            } else {
                load_database(user, '', 1, subject, unchecked, 1, 10);
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
            load_database(user, search, page, subject, unchecked, pagefirstshow, pagelastshow);
        });
    });
</script>

<?php
include_once("footer.php");
?>