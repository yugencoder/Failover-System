<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Records</title>
</head>
<body>

<?php
	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM contacts_table") 
		or die(mysql_error());  
		
	// display data in table
	echo "<br>";	
	echo "<h3><b>Server 1</b></h3>"; 
	echo "<h3><b>Database Contents</b></h3>"; 
	echo "<br>";
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr><th><b>ID</b></th></th><th>Name</b></th><th><b>Email</b></th><th><b>Type</b></th><th><b></b></th><th><b></b></th></tr>";
	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['ContactID'] . '</td>';
		echo '<td>' . $row['ContactName'] . '</td>';
		echo '<td>' . $row['ContactEmail'] . '</td>';
		echo '<td>' . $row['ContactType'] . '</td>';
		echo '<td><a href="edit.php?id=' . $row['ContactID'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?id=' . $row['ContactID'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	echo "</table>";
?>
<p><a href="new.php">Add a new record</a></p>

</body>
</html>	
