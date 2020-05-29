<!DOCTYPE HTML>
<?php include 'config.php';

if(isset($_POST['send'])){

$id = $_POST['Id'];
$name = $_POST['Name'];
$phone = $_POST['Phone'];
$mail = $_POST['Gmail'];
$dob = $_POST['DateOfBirth'];
$serphone = serialize($phone);
$sermail = serialize($mail);
$sql = "update contacts set Name = '$name', phone = '$serphone', dateofbirth = '$dob', mail = '$sermail' where Id = $id ";
$var = $db->query($sql);
header('location: index.php');
}
else{
$id = $_GET['Id'];
$sql = "select * from contacts where Id = '$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
}
?>

<html>
<head>
<title>Contacts</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <center>
  <div class="container" style="height: 500px; width: 700px; background-color: rgb(236,240,241); margin-top: 100px;">
   
   <form style="position: absolute; padding-left: 150px; padding-top: 70px;" method="post" action="updatecontact.php">
<div class="form-row">
    <div class="col-md-12 mb-1"  style="text-align: left;">
      <label for="name">Your Name</label>
      <input type="text" class="form-control" id="name" name="Name" placeholder="Name" value="<?php echo $row['Name'] ?>" required>
    </div>
    
  <input type="hidden" name="Id" class="form-control" value="<?php echo $row['Id'] ?>">
    <div class="col-md-12 mb-3"  style="text-align: left;">
      <label for="dob">DOB</label>
      <input type="Date" class="form-control" id="dob" name="DateOfBirth" placeholder="DD/MM/YYYY" value="<?php echo $row['dateofbirth'] ?>" required>
  </div>
</div>
    <div class="col-md-12 mb-3" >
      <label for="phone">Phone</label>
      <?php $unSerphone = unserialize($row['phone']);
        for($i = 0 ;$i<count($unSerphone);$i++){ ?>
       <input type="text" class="form-control" id="phone" name="Phone[<?php echo $i ?>]" placeholder="99XXXXXXXXX" value="<?php echo $unSerphone[$i]; ?>" required>
    <?php } ?>
      </div>
 
    <div class="col-md-12 mb-3" >
      <label for="gmail">G-mail</label>
      <?php $unSermail = unserialize($row['mail']);
        for($i = 0 ;$i<count($unSermail);$i++){ ?>
      <input type="gmail" class="form-control" id="gmail" name="Gmail[<?php echo $i ?>]" placeholder="xyz@gmail.com" value="<?php echo $unSermail[$i]; ?>" required>
   <?php } ?>
    </div>

 
   <div class="form-row"></div>
<div class="col-md-12 mb-3">
  <button class="btn btn-primary" type="submit" name="send">Update</button>
</div>

</div>
</form>


</div>
</center>
</body>

</html>
