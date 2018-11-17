<!DOCTYPE html>
	
	<?php
	session_start();
	
      $con = mysqli_connect("localhost","root","","sumit");
	 
	  
      if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	

$password = $_POST['password'];






$password1 = md5($password);

$_SESSION['v'] = $password1;
echo $password1;
	$get = "select * from user where email = '$email' AND password = '$password1'";
	
	$run = mysqli_query($con,$get);
	
	 $check_user = mysqli_num_rows($run); 
	 
	
	 $row = mysqli_fetch_array($run);
	 
	 $id = $row['id'];
	 
	 echo $_SESSION['id'] = $id;
	 
	 if ($check_user ==1) {
		 
	 	
	 	echo  $_SESSION['user_email']=$email; 
		
		echo $_SESSION['user_password']=$password; 
		
		
	
	 
	 	header("location:view.php");
	 }
	 	else{
	 		//header("location:login.php?msg=Your email and password did not match");
          $msg = "Your email and password did not match";
	 	}
	 }
	
	
 ?>	 

<html>
<head>
	<title>Insert</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
      <script src='https://www.google.com/recaptcha/api.js'></script>
	  <script src="drop/dropzone.js"></script>

         

          <link rel = "stylesheet" href = "drop/min/dropzone.min.css">
        
     
</head>
<body>
    
    <form action="" method="post" onsubmit = "return validate()">
        <div class="container">
            
            <h2>Login Here</h2>
            
           
            <br><div class="row">
                <div class="col-md-4 col-xs-2 "><div class="txt">Email:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <input type="email" class="form-control" name="email" id ="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"  >
                            <span id ="emailname" class="text-danger" ></span>	
						

				
                    </div>
                </div>
                
            </div>
            
           
            
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Password:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <input type="password" class="form-control" name="password" id ="password" placeholder="Enter your password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"  >
			     <span id ="passwordname" class="text-danger"></span>
                    </div>
					<p style = "color:red;"><?php
					if(isset($msg)){
						echo $msg;
					}
				//  if(isset($_REQUEST['msg1']) && $_REQUEST['msg1'] != ""){
				//	echo "<span style='color:green;'>".$_REQUEST['msg1']."</span>";
				//  }
  ?></p>
  				<p style = "color:green;"><?php
					//if(isset($msg1)){
					//	echo $msg1;
					
					if(isset($_REQUEST['msg2']) && $_REQUEST['msg2'] != ""){
				     echo "<span style='color:green;'>".$_REQUEST['msg2']."</span>"."<br>";
				    }
					
				 if(isset($_SESSION['oo'])){
					 echo "your new password is"." ".$_SESSION['oo'];
				 }
  ?></p>
	
                </div>
                
            </div>
			
			
			
			<div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt"></div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <a href = "email.php"><p>Forgot Password?</p></a>
			     <span id ="passwordname" class="text-danger"></span>
                    </div>
                </div>
                
            </div>
            
			
			
			<div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt"></div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <input type = "submit" name="submit" value= "Login" class="btn btn-primary" >
			     <span id ="passwordname" class="text-danger"></span>
                    </div>
                </div>
                
            </div>
            
			<div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt"></div></div>
                <div class="col-md-8 col-xs-10">
                   <p>If you are not register <a href = "insert.php">Sign up </a>here </p>
                </div>
                
            </div>
          
               
               
   		
                  
          
          
            
        </div>
        </form>
		
		<?php  echo $_SESSION['oo'];?>
		
		<script>
		
		function validate(){
			
		
			 var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
		
		 document.getElementById('emailname').innerHTML = "";
          document.getElementById('passwordname').innerHTML = "";
		  
		  if (email == "") {
                document.getElementById('emailname').innerHTML = "Please enter your email";
		document.getElementById('email').style.borderColor = "red";
		         document.getElementById('email').focus();
                 return false;
                 }
        if(email.length >= 1){
		document.getElementById('email').style.borderColor = "green";
	 }
		
		
		if (password == "") {
                document.getElementById('passwordname').innerHTML = "Please enter your password";
		document.getElementById('password').style.borderColor = "red";
                 return false;
                 }
        if(password.length >= 1){
		document.getElementById('password').style.borderColor = "green";
	 }
		}	
		</script>
	
                     


