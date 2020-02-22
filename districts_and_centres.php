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
    <div class="slide-1 " style="background-image: url('images/Banners/bg_centres.jpg'); background-position: 50% 0;" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col-lg-6">
                            <h1 data-aos="fade-up" data-aos-delay="0">Examination Districts and Centres</h1>
                            
                            <?php if(isset($display_centres) && ($display_centres == 1)) { ?>

                            <p data-aos="fade-up" data-aos-delay="100">&bullet; <?php echo $total_districts ?> Districts &nbsp; &bullet; <?php echo $total_centres ?> Centres</p>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">

        <?php if(isset($display_centres) && ($display_centres == 1)) { ?>

        <div class="row">
            <div class="col-lg-4" style="width: 90%; margin: 0 auto 20px;">
                <ul class="list-group">
                    <?php
                    $sql = "SELECT MAX(B.district) AS `name`, MAX(B.coordinator) AS coordinator, count(A.centre_id) AS count, B.telephone FROM tbl_exam_centres A INNER JOIN tbl_exam_districts B ON A.district_id = B.district_id GROUP BY A.district_id ORDER BY B.district ASC";
                    $results = mysqli_query($db, $sql);
                    $total = mysqli_num_rows($results);
                    while($row = mysqli_fetch_assoc($results))
                    {
                    ?>
                    <li class="list-group-item">
                    <span class="badge"><?php echo $row['count']; ?></span>
                        <tagname style="font-size: 15px"><b><?php echo $row['name']; ?></b></tagname>
                        <tagname style="font-size: 11px"><?php echo "\t\t\t(".$row['coordinator']." - ".$row['telephone'].")"; ?></tagname>
                    </li>
                <?php } ?>
                </ul>
            </div>

            <div class="col-lg-8">
                <table style="width: 90%; margin: 0 auto; font-size: 15px;" class="table table-striped table-hover">
                    <tr style="background-color:#c0c0c0;">
                        <th  style="width:1%;">#</th>
                        <th>District</th>
                        <th>Center Name</th>
                    </tr>
                    <?php
                    $no_count = 0;
                    while($row1 = mysqli_fetch_assoc($result_districts)) {
                        $district_id = $row1['district_id'];
                        $sql2 = "SELECT * FROM tbl_exam_centres WHERE district_id = '$district_id'";
                        $results2 = mysqli_query($db, $sql2);
                        $total2 = mysqli_num_rows($results2);
                        
                        if($total2 > 0) {
                            $no_count++;
                        ?>
                        <tr style="background-color:#eeeeee;">
                            <td> 
                                <?php if (strlen($no_count) == 1){
                                    echo '0'.$no_count;
                                } else {
                                    echo $no_count;
                                } ?> 
                            </td>
                            <td colspan="1" style="font-weight: bold;"><?php echo $row1['district']; ?></th> <th colspan="3" ><tagname style="font-size: 12px"><?php echo "\t\t\t(".$row1['coordinator']." - ".$row1['telephone'].")"; ?></tagname> </td>
                        </tr>

                        <?php
                        while($row2 = mysqli_fetch_assoc($results2)) { 
                        ?>
                            <tr style="background-color:#ffffff; color: blue; font-weight: 400;">
                                <td></td>
                                <td></td>
                                <?php 
                                $place = "";
                                if($row2['place'] != ""){
                                    $place = "\t(".$row2['place'].")";
                                }
                                ?>
                                <td><?php echo $row2['centre_name'].$place; ?></td>
                            </tr>
                    <?php
                        }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <?php } else { ?>
        
        <h3 style="padding: 20px; border-spacing: 50px; border-radius: 15px; border-style: solid; border-color: #000; border-width: 3px; text-align: center; color: red; margin-bottom: 0;">Examination Districts and Centres will be announced soon!</h3>

        <?php } ?>

	</div>
</div>



<?php
include_once("footer.php");
?>