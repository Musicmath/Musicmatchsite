<html>
<!-- Gustav Sundstr�m te12 -->
<head>
	<title> Hejsan</title>
			
</head>
	<body>
	
	<?php
	# best�llnings info till ziggespizzeria
	echo " �r inne i PHP </br>";
	$con = mysql_connect ("localhost", "root", ""); # variabel f�r uppkoppling (nav;root;l�senord) (inget l�senod i detta fall).
	
	if(!$con){		# testar om koppling mot databasen finns,  annars st�ng ner.
		die ('kunde inte koppla upp mot databasen: ' .mysql_error() );
	}
	
	mysql_select_db ("ziggespizzeria", $con); # koppla upp och anv�nd databasen ziggespizzeria
	
	#Skapar en SQL-fr�ga och k�r den mot tabellen ziggespizzeria
	
	$sql=" INSERT INTO drickor(drickor) VALUES 
	('$_POST[drickor]')";
	
	if(!mysql_query($sql, $con)){
		die('Error:' .mysql_error () );
	}
	
	else{
		echo "Datat �r inlagt i databasen";
	}
	
	echo"<br>";
	echo"<br> Utskrift av databasens inneh�ll: </br>";
	$result = mysql_query("SELECT * FROM drickor"); #sparar resultatet i variabeln $result
	
	echo"<br>";
	#Skapar en tabell d�r resultatet ska skrvas ut
	echo" <table border = '1'>
		<tr>
			<th>Drickor </th>
			
		</tr>";				
	
	while($row = mysql_fetch_array ($result)) # resultatet sparas rad f�r rad $row
	{
		echo"<tr>";
		echo"<td>" .$row['drickor'] . "</td>";
		echo"</tr>";
	}
	echo"</table>";
	
	
	mysql_close($con);
	

	?>
	
	</body>
</html>