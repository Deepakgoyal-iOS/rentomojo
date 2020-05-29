<?php 

include 'config.php';

if(isset($_POST['send'])){

$name = $_POST['Name'];
$phone = $_POST['Phone'];
$mail = $_POST['gmail'];
$dob = $_POST['DateOfBirth'];
$phonenumbercount = count($_POST['Phone']);
$serphone = serialize($phone);
$sermail = serialize($mail);
$sql = "insert into contacts(Name,phone,dateofbirth,mail) values('$name','$serphone','$dob','$sermail')";
$var = $db->query($sql);
header('location: index.php');
}
?>