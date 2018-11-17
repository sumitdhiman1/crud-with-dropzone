<?php 
session_start();

//$g =	$_SESSION['multi'];

//for($i = 0;$i<count($g);$i++){

	$id = $_POST['name'];
	
	$arr[] = $id;
	
             $con = mysqli_connect("localhost","root","","sumit");
	
	          $delete_pro = "delete from image where id='$id'"; 
	
	          $run_delete = mysqli_query($con, $delete_pro); 
	
	         if($run_delete){
	
	           }
	           else
			   {
			          echo "error";
			   }



?>