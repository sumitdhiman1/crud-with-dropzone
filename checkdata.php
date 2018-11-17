<?php
$con = mysqli_connect("localhost","root","","sumit");

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata="SELECT * FROM user WHERE email='$name'";

 $query=mysqli_query($con,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "This email is Already Exist";
 }
 else
 {
  echo "Available";
 }
 exit();
}
?>