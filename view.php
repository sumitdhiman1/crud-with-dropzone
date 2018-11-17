

<?php
 
session_start();

$con = mysqli_connect("localhost","root","","sumit");

 $password = $_SESSION['user_password'];

 $id =  $_SESSION['id'];

 $img = $_SESSION['p'];
 

 
 $_SESSION['vvv']."<br>";
 



if($id){
$get = "select * from user where id = '$id'";

	$run = mysqli_query($con ,$get);
	$i = 0;
	$row=mysqli_fetch_array($run);
		$id = $row['id'];
         	 $name = $row['name'];
         	 $email = $row['email'];
         	//$password = $row['Password'];
			$_SESSION['pass'] = $password;
         	$image = $row['image'];
			
			
			$g = explode(",",$image);
			$g = array_filter($g);
	
         	$gender = $row['gender'];
         	$hobbies = $row['Hobbies'];
         	$country = $row['country'];
            $address = $row['address'];
			$dob  = $row['dob'];
			$timestamp = $row['timestamp'];
			
			
			
			
}
else
{
	header("location:login.php");
}
		  
		

  ?>

<html>

<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/lightbox.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<style>
		th{
			margin:0 20px;
		}
		</style>

</head>

<body>
<table class = "table" style = "margin:30px 0 0 0;">
   <thead>
     <tr>
        <th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Gender</th>
		<th>Hobbies</th>
		<th>Country</th>
		<th>Address</th>
		<th>Dob</th>
		<th>timestamp</th>
		<th>image Id</th>
	</tr>
   </thead>

   <tbody>
     <tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $name; ?></td>
		<td><?php echo $email; ?></td>
		<td><?php echo $password; ?></td>
		<td><?php echo $gender; ?></td>
		<td><?php echo $hobbies; ?></td>
		<td><?php echo $country; ?></td>
		<td><?php echo $address; ?></td>
		<td><?php echo $dob; ?></td>
		<td><?php echo $timestamp; ?></td>
		<td><?php echo $image; ?></td>
     </tr>
   </tbody>

</table>

<table class = "table" style  ="margin :500px 0 0 0;">

  <thead>
  <tr>
   <th>Id</th>
   <th>Name</th>
   </tr>
  </thead>
  
   <?php 

   $get = "select * from image";
			
			$run = mysqli_query($con ,$get);
	 
	        while($row=mysqli_fetch_array($run)){
			
			$id = $row['id'];
	
         	$name1 = $row['name'];
   
   ?>
   <tbody>
     <tr>
	 <td><?php echo $id; ?></td>
	 <td><?php echo $name1; ?></td>
   </tr>
   </tbody>
  
<?php  }?>
</table>
<?php		       
			for($i = 0;$i<count($g);$i++){
					
			
				
			$get = "select * from image where id ='$g[$i]'";
			
			$run = mysqli_query($con ,$get);
	 
	        $row=mysqli_fetch_array($run);
	
         	$name1 = $row['name'];
			 
			 $_SESSION['multiple'] = $name1;
	
			
			
 ?>

<a href="uploads/<?php echo $name1;?>" data-lightbox="roadtrip"> <img height="200" width="200" src="uploads/<?php echo $name1;?>"> </a>


<?php }?>
<script src="dist/js/lightbox.js"></script>
</body>
	   <a href="edit.php" > <input type = "submit" name="submit" value= "Edit" class="btn btn-primary" ></a>
</html>

