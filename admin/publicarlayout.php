<? 
session_start(); 
if ($_SESSION["autentificado"] != "SI") { 
   	header("Location: index.php"); 
   	exit(); 
}	
?>
<?php
	include ('../include/config.php');
	if(isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar'){   
		if(!empty($_POST['Titulo']) && $_POST['Texto'] && $_POST['Imagen'] && $_POST['Demo'] && $_POST['Desc']){
			$titulo = $_POST['Titulo'];
			$img = $_POST['Imagen'];
			$texto = $_POST['Texto'];
			$demo = $_POST['Demo'];
			$desc = $_POST['Desc'];
			$sqlInsertNot = mysql_query("INSERT INTO layout (titulo, img, text, demo, linkdes) 
			VALUES ('$titulo', '$img', '$texto', '$demo', '$desc')") or die(mysql_error());     
		echo "Los datos fueron gurdados correctamente <a href='../design' target='_blank'>ir a la pagina</a>";   
		
		}else{     
			echo "Debe llenar todos los campos del formulario";   
		}
	} 
?>
<form name="layout" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">   
	<p>Título del layout<br /> 
		<input type="text" name="Titulo" size="50" />
	</p>   
	<p>Url imagen<br /> 
		<input type="text" name="Imagen" size="50" />
	</p> 
	<p>
		Descripcion del layout<br /> 
		<textarea name="Texto" rows="10" cols="50"></textarea>
	</p>    
	<p>
		url de la demo<br /> 
		<input type="text" name="Demo" size="50" />
	</p>   
	<p>
		url de la descarga<br /> 
		<input type="text" name="Desc" size="50" />
	</p>   
	<input type="submit" name="enviar" value="Enviar" />
</form>
