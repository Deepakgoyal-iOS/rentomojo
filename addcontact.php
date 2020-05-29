<!DOCTYPE HTML>
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
   
   <form style="position: absolute; padding-left: 150px; padding-top: 70px;" name="add_contact" id="add_contact" method="post" action="insert.php">
<div class="form-row">
    <div class="col-md-12 mb-1"  style="text-align: left;">
      <label for="name">Your Name</label>
      <input type="text" class="form-control" id="name" name="Name" placeholder="Name" required>
    </div>
    
  
    <div class="col-md-12 mb-3"  style="text-align: left;">
      <label for="dob">DOB</label>
      <input type="Date" class="form-control" id="dob" name="DateOfBirth" placeholder="DD/MM/YYYY"  required>
  </div>
</div>
    <div class="col-md-12 mb-3" >
      <label for="phone">Phone</label>
    
        <table id="dynamic_table">
          <tr>
            <td>
       <input type="text" class="form-control" id="phone" name="Phone[]" placeholder="99XXXXXXXXX" required></td>
       <td><button name="add" id="add" class="btn btn-primary">+</button>
     </td>
   </tr>
        </table>


      </div>
 
    <div class="col-md-12 mb-3" >
      <label for="gmail">G-mail</label>
         <table id="dynamic_table2">
          <tr>
            <td>
       <input type="gmail" class="form-control" id="gmail" name="gmail[]" placeholder="xyz@gmail.com" required></td>
       <td><button name="addmail" id="addmail" class="btn btn-primary">+</button>
     </td>
   </tr>
        </table>
   
    </div>

 
   <div class="form-row"></div>
<div class="col-md-12 mb-3">
  <button class="btn btn-primary" type="submit" name="send" id="send">Save</button>
</div>

</div>
</form>


</div>
</center>
</body>

</html>
<script>
$(document).ready(function(){
var i = 1;
var j = 1;
$('#add').click(function(){
  i++;

  $('#dynamic_table').append('<tr id="row'+i+'"><td><input type="text" class="form-control" id="phone" name="Phone[]" placeholder="99XXXXXXXXX" required></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

});
$(document).on('click','.btn_remove',function(){
  var button_id = $(this).attr("id");
  $("#row"+button_id+'').remove();
});

$('#addmail').click(function(){
  j++;
  $('#dynamic_table2').append('<tr id="rowm'+j+'"><td><input type="gmail" class="form-control" id="gmail" name="gmail[]" placeholder="xyz@gmail.com" required></td><td><button name="remove" id="'+j+'" class="btn btn-danger btn_removem">X</button></td></tr>');

});
$(document).on('click','.btn_removem',function(){
  var button_id = $(this).attr("id");
  $("#rowm"+button_id+'').remove();
});
$('#send').click(function(){

  $.ajax({
    url:"insert.php",
    method:"POST",
    data: $('#add_contact').serialize(),
    success:function(data){
      alert(data);
      $('#add_name')[0].reset()
    }
  })

});


});

</script>