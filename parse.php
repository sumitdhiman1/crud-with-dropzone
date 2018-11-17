
<?php

session_start();
	 
$con = mysqli_connect("localhost","root","","sumit");

   
				
		  
			  
  if (isset($_POST) && !empty($_POST)) {	
	
  $name = $_POST['name'];
  
  $_SESSION['name'] = $name;

  $email = $_POST['email'];
  
  $_SESSION['email'] = $email;

  $password = $_POST['password'];

  $_SESSION['password'] = $password;

  $pass = md5($password);

  $gender = $_POST['gender'];

  $_SESSION['gender'] = $gender;

  $checkbox = $_POST['checkbox'];

  $_SESSION['checkbox'] = $checkbox;

  $b = implode(",", $checkbox);
  
  $country = $_POST['select'];
  
  $_SESSION['select'] = $country;

  $address = $_POST['address'];

  $_SESSION['address'] = $address;
  
  $dateb = $_POST['date'];

  $date = date("m/d/Y H:i:s");

  $get = "select * from user where email = '$email'";

  $run = mysqli_query($con,$get);
	
  $check_user = mysqli_num_rows($run);
  
  $row = mysqli_fetch_array($run);
  
  $id = $row['id'];
  
  $_SESSION['id2']  = $id;

  $d = $_SESSION['dd'];
	 
  $get1 = "select * from image ORDER BY id DESC LIMIT 0, $d ";
	
  $run = mysqli_query($con,$get1);
	
	 $i = 0;
	 
     $j = 1;
	 
         while ($row = mysqli_fetch_array($run)) {
		   
         	$id = $row['id'];
			
		    echo "<h1>".$id."</h1>";
				
         	$i++;
			
		    $sum[] = $id;
			
		    print_r($sum);
         
		 }
		 
		$z = implode(",",$sum);
		
		echo $z."<br>";
		
         $_SESSION['first'] = $z;
		 
		    $get = "select * from user where email = '$email'";

            $run = mysqli_query($con,$get);

            $check_user = mysqli_num_rows($run); 
			
			$_SESSION['check_user'] = $check_user;
					
   if($check_user == 0){
	   
	   $_SESSION['a'] = 1;

      $insert = "insert into user(name,email,password,gender,Hobbies,country,address,dob,timestamp,image) values('$name','$email','$pass','$gender','$b','$country','$address','$dateb','$date','$z')";
	  
      $run = mysqli_query($con,$insert);
		
        if($run){
			
            echo "<script>alert('inserted')</script>";
			header("location:login.php");
			
         }			
							
	     }
	       else
	       {
			   
			  
			     $d = $_SESSION['dd'];
		    $get = "delete from image ORDER BY id DESC LIMIT 10";
		   
		    $run = mysqli_query($con,$get);
			
	
	         if($run){
				 
				 echo "deleted";
				 header("location:insert.php?msg=You are not allowed to add same email");	
	
	           }
	           else
			   {
			          echo "error";
			   }
			  }
		   
	       
	
}

  if(!empty($_FILES ) ){
			
		print_r($_FILES);
		 
		$c = count($_FILES['file']['name']);
		
		$_SESSION['dd'] = $c;	
	
	    for($i=0;$i<count($_FILES['file']['name']);$i++)
	    {
		
		print_r(count($_FILES['file']['name']));
		
	     $temp = $_FILES['file']['tmp_name'][$i];
	
	    $dir_seperator = DIRECTORY_SEPARATOR;
	
	    $folder = "uploads";
	
        $destination = dirname(__FILE__).$dir_seperator.$folder.$dir_seperator;
	
	    $target_path = $destination.time().$_FILES['file']['name'][$i];
	
	    $_SESSION['image'] = $target_path;
	
	    $image = explode(".",$_FILES['file']['name'][$i]);
		
        $nam = $image[0];
	
	    $ext = $image[1];

	    $_SESSION['image'] = $image;
		
	    $target_path1 =time().$i.".".$ext;
	
	    $target_path2 =$destination.time().$i.".".$ext;
	
	    move_uploaded_file($temp,$target_path2);
	
	    $insert1  = "insert into image(name) values ('$target_path1')";
	
       $run = mysqli_query($con,$insert1);

}


		}      
		
	

		
  ?>

