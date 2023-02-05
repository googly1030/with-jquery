<?php
//edit the last data in the database from the form
//define the variables
$Username = $_POST['Username'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "register";
// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//post the data to the form from the database
$sql = "UPDATE register SET Username='$Username', age='$age', dob='$dob', contact='$contact' ";
if ($conn->query($sql) === TRUE) {
  //alert("you have updated successfully");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
//on successful update alert the user
echo "<script>alert('you have updated your profile successfully')</script>";
echo "your profile has been updated";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="align.css" />
  </head>
  <body>
    <form action="http://localhost/myphp/profile.php" method="post">
    <div>
      <head><h1>PROFILE </h1></head>
    </div>
    <div >
      <label for="Username">Username</label>  <input type="text" name="Username" id="" placeholder="ENTER YOUR NAME" value = <?php echo "$Username"?> />
    </div>
    <div>
      <label for="age">age</label> <input type="text" name="age" id="" placeholder="ENTER YOUR AGE" value = <?php echo "$age"?> />
    </div>
    <div>
      <label for="dob">dob</label> <input type="text" name="dob" id="" placeholder="ENTER YOUR DOB"  value = <?php echo "$dob"?> />
    </div>
    <div>
      <label for="contact">contact</label>
      <input type="text" name="contact" id="" placeholder="ENTER YOUR contact" value = <?php echo "$contact"?> />
    </div>
   
    <div class="small">
      <input type="submit" 
      value="edit"
              name="edit"
              id="" >
            </form>
  </div class="top">
  </body>
  <script src="/lib/jquery.js"></script>
  <script src="/dist/jquery.validate.js"></script>
  <script>
    $(document).ready(function(){
      $("form").validate({
        rules:{
          Username:{
            required:true,
            minlength:3
          },
          age:{
            required:true,
            minlength:1
          },
          dob:{
            required:true,
            minlength:2
          },
          contact:{
            required:true,
            minlength:10
          }
        },
        messages:{
          Username:
          {
            required:"please enter your name",
            minlength:"name should be atleast 3 characters"
          },
          age:
          {
            required:"please enter your age",
            minlength:"age should be atleast 2 characters"
          },
          dob:
          {
            required:"please enter your dob",
            minlength:"dob should be atleast 2 characters"
          },
          contact:
          {
            required:"please enter your contact",
            minlength:"contact should be atleast 10 characters"
          }
        }
      });
});
  </script>
  
</html>
