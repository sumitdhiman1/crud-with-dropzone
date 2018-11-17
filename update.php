
<?php
session_start();

   $con = mysqli_connect("localhost","root","","sumit");

   $d = $_SESSION['dd'];
   
   $r = $_SESSION['hey'];
   
   $b =  count($r);
   
   echo $d;
   
   $c = $b + $d;
   
   echo $c;
	  
   $get1 = "select * from image ORDER BY id DESC LIMIT 0, $c";
	
   $run2 = mysqli_query($con,$get1);
	
        $j = 1;
		
        while ($row = mysqli_fetch_array($run2)) {
	
         	$id = $row['id'];
			
		    echo "<h1>".$id."</h1>";
				
		    $sum[] = $id+$j-1;
			
		    print_r($sum);
		 
		}
	
		
		$z = implode(",",$sum);
		
		echo $z."<br>";
		
		$_SESSION['p'] = $z;

$id =  $_SESSION['id'];

$io =0;

if (isset($_POST) && !empty($_POST)) {	
	
    $name = $_POST['name'];
  
    $email = $_POST['email'];
  
    $password = $_POST['password'];
	
	$_SESSION['vvv'] = $password;

    $pass = md5($password);
	
	$_SESSION['vv'] = $pass;

    $gender = $_POST['gender'];

    $checkbox = $_POST['checkbox'];

    $b = implode(",", $checkbox);
  
    $country = $_POST['select'];
 
    $address = $_POST['address'];
	
	
   

	
    $get = "select * from user where id = '$id' ";

   $run = mysqli_query($con,$get);
   
   $row = mysqli_fetch_array($run);
   
   $email1 = $row['email'];
   
   echo $email1."<br>";
   
    if(empty($password)){
		  $update_record = "update user set name='$name',email='$email', gender='$gender',Hobbies='$b', country='$country' ,address = '$address',image = '$z'  where id='$id'";

                            $run = mysqli_query($con,$update_record);
							
							header("location:view.php");
		 
	   
   }
  

   else if($email1 !== $email)
                {
                    $sql1="select * from user where email='$email'";  
					
                    $res1 = mysqli_query($con,$sql1);
					
                    $row1= mysqli_fetch_array($res1);
					
                    if($row1)   
                        {     
                            header("location:edit.php?msg='This email is already exist'");
                        }
						else{
					
	  	   
                            $update_record = "update user set name='$name',email='$email',password='$pass',gender='$gender',Hobbies='$b', country='$country' ,address = '$address',image = '$z'  where id='$id'";

                            $run = mysqli_query($con,$update_record);
							
							header("location:view.php");
							
						
							

							
					
							
   
							
						}
                } 
else{
	
	  	   
   $update_record = "update user set name='$name',email='$email',password='$pass',gender='$gender',Hobbies='$b', country='$country' ,address = '$address',image = '$z'  where id='$id'";

   $run = mysqli_query($con,$update_record);
   
   header("location:view.php");

   
   	
   

}
}


if( $io == 0 && !empty($_FILES )){
			 	
		$c = count($_FILES['file']['name']);
		
		$_SESSION['dd'] = $c;
		
	    for($i=0;$i<count($_FILES['file']['name']);$i++)
	   {	
		
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
