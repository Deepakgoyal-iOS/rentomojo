<!DOCTYPE HTML>
<?php include 'config.php'; 

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perpage = (isset($_GET['per-page']) && ($_GET['per-page'] <= 50) ? $_GET['per-page'] : 4);
$start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

$sql = "select * from contacts  order by Name limit ".$start.", ".$perpage." ";
$total = $db->query("select * from contacts")->num_rows;
$pages = ceil($total/$perpage);
echo $pages;
$rows = $db->query($sql);


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
<div class="container" style="min-height: 500px; width: 60%; background-color: rgb(236,240,241);  align-content: center; margin-bottom: 100px">

<form class="form-inline  mb-3" style="padding-top: 30px" method="post" action="search.php" >
    <input class="form-control mr-sm-2" style="width: 90%;" type="search" placeholder="Search" name="search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
<div id="accordion">
  <?php while ($row = $rows->fetch_assoc()): ?> 
  <div class="card">
    <div class="card-header" id=<?php echo $row['Name']; ?> style="border-width: 0px">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target=#<?php echo $row['Id']; ?> aria-expanded="false" aria-controls=<?php echo $row['Id']; ?>>
          <?php echo $row['Name'] ?>
        </button>
      </h5>
    </div>
    <div id=<?php echo $row['Id']; ?> class="collapse" aria-labelledby=<?php echo $row['phone']; ?> data-parent="#accordion">
           <div class="card-body bg-light">
      	<div class="container">
      		<div class="row mb-3">
      			<div class="col-6"> <?php echo $row['dateofbirth'] ?></div>
      		<div class="col-3">
      			<a href="updatecontact.php?Id=<?php echo $row['Id'];?>" class="btn btn-success pull-right" style="width: 100px;">Edit</a>
      		</div>
      		<div class="col-3">
      			<a href="deletecontact.php?Name=<?php echo $row['Name'];?>" class="btn btn-danger pull-right" style="width: 100px;">Remove</a>
      		</div>
      	</div>
      	<div class="row" style="border-width: 1px; border-color: rgb(255,255,255);">
      	<div class="col-md-6">
       <table class="table" style="border: solid; border-color: rgb(255,255,255); border-width: 1px; background-color: rgb(255,255,255);">
  <tbody>
  
      	<?php $unSerphone = unserialize($row['phone']);
      	for($i = 0 ;$i<count($unSerphone);$i++){ ?>
      	<tr>
      	<td><?php echo $unSerphone[$i]; ?></td>
      </tr>
     <?php } ?>
 </tbody>
</table>
 </div>
 <div class="col-md-6">
 	    <table class="table" style="border: solid; border-color: rgb(255,255,255); border-width: 1px;  background-color: rgb(255,255,255);">
  <tbody>
     	<?php $unSermail = unserialize($row['mail']);
      	for($i = 0 ;$i<count($unSermail);$i++){ ?>
      	<tr>
      <td> <?php echo $unSermail[$i]; ?></td>
  </tr>
  <?php } ?>
  
  </tbody>
</table>

</div>
</div>

</div>
  </div>
    </div>
  </div>
<?php endwhile; ?>

</div>
<a href="addcontact.php" class="btn btn-info" style="width: 120px; float: right; position: relative; top: 15%; margin-top: 100px;">Add contact</a>

<nav aria-label="Page navigation example" style="position: relative; margin-top: 70px; left: 5%">
  <ul class="pagination justify-content-center">
  			<?php for($i = 1 ;$i<=$pages ; $i++): ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>&per-page=<?php echo $perpage ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>

  </ul>
</nav>

</div>
</center>

			
</body>
</html>