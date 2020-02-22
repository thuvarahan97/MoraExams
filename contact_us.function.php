<?php
$name = htmlspecialchars($_POST['name']);
$place = htmlspecialchars($_POST['place']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

if(isset($_POST['send'])){

    $to = "moraetamils@gmail.com";
    $subject = "Contact us";
    $from = "moraetamils@gmail.com";
    $headers = "From:" . 'Contact Us '.' '.$email;


    $text = 'Contact Us Request '.',
   	'.',
    Name :'.$name.'
    Address :'.$place.'
    Email Id :'.$email.'

    Message :'. $message.'

    Submited by User.';


    if(mail($to, $subject, $text, $headers)){
        header("location: contact_us.php?msg=11101");
        die();
    }else{
        header("location: contact_us.php?msg=10001");
        die();
    }
}
else {
    header("location: contact_us.php?msg=10001");
    die();
}