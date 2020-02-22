<?php
include_once("db_config.php");

if(isset($_POST["district_id"])){
    $district_id = $_POST["district_id"];
    $sql_centres = "SELECT * FROM tbl_exam_centres WHERE district_id = '$district_id' ORDER BY district_id ASC";
    $result_centres = mysqli_query($db, $sql_centres);
    if(mysqli_num_rows($result_centres)>0){
        while($row_centres = mysqli_fetch_assoc($result_centres)){ ?>
            <option value = "<?php echo $row_centres['centre_id'] ?>">
                <?php echo $row_centres['centre_name'] ?>
            </option>
    <?php
        } 
    } 
    else { ?>
        <option disabled selected>No examination centres available.</option>
    <?php }
}
?>