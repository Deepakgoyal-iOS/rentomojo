<?php include 'config.php';
$name = $_GET['Name'];
$sql = "delete from contacts where Name = '$name'";
$var = $db->query($sql);
if($var){
	echo "contact successfully deleted";
}
header('location: index.php');
?>