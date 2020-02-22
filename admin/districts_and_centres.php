<?php
include_once("header.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

include_once("districts_and_centres.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($_SESSION['user_status']=='2'){ ?>
            <div class="justify-content-center align-items-center text-center">
                <a href="district.add.php"><button type="button" class="btn btn-primary">Add New District</button></a>
            </div>
        <?php } ?>
        <br>
        <div class="table-responsive text-center">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>District ID</th>
                        <th>District</th>
                        <th>Coordinator</th>
                        <th>Contact No.</th>
                        <th>App. Form Cost</th>
                        <th>Centres <br> <span>( Centre ID | Centre's Name | Place | Gender )</span> </th>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>ACTION</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($total_districts > 0){
                            $i=0;
                            while($row_district = mysqli_fetch_assoc($result_districts)){
                                $i++;
                                $sql_centre = "SELECT * FROM tbl_exam_centres WHERE district_id = '{$row_district['district_id']}' ORDER BY centre_id ASC";
                                $result_centre = mysqli_query($db, $sql_centre);
                                $num_centre = mysqli_num_rows($result_centre);
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row_district['district_id'] ?></td>
                                    <td><?php echo $row_district['district'] ?></td>
                                    <td><?php echo $row_district['coordinator'] ?></td>
                                    <td><?php echo $row_district['telephone'] ?></td>
                                    <td>Rs. <?php echo number_format((float)$row_district['form_cost'], 2, '.', '') ?></td>
                                    <?php if ($num_centre > 0){ ?>
                                        <td style="padding:0">
                                            <table class="table table-striped" style="margin:0; width:100%">
                                                <tbody>
                                                    <?php while($row_centre = mysqli_fetch_assoc($result_centre)){ ?>
                                                    <tr>
                                                        <td><?php echo $row_centre['centre_id'] ?></td>
                                                        <td><?php echo $row_centre['centre_name'] ?></td>
                                                        <td><?php echo $row_centre['place'] ?></td>
                                                        <td><?php echo $row_centre['gender'] ?></td>
                                                        <?php if($_SESSION['user_status']=='2'){ ?>
                                                        <td>
                                                            <button type="button" class="btn-edit" onclick="location.href='assets/centre.edit.php?centre_id=<?php echo $row_centre['district_id'] ?>'"><i class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn-delete" onclick="location.href='assets/centre.delete.php?centre_id=<?php echo $row_centre['district_id'] ?>'"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    <?php } else { ?>
                                        <td>No centres available.</td>
                                    <?php }
                                    if($_SESSION['user_status']=='2'){ ?>
                                    <td>
                                        <button type="button" class="btn-add" onclick="location.href='centre.add.php?district_id=<?php echo $row_district['district_id'] ?>'"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn-edit" onclick="location.href='assets/district.edit.php?district_id=<?php echo $row_district['district_id'] ?>'"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn-delete" onclick="location.href='assets/district.delete.php?district_id=<?php echo $row_district['district_id'] ?>'"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <?php } ?>
                                </tr>
                    <?php } } else { ?>
                        <tr><td class="text-center" colspan="11">No records found.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>