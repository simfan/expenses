<?php
	$fh = fopen('expenses.txt', 'rb');
	$i = 0;
	for($line = fgets($fh); ! feof($fh); $line = fgets($fh))
	{
		$cat[$i] = $line;
		$i++;
	}
	$cat_count = $i;
	fclose($fh);
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "expnese.css" />
		<script type = "text/javascript" src = "expense.js"></script>
	</head>
	<body>
		<h3>Index</h3>
		<form name = "income" method = "post" action = "process.php">
		<div>
			<span>Check #:</span><input type = "text" name = "check" id = "check" />
			<span>Purchase Description</span><input type = "text" name = "desc" id = "desc" />
			<span>Date:</span><input type = "date" name = "expenseDate" id = "expenseDate" />
			<span>Amount:</span><input type = "text" name = "checkAmount" id = "checkAmount" />
			<span>Category:</span><!--input type = "text" name = "category" id = "category" />--><select name = "category" id = "category"><?php for($i = 0; $i < $cat_count; $i++)
								{
									print "<option value = $cat[$i]>$cat[$i]</option>";
								}?></select>
			<span>Misc. Description</span><input type = "text" name = "miscDesc" id = "miscDesc" />
		</div>
		<input type = "submit" name = "submit" id = "submit" value = "Submit" />
		</form>
	</body>
</html>	