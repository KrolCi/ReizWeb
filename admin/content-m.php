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

	$sql = mysql_query("SELECT * FROM config WHERE id = 1") or die(mysql_error());
	$row = mysql_fetch_array($sql);



	if(isset($_POST['actualizar']) && $_POST['actualizar'] == 'Actualizar'){
		if(!empty($_POST['ip']) &&
		!empty($_POST['port']) &&
		!empty($_POST['titulo']) &&
		!empty($_POST['descript']) &&
		!empty($_POST['about']) &&
		!empty($_POST['publicidad']) &&
		!empty($_POST['xat'])
		
		){

			$id = $_POST['ID'];
			$ip = $_POST['ip'];
			$port = $_POST['port'];
			$titulo = $_POST['titulo'];
			$descript = $_POST['descript'];
			$about = $_POST['about'];
			$publicidad = $_POST['publicidad'];
			$xat = $_POST['xat'];

			$sqlUpdate = mysql_query("UPDATE config SET ip = '$ip', port = '$port', titulo = '$titulo', descript = '$descript', about = '$about', publicidad = '$publicidad', xat = '$xat' WHERE id = '$id'");
			echo "Los datos fueron guardados correctamente <a href='../index.php' target='_blank'>ir a la pagina</a> volver al panel de <a href='panel.php?id=content-m'>administracion</a>";
		}else{
			echo "debe llenar todos los campos";
		}
	}else{
		echo "<p>".$mensaje."</p>";
?>

<form name="noticia" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
	ip: <br /><input type="text" name="ip" value="<?php echo $row['ip']; ?>" /><br />

	port: <br /><input type="text" name="port" value="<?php echo $row['port']; ?>" /><br />

	titulo de la pagina: <br /><input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" /><br />

	descripcion de la pagina:<br /><textarea name="descript"><?php echo $row['descript']; ?></textarea><br />

	Quien soy:<br /><textarea name="about"><?php echo $row['about']; ?></textarea><br />
	
	Publicidad:<br /><textarea name="publicidad"><?php echo $row['publicidad']; ?></textarea><br />
	
	xat:<br /><textarea name="xat"><?php echo $row['xat']; ?></textarea><br />

	<input type="hidden" name="ID" value="<?php echo $row['id']; ?>" />

	<input type="submit" name="actualizar" value="Actualizar" />

</form>
<?php } ?>
</body>
</html>