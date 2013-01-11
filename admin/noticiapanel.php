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
		background: gray;
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
			$sql = mysql_query("Select * FROM noti ORDER BY story_num ASC");

			while($row = mysql_fetch_array($sql)){
				echo "<tr><td id='id'>".$row[story_num]."</td><td id='title'>".$row[story_title]."</td><td><a href='editar-n.php?id=".$row[story_num]."'>Editar</a></td><td><a href='borrar-n.php?id=".$row[story_num]."'>Borrar</a></td></tr>";
			}
		?>
	</tbody>
</table>
</body>
</html>