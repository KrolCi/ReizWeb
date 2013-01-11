<? 
session_start(); 
if ($_SESSION["autentificado"] != "SI") { 
   	header("Location: index.php"); 
   	exit(); 
}	
?>
<html>
<head>
<style>
	body{
		text-align: center;
	}
	tr{
		background: pink;
	}
	tr a{
		color: white;
		font-weight: bold;
	}
</style>
</head>
<body>
<table>
	<tbody>
		<?php
			include ('../include/config.php');
			$sql = mysql_query("Select * FROM layout ORDER BY id ASC");

			while($row = mysql_fetch_array($sql)){
				echo "<tr><td id='id'>".$row[id]."</td><td id='title'>".$row[titulo]."</td><td><a href='editar-d.php?id=".$row[id]."'>Editar</a></td><td><a href='borrar-d.php?id=".$row[id]."'>Borrar</a></td></tr>";
			}
		?>
	</tbody>
</table>
</body>
</html>