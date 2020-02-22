<?php
include_once("header.php");

$sql_districts = "SELECT * FROM tbl_exam_districts ORDER BY district ASC";
$result_districts = mysqli_query($db, $sql_districts);
$total_districts = mysqli_num_rows($result_districts);

$sql_centres = "SELECT * FROM tbl_exam_centres";
$result_centres = mysqli_query($db, $sql_centres);
$total_centres = mysqli_num_rows($result_centres);

?>

<div class="intro-section single-cover" id="home-section">
    <div class="slide-1 " style="background-image: url('images/Banners/bg_timetable.jpg'); background-position: 50% 0;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Examination TimeTable</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">

        <?php if(isset($display_timetable) && ($display_timetable == 1)) { ?>
        
        <center>
            <table class="greyGridTable">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>SUBJECT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2"><?=date('F d, Y', strtotime($date1));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date1));?></tagname></td>
                        <td><?=$time_part2?></td>
                        <td>Combined Mathematics I</td>
                    </tr>
                    <tr>
                        <td><?=$time_part1?></td>
                        <td>Biology I</td>
                    </tr>
                    <tr>
                        <td rowspan="2"><?=date('F d, Y', strtotime($date2));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date2));?></tagname></td>
                        <td><?=$time_part2?></td>
                        <td>Combined Mathematics II</td>
                    </tr>
                    <tr>
                        <td><?=$time_part2?></td>
                        <td>Biology II</td>
                    </tr>
                    <tr>
                        <td><?=date('F d, Y', strtotime($date3));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date3));?></tagname></td>
                        <td><?=$time_part1?></td>
                        <td>Physics I</td>
                    </tr>
                    <tr>
                        <td><?=date('F d, Y', strtotime($date4));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date4));?></tagname></td>
                        <td><?=$time_part2?></td>
                        <td>Physics II</td>
                    </tr>
                    <tr>
                        <td rowspan="2"><?=date('F d, Y', strtotime($date5));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date5));?></tagname></td>
                        <td><?=$time_part1?></td>
                        <td>Chemistry I</td>
                    </tr>
                    <tr>
                        <td><?=$time_part1?></td>
                        <td>ICT I</td>
                    </tr>
                    <tr>
                        <td rowspan="2"><?=date('F d, Y', strtotime($date6));?><br/> <tagname style="font-size: 15px;"><?=date('l', strtotime($date6));?></tagname></td>
                        <td><?=$time_part2?></td>
                        <td>Chemistry II</td>
                    </tr>
                    <tr>
                        <td><?=$time_part2?></td>
                        <td>ICT II</td>
                    </tr>
                </tbody>
            </table>
        </center>

        <?php } else { ?>

        <h3 style="padding: 20px; border-spacing: 50px; border-radius: 15px; border-style: solid; border-color: #000; border-width: 3px; text-align: center; color: red; margin-bottom: 0;">Examination timetable will be announced soon!</h3>
        
        <?php } ?>

    </div>
</div>

<?php
include_once("footer.php");
?>