


<?php 

session_start();
?>

<!DOCTYPE html>


<html>
<head>
	<title>Insert</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
      <script src='https://www.google.com/recaptcha/api.js'></script>
	  <script src="drop/dropzone.js"></script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  

         

          <link rel = "stylesheet" href = "drop/min/dropzone.min.css">
		  
		  <style>
		  

		  </style>
        
     
</head>
<body>

<select>
<option>1</option>
<option>2</option>
<option>3</option>
</select>
    
    <form action="parse.php" method="post" id="myDropzone" enctype="multipart/form-data">
        <div class="container">
            
            <h2>Sign UP</h2>
            
            <div class="row">
                <div class="col-md-4"><div class="txt"> Name:</div></div>
                <div class="col-md-8">
                    <div class="form-group">
    
                            <input type="text" class="form-control" name="name" id ="name" placeholder="Enter your Name"  value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
                             <span id ="firstname" class="text-danger" ></span>
				
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-4 col-xs-2 "><div class="txt">Email:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <input type="email" class="form-control" name="email" id ="email" placeholder="Enter your email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" >
                            <span id ="emailname" class="text-danger"></span>	
							 <p style="color:red;">
							 <?php
							 
							
							 
					
							 
							if(isset($_REQUEST['msg']) && $_REQUEST['msg'] != ""){
                            echo "<span class='add' >".$_REQUEST['msg']."</span>";
		}
		else{
			session_destroy();
		}
  ?>
 
								 
								
								

							</p>

				
                    </div>
                </div>
                
            </div>
            
           
            
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Password:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                            <input type="password" class="form-control" name="password" id ="password" placeholder="Enter your password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>">
			     <span id ="passwordname" class="text-danger"></span>
                    </div>
                </div>
                
            </div>
            
			
          
               
               
   		
                  
          
            
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Gender:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                        <input type="radio"   name="gender" class="gen" id="male" value="Male"
						<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Male") echo "checked";?>
						
						>Male <input type="radio"  class="gen" id="female" value="Female" name="gender"
						<?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="Female") echo "checked";?>
						>Female
                         
                    </div>
			<span id ="gendername" class="text-danger"></span>	
                </div>
                
            </div>
            
             
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Interested:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                        <input type="checkbox" name="checkbox[]"  class="gen" id="i1" value="Cricket"
						   <?php if(isset($_SESSION['checkbox'])) {if(in_array("Cricket",$_SESSION['checkbox'])) echo "checked='checked'";} ?>
						>Cricket
						<input type="checkbox" name="checkbox[]" id="i2" class="gen" value="Hockey"
						<?php if(isset($_SESSION['checkbox'])) {if(in_array("Hockey",$_SESSION['checkbox'])) echo "checked='checked'";} ?>
						>
						Hockey<input type="checkbox" name="checkbox[]" id="i3"  class="gen" value="football"
							 <?php if(isset($_POST['checkbox'])) {if(in_array("football",$_SESSION['checkbox'])) echo "checked='checked'";} ?>
						
						>Football
						
						
                    </div>
                    <span id ="checkname" class="text-danger"></span>
								
                </div>
                
            </div> 
            
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Country:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                        <select class="form-control" name="select" id="country"  >
	                     <option value="0">Select your Country</option>
                             <option value="India"<?php if($_SESSION) {if($_SESSION['select']=='India') echo 'selected="selected"';} ?> >India</option>
                             <option value="Australia"<?php if($_SESSION) {if($_SESSION['select']=='Australia') echo 'selected="selected"';} ?> >Australia</option>
                             <option value="South Africa"<?php if($_SESSION) {if($_SESSION['select']=='South Africa') echo 'selected="selected"';} ?>  >South africa</option>
                             <option value="England"<?php if($_SESSION) {if($_SESSION['select']=='England') echo 'selected="selected"';} ?> >England</option>
                            </select>
                        <span id ="countryname" class="text-danger"></span>
			
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">Address:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                        <input type="text" rows="4" cols="4" class="form-control" name="address" id="address" placeholder="enter your address"value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : '' ?>">
                        <span id ="addressname" class="text-danger"></span>
					
                    </div>
                </div>
                
            </div>
			
			<div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt">DOB:</div></div>
                <div class="col-md-8 col-xs-10">
                    <div i class="form-group">
    
                       <input type="text" id="datepicker" name = "date" >
					     <span id ="datename" class="text-danger>"></span>
					
                    </div>
                </div>
                
            </div>
	                    <div class="dropzone" id="my-dropzone" >
						 <div class="fallback">
    <input  type="file" name="file[]" multiple />
  </div>
						
						</div>
            
          <div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt"></div></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                        <br> <div class="g-recaptcha" data-sitekey="6Ldd9XMUAAAAAKqKSlJ7pbUKAzj4HXXazcaXA2L6"></div>
                             <span id ="capname" class="text-danger"></span>
					
                    </div>
                </div>
                
            </div>
			
			<div class="row">
                <div class="col-md-4 col-xs-2"><div class="txt"></div></div>
                <div class="col-md-8 col-xs-10">
                   <p>If you are register <a href = "login.php">Login </a>here </p>
                </div>
                
            </div>
                
            
    
           
			
			
            
            <div class="row">
                <div class="col-md-4 col-xs-2"></div>
                <div class="col-md-8 col-xs-10">
                    <div class="form-group">
    
                  <input style="margin-top:20px;" type="button" value="submit" name="button" id='mysubmit' class="btn btn-primary" >
				  
					<input type="submit" value="hidden submit" name="btn_submit" id='btn_submit' class="btn btn-primary" style="display:none">
                    </div>
                </div>
                
            </div>
            
        </div>
        </form>
		
		 
                     
    <script>
	var date = new Date();
	var cYear = date.getFullYear();
	var cMonth = date.getMonth();
		var cDate = date.getDate();
	 $( function() {
    $( "#datepicker" ).datepicker({
		maxDate:new Date(cYear,cMonth,cDate)
	});
  } );
  
  
	
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#my-dropzone", { 

    url: "parse.php", 

	autoProcessQueue: false,
	 parallelUploads: 20,
	 addRemoveLinks: true,

	init: function() {
    var submitButton = document.querySelector("#mysubmit")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
		
			         document.getElementById('firstname').innerHTML = "";
         
       var name = document.getElementById('name').value;
       var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var country = document.getElementById('country').value;
         //  var image = document.getElementById('image').value;
           var address = document.getElementById('address').value;
		   //var date = document.getElementById('datepicker').value;
		 var drop = document.getElementById('my-dropzone').value;
		 	var med2 = /^(?=.*?[a-z])(?=.*?[@])(?=.*?[.]).{4,}$/g;
			 var v = grecaptcha.getResponse();

			
		   

			 
			  document.getElementById('emailname').innerHTML = "";
			  document.getElementById('emailname').innerHTML = "";
          document.getElementById('passwordname').innerHTML = "";
        //  document.getElementById('imagename').innerHTML = "";
          document.getElementById('gendername').innerHTML = "";
         document.getElementById('checkname').innerHTML = "";
         document.getElementById('countryname').innerHTML = "";
	document.getElementById('addressname').innerHTML = "";
		  
		
		var error = false;
		if (name == "") {
                document.getElementById('firstname').innerHTML = "Please enter your name";
		    
         		
                 return false;
               error = true;				 
                 }
        if(name.length >= 1){
		document.getElementById('name').style.borderColor = "green";
	 }
	 if (email == "") {
                document.getElementById('emailname').innerHTML = "Please enter your email";
		document.getElementById('email').style.borderColor = "red";
		         document.getElementById('email').focus();
                 return false;
                 }
        if(email.length >= 1){
		document.getElementById('email').style.borderColor = "green";
	 }
	 if(!med2.test(email)){
				document.getElementById('emailname').innerHTML = "please enter valid email";
		
				return false;	
			}
	 if (password == "") {
                document.getElementById('passwordname').innerHTML = "Please enter your password";
		document.getElementById('password').style.borderColor = "red";
                 return false;
                 }
        if(password.length >= 1){
		document.getElementById('password').style.borderColor = "green";
	 }
	 
         
     // if (image == "") {
    //        document.getElementById('imagename').innerHTML = "Please browse your image";
	//	document.getElementById('image').style.borderColor = "red";
     //          return false;
    //          }
    //  if(image.length >= 1)
	//	document.getElementById('image').style.borderColor = "green";
//
         if(document.getElementById("male").checked == false && document.getElementById("female").checked == false) {
                document.getElementById('gendername').innerHTML = "Please select your gender";
			
				  
                return false;
				 
                 }
         if(document.getElementById("i1").checked == false && document.getElementById("i2").checked == false && document.getElementById("i3").checked == false ) {
                document.getElementById('checkname').innerHTML = "Please select your checkbox";
			
				 return false;
				 	
            
	 }
          if (country == 0) {
               document.getElementById('countryname').innerHTML = "Please select your country";
			   document.getElementById('country').style.borderColor = "red";
			   
                 return false;
                 }
				 if(country.length >= 1){
				 document.getElementById('country').style.borderColor = "green";
				 
				
	 }
        if (address == "") {
               document.getElementById('addressname').innerHTML = "Please select your country";
			   document.getElementById('address').style.borderColor = "red";
			   
                 return false;
                 }
				 if(address.length >= 1){
				 document.getElementById('address').style.borderColor = "green";
				 
				
	 }
	   
	 

	
		
		if(error == false){
			myDropzone.processQueue(); // Tell Dropzone to process all queued files.
			
			setTimeout(function(){ $('form#myDropzone').submit(); }, 1000);
			
			
			
		}
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function() {
      // Show submit button here and/or inform user to click it.
    });

  }
}); 

    function validate(){
         document.getElementById('firstname').innerHTML = "";
         
       var name = document.getElementById('name').value;
       var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var country = document.getElementById('country').value;
         //  var image = document.getElementById('image').value;
           var address = document.getElementById('address').value;
		 var drop = document.getElementById('my-dropzone').value;
	
		   

			 
			  document.getElementById('emailname').innerHTML = "";
          document.getElementById('passwordname').innerHTML = "";
        //  document.getElementById('imagename').innerHTML = "";
          document.getElementById('gendername').innerHTML = "";
         document.getElementById('checkname').innerHTML = "";
         document.getElementById('countryname').innerHTML = "";
	document.getElementById('addressname').innerHTML = "";
		  var v = grecaptcha.getResponse();
     	
       if (name == "") {
                document.getElementById('firstname').innerHTML = "Please enter your name";
		document.getElementById('name').style.borderColor = "red";	
                 document.getElementById('name').focus();		
                 return false;	 
                 }
        if(name.length >= 1){
		document.getElementById('name').style.borderColor = "green";
	 }
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
	 
         
     // if (image == "") {
    //        document.getElementById('imagename').innerHTML = "Please browse your image";
	//	document.getElementById('image').style.borderColor = "red";
     //          return false;
    //          }
    //  if(image.length >= 1)
	//	document.getElementById('image').style.borderColor = "green";
//
         if(document.getElementById("male").checked == false && document.getElementById("female").checked == false) {
                document.getElementById('gendername').innerHTML = "Please select your gender";
			
				  
                return false;
				 
                 }
         if(document.getElementById("i1").checked == false && document.getElementById("i2").checked == false && document.getElementById("i3").checked == false ) {
                document.getElementById('checkname').innerHTML = "Please select your checkbox";
			
				 return false;
				 	
            
	 }
          if (country == 0) {
               document.getElementById('countryname').innerHTML = "Please select your country";
			   document.getElementById('country').style.borderColor = "red";
			   
                 return false;
                 }
				 if(country.length >= 1){
				 document.getElementById('country').style.borderColor = "green";
				 
				
	 }
        if (address == "") {
               document.getElementById('addressname').innerHTML = "Please select your country";
			   document.getElementById('address').style.borderColor = "red";
			   
                 return false;
                 }
				 if(address.length >= 1){
				 document.getElementById('address').style.borderColor = "green";
				 
				
	 }
	 if (drop.length == 0) {
               document.getElementById('dropname').innerHTML = "Please select your image";
			   document.getElementById('address').style.borderColor = "red";
			   
                 return false;
                 }
				 if(address.length >= 1){
				 document.getElementById('address').style.borderColor = "green";
				 
				
	 }
	 if (v.length == 0) {
             document.getElementById('capname').innerHTML = "Please select your Captcha";
              return false;
             }
				
           
    
    }
    
    
    </script>
    
  
</body>
</html>






<?php 
if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {

	$secret = "6Lfn9XMUAAAAACh7LNdRSrg67YYBGyAJa9XvLryW";
	$ip = $_SERVER['REMOTE_ADDR'];
	$captcha = $_POST['g-recaptcha-response'];
	$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
	
	$arr = json_decode($rsp,TRUE);
	if($arr['success']){
	
	}
}



 ?>


