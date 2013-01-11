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
	form{
		width: 500px;
		display: inline-block;
	}
</style>
</head>
<body>

<?php
	include ('../include/config.php');


	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM noti WHERE story_num = $id") or die(mysql_error());
		$row = mysql_fetch_array($sql);

		$mensaje = "Actualizando noticia numero: <b>$row[story_num]</b>";
	}
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
		if(!empty($_POST['Titulo']) && !empty($_POST['Texto']) && !empty($_POST['Autor'])){

			$story_num = $_POST['ID'];
			$story_title = $_POST['Titulo'];
			$story_text = $_POST['Texto'];
			$story_read_more = $_POST['Autor'];

			$sqlUpdate = mysql_query("UPDATE noti SET story_title = '$story_title', story_text = '$story_text', story_read_more = '$story_read_more' WHERE story_num = '$story_num'");
			echo "Los datos fueron guardados correctamente <a href='../index.php' target='_blank'>ir a la pagina</a> volver al panel de <a href='panel.php?id=noticiapanel'>administracion</a>";
		}else{
			echo "debe llenar todos los campos";
		}
	}else{
		echo "<p>".$mensaje."</p>";
?>

<form name="noticia" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
Titulo: <br /><input type="text" name="Titulo" value="<?php echo $row['story_title']; ?>" /><br />
Texto: <br /><textarea name="Texto"><?php echo $row['story_text']; ?> </textarea><br />
Autor: <br /><input type="text" name="Autor" value="<?php echo $row['story_read_more']; ?>" /><br />
<input type="hidden" name="ID" value="<?php echo $row['story_num']; ?>" />
<input type="submit" name="actualizar" value="Actualizar" />
</form>
<?php } ?>
</body>
</html>