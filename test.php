<!DOCTYPE html>
<html>
<head>
<title>Sort a HTML Table Alphabetically</title>
<style>
table {
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th {
    cursor: pointer;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>
</head>
<body>

<p><strong>Click the headers to sort the table.</strong></p>
<p>The first time you click, the sorting direction is ascending (A to Z).</p>
<p>Click again, and the sorting direction will be descending (Z to A):</p>

<table id="myTable">
 
  
  <thead>
     <tr>
	  <th>
          <button type="button" id="selectAll" class="main btn btn-success">
          <span class="sub"></span> Select All </button></th>
         <th>Sr.No</th>
		<th>Name</th>
	   <th onclick="sortTable(0)">Email</th>
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
		
        $no_of_records_per_page = 2;
		
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect("localhost","root","","sumit");

        $total_pages_sql = "SELECT COUNT(*) FROM user";
		
        $result = mysqli_query($conn,$total_pages_sql);
		
        $total_rows = mysqli_fetch_array($result)[0];
		
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM user LIMIT $offset, $no_of_records_per_page";
		
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
	    <td><input type ="checkbox" ></td>
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



<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</body>
</html>
