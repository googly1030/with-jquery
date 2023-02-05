<?php

if(empty($_POST['Email']) || empty($_POST['password'])){
  echo "<script>alert('fill all the fields')</script>";
  //delay for 2 seconds
  header("refresh:1;url=googly.html");
 
  exit();

}
//check if email matches with 
$Email=$_POST['Email'];
$Password=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);
//select email and password from the database
$select = mysqli_query($conn, "SELECT * FROM signup WHERE email = '".$_POST['Email']."' AND password = '".$_POST['password']."'");

if(mysqli_num_rows($select)) {
    header("Location:register.html");

}
else{
  echo "<script>alert('wrong email or password')</script>";
  header("refresh:1;url=googly.html");
  exit();
}

?>





