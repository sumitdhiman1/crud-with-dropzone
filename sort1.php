<?php
 function sortorder($fieldname){
        $sorturl = "database.php"."?order_by=".$fieldname."&sort=";
        $sorttype = "unsort";
        if(isset($_GET['order_by']) && $_GET['order_by'] == $fieldname){
            if(isset($_GET['sort']) && $_GET['sort'] == "unsort"){
                $sorttype = "unsort";
            }
        }
        $sorturl .= $sorttype;
        return $sorturl;
    }
	
	



   ?>



<html>
<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="dist/css/lightbox.css">
</head>
<body>
<table class = "table" style = "margin:30px 0 0 0;" id="example" class="myclass">
   <thead>
     <tr>
	  <th>
          <button type="button" id="selectAll" class="main btn btn-success">
          <span class="sub"></span> Select All </button></th>
         <th>Sr.No</th>
		<th>Name</th>
		 <th ><a href="<?php echo sortorder('email'); ?>" class="sort">Email</a></th>
		<th>Gender</th>
		<th>Hobbies</th>
		<th>Country</th>
		<th>Address</th>
		<th>Dob</th>
		<th>Date and Time</th>
		<th>image </th>
	</tr>
   </thead>
   
    <?php
	
	
    

        if (isset($_GET['pageno'])) {
			
            $pageno = $_GET['pageno'];
			
        } 
		else {
            $pageno = 1;
        }
		
        $no_of_records_per_page = 3;
		
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect("localhost","root","","sumit");

        $total_pages_sql = "SELECT COUNT(*) FROM user";
		
        $result = mysqli_query($conn,$total_pages_sql);
		
        $total_rows = mysqli_fetch_array($result)[0];
		
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $order = "";
		
		 if(isset($_GET['order_by']) && isset($_GET['sort'])){
			 
			 $order = "ORDER BY `user`.`email` ASC";
           
        }
		if(isset($_GET['order_by']) && isset($_GET['sort']) && isset($_GET['pageno == "2"'])){
			 
			 $order = "ORDER BY `user`.`email` ASC";
           
        }
		
		  $sql = "SELECT * FROM `user` ORDER BY `user`.`email` ASC limit $offset, $no_of_records_per_page";
		
        $res_data = mysqli_query($conn,$sql);
		
		$i = 0;
        while($row = mysqli_fetch_array($res_data)){
					
			$id = $row['id'];
    
         	 $name = $row['name'];
		
         	 $email = $row['email'];
			 
         	$password = $row['password'];
			
			$_SESSION['pass'] = $password;
			
         	$image = $row['image'];
			
         	$gender  = $row['gender'];
			
         	$hobbies = $row['Hobbies'];
			
         	$country = $row['country'];
			
            $address = $row['address'];
			
			$dob     = $row['dob'];
			
			$timestamp = $row['timestamp'];
			
			$get1 = "select * from image where id = '$image'";
			
			$run1 = mysqli_query($conn ,$get1);
			
			$row1=mysqli_fetch_array($run1);
			
			$name1 = $row1['name'];
			
			
			
			$i++;
        
       
    ?>
	<tbody>
     <tr>
	     <td><input type ="checkbox"></td>
		<td><?php echo $id; ?></td>
		<td><?php echo ucfirst($name); ?></td>
		<td><?php echo $email; ?></td>
	
		<td><?php echo $gender; ?></td>
		<td><?php echo $hobbies; ?></td>
		<td><?php echo $country; ?></td>
		<td><?php echo $address; ?></td>
		<td><?php echo $dob; ?></td>
		<td><?php echo $timestamp; ?></td>
		<td><a href="uploads/<?php echo $name1;?>" data-lightbox="roadtrip"> <img height = "60" width = "80" src = "uploads/<?php echo $name1; ?>"></a></td>
     </tr>
   </tbody>
<?php } ?>
<script src="dist/js/lightbox.js"></script>
</table>








<?php 		 
           
			  
		
							

		    for($j=1;$j<=$total_pages;$j++){
						
			    $a[] = $j;
				
			    }
?>
				 <form action = '' method='get'>
				 
				<select id = 'sort-item' name = 'select' value= 'select any one' onchange='location = this.value;'>
				
				
			
				 

				
				<?php
				 foreach($a as $item){
					 
               ?>
       
                 <option  value='?pageno= <?php echo $item; ?>&order_by=email&sort=asc' 
				 
				            
							 ><?php echo  $item;?>
				</option>
				 
			
			<?php } 
			
			

			
			
			?>
				 
				  </select>
				  
			
				 
				  </form>

    
</body>
</html>
<script>
 		$(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#example').prop('checked', false);
    } else {
        $('input[type="checkbox"]', '#example').prop('checked', true);
    }
    $(this).toggleClass('allChecked');
  })
});
  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#sort-item').val(selItem);
    }
    $('#sort-item').change(function() { 
        var selVal = $(this).val();
        sessionStorage.setItem("SelItem", selVal);
    });
 
 </script>