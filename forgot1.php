 <?php 
session_start();
 $con = mysqli_connect("localhost","root","","sumit");
 


 $id =   $_SESSION['id2'];
  
  if(isset($_POST['submit'])){
	  
	   echo   $_SESSION['id2'];
$password = $_POST['password'];
  
 
  
  echo $password;
  
 
	  
	
		  
		  $new = md5($password);
		  
		  $get = "update user set password = '$new' where id = '$id'";
		  
		  $run = mysqli_query($con,$get);
		  
		  if ($run){
			  echo "updated";
			  header("location:login.php");
		  }
		  
	
	  
  }
	
	



 ?>
 