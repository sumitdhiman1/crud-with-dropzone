<?php

 session_start();
 $con = mysqli_connect("localhost","root","","sumit");
 
 
 if(isset($_POST['submit'])){
	 
	 $email = $_POST['email'];
     
	  $get = "select * from user where email = '$email'";
 
      $run = mysqli_query($con,$get);
 
      $row = mysqli_fetch_array($run);
 
      $id = $row['id'];
	  
	  $email1 = $row['email'];
	  
	  if($email == $email1){
	  
	  $_SESSION['id2'] = $id;
	  
	    $b = Str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
	  
	   $c = substr($b,0,8);
	   
	  $_SESSION['oo'] = $c;
	  
	   $new = md5($c);
	   
	   
		  
		  $get = "update user set password = '$new' where id = '$id'";
		  
		  $run = mysqli_query($con,$get);
		  
		
		  
		  if ($run){
			 header("location:login.php?msg2=You password has been updated");
			
		  }
	 
	  
	
	 
	 
	  }
	  else{
		  header("location:email.php?msg=You have entered wrong email");
	  }
 }


	  

	  
	  
	  
	  
	  



  ?>
  
  

 <html>
 
 <head>
 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
 
 </head>
 
 <body>
  <div class="container">
 <form action ="forgot1.php" method = "post" onsubmit = "return validate()">

 <div class="row" style = "margin-top:40px;">
                <div class="col-md-3 col-xs-2 "><div class="txt" >Enter new password here:</div></div>
                <div class="col-md-4 col-xs-10">
                    <div class="form-group">
    
                            <input type="text" class="form-control" name="password" id ="password" placeholder="Enter your new password"   >
                            <span id ="passwordname" class="text-danger" ></span>	
						

				
                    </div>
                </div>
                
            </div>
			
			
			
			
			<div class="row">
                <div class="col-md-3 col-xs-2"></div>
                <div class="col-md-4 col-xs-10">
                    <div class="form-group">
    
                  <input  type="submit" value="Reset" name="submit" id='submit' class="btn btn-primary" >
				  
					
                    </div>
                </div>
                
            </div>
		
			
	</form>


	
	</div>
 

 
 <script>
 function validate(){
	  var password = document.getElementById('password').value;
	   var password1 = document.getElementById('password1').value;
	   
	    document.getElementById('passwordname').innerHTML = "";
		 document.getElementById('password1name').innerHTML = "";
 
 if (password == "") {
                document.getElementById('passwordname').innerHTML = "Please enter your password";
		document.getElementById('password').style.borderColor = "red";
                 return false;
                 }
        if(password.length >= 1){
		document.getElementById('password').style.borderColor = "green";
	 }
	 
	if (password1 == "") {
                document.getElementById('password1name').innerHTML = "Please enter your password";
		document.getElementById('password1').style.borderColor = "red";
                 return false;
                 }
        if(password1.length >= 1){
		document.getElementById('password1').style.borderColor = "green";
	 }
 }
 </script>
  </body>
 
 
 
 </html>
