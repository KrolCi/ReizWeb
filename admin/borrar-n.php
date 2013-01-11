<?php
	include ('../include/config.php');
	if(isset($_POST['eliminar']) && $_POST['eliminar'] == 'Eliminar'){
		$story_num = $_POST['id'];
		$sqlEliminar = mysql_query("DELETE FROM noti WHERE story_num = $story_num") or die(mysql_error());
		$mensaje =  "Los datos fueron eliminados correctamente <a href='../index.php' target='_blank'>ir a la pagina</a> volver al panel de <a href='panel.php?id=noticiapanel'>administracion</a>";
	}
	elseif(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM noti WHERE story_num = $id") or die(mysql_error());
		$row = mysql_fetch_array($sql);
		$mensaje =  "¿Está seguro que quiere eliminar la noticia numero <b>$row[story_num]</b>?";
	}
	echo $mensaje;
?>
<form name="eliminar-registro" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
<input name="id" type="hidden" value="<?php echo $row['story_num']; ?>" />
<input name="eliminar" type="submit" value="Eliminar" />
</form>