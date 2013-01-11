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
		$sql = mysql_query("SELECT * FROM layout WHERE id = $id") or die(mysql_error());
		$row = mysql_fetch_array($sql);

		$mensaje = "Actualizando layout numero: <b>$row[id]</b>";
	}
	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
		if(!empty($_POST['Titulo']) &&
			!empty($_POST['IMG']) &&
			!empty($_POST['Texto']) &&
			!empty($_POST['demo']) &&
			!empty($_POST['descar'])
		){

			$id = $_POST['ID'];
			$titulo = $_POST['Titulo'];
			$img = $_POST['IMG'];
			$text = $_POST['Texto'];
			$demo = $_POST['demo'];
			$desc = $_POST['descar'];

			$sqlUpdate = mysql_query("UPDATE layout SET titulo = '$titulo',
				img = '$img',
				text = '$text',
				demo = '$demo',
				linkdes = '$desc'
				WHERE id = '$id'");
			echo "Los datos fueron guardados correctamente <a href='../design' target='_blank'>ir a la pagina</a> volver al panel de <a href='panel.php?id=designpanel'>administracion</a>";
		}else{
			echo "debe llenar todos los campos";
		}
	}else{
		echo "<p>".$mensaje."</p>";
?>

<form name="noticia" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
Titulo: <br /><input type="text" name="Titulo" value="<?php echo $row['titulo']; ?>" /><br />
url img: <br /><input type="text" name="IMG" value="<?php echo $row['img']; ?>" /><br />
Texto: <br /><textarea name="Texto"><?php echo $row['text']; ?> </textarea><br />
url Demo: <br /><input type="text" name="demo" value="<?php echo $row['demo']; ?>" /><br />
url descarga: <br /><input type="text" name="descar" value="<?php echo $row['linkdes']; ?>" /><br />
<input type="hidden" name="ID" value="<?php echo $row['id']; ?>" />
<input type="submit" name="actualizar" value="Actualizar" />
</form>
<?php } ?>
</body>
</html>