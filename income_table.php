<?php
$dbhost = 'localhost'; //host                                                          
$dbuser = 'root'; //your username created                                            
$dbpass = ''; //the password 4 that user                                               
$dbname = 'mysql';                                                                     
                                                                                       
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$query = "SELECT * FROM income ORDER BY Check_Number";
$fh = fopen('expenses.txt', 'rb');
$i = 0;
for($line = fgets($fh); ! feof($fh); $line = fgets($fh))
{
	$cat[$i] = trim($line);
	$i++;
}
$cat_count = $i;
	fclose($fh);
?>

<html>
<body>
	<table>
		<tr>
			<th>Check Number</th><th>Description</th><th>Date</th>
		<?php for($i = 0; $i < $cat_count; $i++)
				{
					print "<th>" . ucwords($cat[$i]) . "</th>";
				}
		?>
			<!--<th>Category</th>--><th>Misc Desc</th>
		</tr>
		<?php
		   //print $query;
		   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));                                         
	       $rows = mysqli_num_rows($result);
           for ($i = 0; $i < $rows; $i++)
           {
	           $income = mysqli_fetch_array($result);
	           $check = $income['Check_Number'];
	           $desc = $income['Purchase_Description'];
	           $amount = $income['Purchase_Amount'];
	           $date = $income['Date'];
	           list($year, $month, $day) = explode("-", $date);
	           $date = $month . "-" . $day . "-" . $year;
	           $category = $income['Category'];
	           $misc_desc = $income['Misc_Description'];
	           print "<tr><td>$check</td><td>$desc</td><td>$date</td>";
	           for($j = 0; $j < $cat_count; $j++)
	           {
		           if($category == $cat[$j])
		           {
			       		print "<td>$amount</td>";
		           }
		           else
		           {
			       		print "<td>&nbsp</td>";
		       	   }
	       	   }	
			   print "<td>$misc_desc</td></tr>";
		       
           }
	       ?>
	    </tr>
	</table>
</body>
</html>
                                                                                       