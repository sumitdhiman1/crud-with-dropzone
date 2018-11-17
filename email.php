
  <html>
  
  
  
  <head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
  
  </head>
  
  <body>
  <div class = "container">
  
  <form action = "forgot.php" method = "post" onsubmit ="return validate()">
   <div class="row" style = "margin-top:40px;">
                <div class="col-md-3 col-xs-2 "><div class="txt">Enter your email here:</div></div>
                <div class="col-md-4 col-xs-10">
                    <div class="form-group">
    
                            <input type="email" class="form-control" name="email" id ="email" placeholder="Enter your email"   >
                            <span id ="emailname" class="text-danger" ></span>	
							 <p style="color:red;">
							 <?php
							 
							
							 
					
							 
							if(isset($_REQUEST['msg']) && $_REQUEST['msg'] != ""){
                            echo "<span class='add' >".$_REQUEST['msg']."</span>";
		}
		
  ?>
 
								 
								
								

							</p>
						

				
                    </div>
                </div>
                
            </div>
			
			<div class="row">
                <div class="col-md-3 col-xs-2"></div>
                <div class="col-md-4 col-xs-10">
                    <div class="form-group">
    
                  <input  type="submit" value="submit" name="submit" id='submit' class="btn btn-primary" >
				  
					
                    </div>
                </div>
                
            </div>
  
  
  </form>
  
  </div>
   <script>
 function validate(){
	  var email = document.getElementById('email').value;

	   
	    document.getElementById('emailname').innerHTML = "";

 
 if (email == "") {
                document.getElementById('emailname').innerHTML = "Please enter your email";
		document.getElementById('email').style.borderColor = "red";
                 return false;
                 }
        if(email.length >= 1){
		document.getElementById('email').style.borderColor = "green";
	 }
	 
	
 }
 </script>
  </body>
  
  </html>