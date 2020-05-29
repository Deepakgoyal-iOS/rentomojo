<!DOCTYPE HTML>
<?php include 'config.php'; 
$rows = false;
if(isset($_POST['search'])){
$name = htmlspecialchars($_POST['search']);
$sql = "select * from contacts where Name like '%$name%' order by Name ";
$rows = $db->query($sql);
if(!$rows){
  $rows=false;
}
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
	
		<nav class="navbar navbar-light bg-light" style="width: 60%">
 <h3> Contacts </h3>
</nav>
</center>
<center>
<div class="container" style="height: 500px; width: 60%; background-color: rgb(236,240,241);  align-content: center;">

<form class="form-inline  mb-3" style="padding-top: 30px" >
    <input class="form-control mr-sm-2" style="width: 90%;" type="search" placeholder="Search" name="search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="<?php echo $name ?>">Search</button>
  </form>
<?php if($rows): ?>
<div id="accordion">
  <?php while ($row = $rows->fetch_assoc()): ?> 
  <div class="card">
    <div class="card-header" id=<?php echo $row['Name']; ?> style="border-width: 0px">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target=#<?php echo $row['phone']; ?> aria-expanded="false" aria-controls=<?php echo $row['phone']; ?>>
          <?php echo $row['Name'] ?>
        </button>
      </h5>
    </div>
    <div id=<?php echo $row['phone']; ?> class="collapse" aria-labelledby=<?php echo $row['phone']; ?> data-parent="#accordion">
           <div class="card-body bg-light">
      	<div class="container">
      		<div class="row mb-3">
      			<div class="col-6"> <?php echo $row['dateofbirth'] ?></div>
      		<div class="col-3">
      			<a href="updatecontact.php?Name=<?php echo $row['Name'];?>" class="btn btn-success pull-right" style="width: 100px;">Edit</a>
      		</div>
      		<div class="col-3">
      			<a href="deletecontact.php?Name=<?php echo $row['Name'];?>" class="btn btn-danger pull-right" style="width: 100px;">Remove</a>
      		</div>
      	</div>
       <table class="table" style="border: solid; border-color: rgb(0,0,0); border-width: 1px; border-top-width: 2px; background-color: rgb(255,255,255);">
  <tbody>
    <tr>
      <td> <?php echo $row['phone'] ?></td>
      <td> <?php echo $row['mail'] ?></td>
    </tr>
  
  </tbody>
</table>
</div>
  </div>
    </div>
  </div>
<?php endwhile; ?>

</div>
<?php else: ?>
    <h2 class="text-danger text-center">Nothing found</h2>
<?php endif; ?>
<a href="index.php" class="btn btn-warning" style="width: 120px; float: left; position: relative; top: 15%;" >Home</a>
<a href="addcontacts.php" class="btn btn-info" style="width: 120px; float: right; position: relative; top: 15%;" >Add contact</a>



</div>
</center>

			
</body>
</html>