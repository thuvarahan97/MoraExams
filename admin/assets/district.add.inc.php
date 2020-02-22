<?php

$district_option = array(
    '1' => 'Ampara',
    '2' => 'Anuradhapura',
    '3' => 'Badulla',
    '4' => 'Batticaloa',
    '5' => 'Colombo',
    '6' => 'Galle',
    '7' => 'Gampaha',
    '8' => 'Hambantota',
    '9' => 'Jaffna',
    '10' => 'Kalutara',
    '11' => 'Kandy',
    '12' => 'Kegalle',
    '13' => 'Kilinochchi',
    '14' => 'Kurunegala',
    '15' => 'Mannar',
    '16' => 'Matale',
    '17' => 'Matara',
    '18' => 'Monaragala',
    '19' => 'Mullaitivu',
    '20' => 'Nuwara-Eliya',
    '21' => 'Polonnaruwa',
    '22' => 'Puttalam',
    '23' => 'Ratnapura',
    '24' => 'Trincomalee',
    '25' => 'Vavuniya'
);

$district_id="";
$district="";
$coordinator="";
$telephone="";
$form_cost="";

if (isset($_POST['add'])) {
    $district_id = $_POST['district_id'];

    foreach($district_option as $dist_id => $dist_name) {
        if($dist_id == $district_id) {
            $district = $dist_name;
            break;
        }
    }
    
    $coordinator = $_POST['coordinator'];
    $telephone = $_POST['telephone'];
    $form_cost = $_POST['form_cost'];

    $query_check = "SELECT * FROM tbl_exam_districts WHERE district_id = '$district_id'";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)==0) {
        $query_insert = "INSERT INTO tbl_exam_districts VALUES('$district_id','$district','$coordinator','$telephone','$form_cost')";
        mysqli_query($db, $query_insert);
    
        redirect("district.add.php?success=saved");
    }
    else {
        redirect('district.add.php?error='.md5("already_exists_error"));
    }
}

?>