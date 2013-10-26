<?php
$dbhost = 'localhost'; //host                                                          
$dbuser = 'root'; //your username created                                            
$dbpass = ''; //the password 4 that user                                               
$dbname = 'mysql';                                                                     
                                                                                       
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$query = "SELECT * FROM income ORDER BY Check_Number";
?>

<html>
<body>
	<table>
		<tr>
			<th>Check Number</th><th>Description</th><th>Amount</th><th>Date</th><th>Category</th><th>Misc Desc</th>
		</tr>
		<?php
		   print $query;
		   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));                                         
	       $rows = mysqli_num_rows($result);
           for ($i = 0; $i < $rows; $i++)
           {
	           $income = mysqli_fetch_array($result);
	           $check = "Check " . $income['Check_Number'];
	           $desc = "Desc " . $income['Purchase_Description'];
	           $amount = "Amount " . $income['Purchase_Amount'];
	           $date = "Date " . $income['Date'];
	           $cat = "Cat " . $income['Category'];
	           $misc_desc = "Misc Desc " . $income['Misc_Description'];
	           print "<tr><td>$check</td><td>$desc</td><td>$amount</td><td>$date</td><td>$cat</td><td>$misc_desc</td></tr>";
           }
	       ?>
	    </tr>
	</table>
</body>
</html>
                                                                                       