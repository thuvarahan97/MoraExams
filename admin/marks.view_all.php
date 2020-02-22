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
                <a href="marks.calculate.php?stream_id=1"><button type="button" class="btn btn-danger">Calculate Bio Stream Marks</button></a>
                <a href="marks.calculate.php?stream_id=2"><button type="button" class="btn btn-danger">Calculate Maths Stream Marks</button></a>
            </div>
        <?php } ?>
        
        <br>
        
        <?php if($error_msg!="") { ?>
            <div class="form-group">
                <?php
                if($error_msg==md5("not_found_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">No records found!</label>
                <?php
                }
                else if($error_msg==md5("failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Process Failed!</label>
                <?php
                }
                ?>
            </div>
        <?php
        }
        
        else if($success_msg!="") { ?>
            <div class="form-group">
                <?php
                if($success_msg=="ok")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Done!</label>
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
        var search = '';
        var page = 1;
        var pagefirstshow = 1;
        var pagelastshow = 10;
        load_database('', page, pagefirstshow, pagelastshow);
        function load_database(query, page, pagefirstshow, pagelastshow) {
            $.ajax({
                url: "marks.view_all.table.php",
                method: "POST",
                data: {query:query,page:page,pagefirstshow:pagefirstshow,pagelastshow:pagelastshow},
                success: function(data) {
                    $("#student_marks").html(data);
                }
            });
        }

        $('#search').keyup(function(){
            search = $(this).val();
            if(search != '') {
                load_database(search, 1, 1, 10);
            } else {
                load_database('', 1, 1, 10);
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
            load_database(search, page, pagefirstshow, pagelastshow);
        });
    });
</script>

<?php
include_once("footer.php");
?>