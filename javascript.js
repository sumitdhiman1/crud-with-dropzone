
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#my-dropzone", { 
    url: "parse.php", 
	autoProcessQueue: false,
	init: function() {
    var submitButton = document.querySelector("#mysubmit")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
		var first = document.getElementById('first1').value;
		var last = document.getElementById('last1').value;
		var email = document.getElementById('email1').value;
		var password = document.getElementById('password1').value;
		var cpassword = document.getElementById('cpassword1').value;
		var state = document.getElementById('state1').value;
	    var city = document.getElementById('city1').value;
		
		document.getElementById("lastname").innerHTML=" ";
			  document.getElementById("emailname").innerHTML=" ";
			  document.getElementById("passwordname").innerHTML=" ";
			  
			  document.getElementById("cpassword1name").innerHTML=" ";
			  
			   document.getElementById("statename").innerHTML=" ";
			   
			    document.getElementById("cityname").innerHTML=" ";
				document.getElementById("gendername").innerHTML=" ";
				
				
				 
				  document.getElementById("checkname").innerHTML=" ";
				
		
		var error = false;
		if(first == ''){
			document.getElementById('firstname').innerHTML = "Please enter first name";
			document.getElementById('first1').style.borderColor = "red";
			return false;
			error = true;
		}
		if(first.length >= 1){
				      document.getElementById('first1').style.borderColor = "green";
					 
				
				 }
		if(last == ''){
			document.getElementById('lastname').innerHTML = "Please enter last name";
			return false;
			error = true;
		}
		if(last.length >= 1){
				      document.getElementById('last1').style.borderColor = "green";
					 
				
				 }
		if(email == ''){
			document.getElementById('emailname').innerHTML = "Please enter your email";
			return false;
			error = true;
		}
		if(email.length >= 1){
				      document.getElementById('email1').style.borderColor = "green";
					 
				
				 }
		if(password == ''){
			document.getElementById('passwordname').innerHTML = "Please enter last name";
			return false;
			error = true;
		}
		if(password.length >= 1){
				      document.getElementById('password1').style.borderColor = "green";
					 
				
				 }
	    if(cpassword == ''){
			document.getElementById('cpassword1name').innerHTML = "Please enter last name";
			return false;
			error = true;
		}
		if(cpassword.length >= 1){
				      document.getElementById('cpassword1').style.borderColor = "green";
					 
				
				 }
		if(state == ''){
			document.getElementById('statename').innerHTML = "Please select your state";
			return false;
			error = true;
		}
		if(state.length >= 1){
				      document.getElementById('state1').style.borderColor = "green";
					 
				
				 }
		if(city == ''){
			document.getElementById('cityname').innerHTML = "Please enter city name";
			return false;
			error = true;
		}
		if(city.length >= 1){
				      document.getElementById('first1').style.borderColor = "green";
					 
				
				 }
		 if(document.getElementById("male").checked == false && document.getElementById("female").checked == false) {
                document.getElementById('gendername').innerHTML = "Please select your gender";
			
				  
                 return false;
				 
                 }
				 if(document.getElementById("i1").checked == false && document.getElementById("i2").checked == false && document.getElementById("i3").checked == false ) {
                document.getElementById('checkname').innerHTML = "Please select your checkbox";
			
				 return false;
				 	
            
				 }
		if(error == false){
			myDropzone.processQueue(); // Tell Dropzone to process all queued files.
			//document.getElementById("myDropzone").submit();
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
          document.getElementById('emailname').innerHTML = "";
          document.getElementById('passwordname').innerHTML = "";
        //  document.getElementById('imagename').innerHTML = "";
          document.getElementById('gendername').innerHTML = "";
         document.getElementById('checkname').innerHTML = "";
         document.getElementById('countryname').innerHTML = "";
	document.getElementById('addressname').innerHTML = "";
       var name = document.getElementById('name').value;
       var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var country = document.getElementById('country').value;
         //  var image = document.getElementById('image').value;
           var address = document.getElementById('address').value;
		  //  var v = grecaptcha.getResponse();
       
       if (name == "") {
                document.getElementById('firstname').innerHTML = "Please enter your name";
		document.getElementById('name').style.borderColor = "red";		
                 return false;	 
                 }
        if(name.length >= 1){
		document.getElementById('name').style.borderColor = "green";
	 }
        if (email == "") {
                document.getElementById('emailname').innerHTML = "Please enter your email";
		document.getElementById('email').style.borderColor = "red";
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
	 //if (v.length == 0) {
      //        document.getElementById('capname').innerHTML = "Please select your Captcha";
       //        return false;
       //        }
				
           
    }
    
    
    
