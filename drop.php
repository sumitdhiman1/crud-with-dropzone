<html>
<head>
	<title>Insert</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
      <script src='https://www.google.com/recaptcha/api.js'></script>
	  <script src="drop/dropzone.js"></script>

         

          <link rel = "stylesheet"  href = "drop/min/dropzone.min.css">
        
     
</head>
<body>
    <form action = "" enctype="multipart/form-data" method = "post">
	
	<input type = "file" name = "file[]" multiple><br>
	
	<input type="submit" value = "save" name ="submit">
	
	
</form>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
	$con = mysqli_connect("localhost","root","","sumit");
		for($i=0;$i<count($_FILES['file']['name']);$i++){
	$temp = $_FILES['file']['tmp_name'][$i];
	
	$image = $_FILES['file']['name'][$i];
	
	







  move_uploaded_file($temp, "uploads/$image");
  
   $insert = "insert into up(name) values('$image')";
	  
	  
	  
	  
	  $run = mysqli_query($con,$insert);
		
        if($run){
			
          
	
       
			
         }			
}

}



?>