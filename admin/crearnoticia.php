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
		if(!empty($_POST['Titulo']) && $_POST['Texto'] && $_POST['Autor']){
			$titulo = $_POST['Titulo'];     
			$texto = $_POST['Texto'];
			$fecha = date("M d Y");
			$author = $_POST['Autor'];
			$sqlInsertNot = mysql_query("INSERT INTO noti (story_title, story_text, story_date, story_read_more) 
			VALUES ('$titulo', '$texto', '$fecha', '$author')") or die(mysql_error());     
		echo "Los datos fueron gurdados correctamente <a href='../index.php' target='_blank'>ir a la pagina</a>";   
		
		}else{     
			echo "Debe llenar todos los campos del formulario";   
		}
	} 
?>
<form name="noticia" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">   
	<p>Título de la Noticia<br /> 
		<input type="text" name="Titulo" size="50" />
	</p>   

	<p>
		Texto de la Noticia<br /> 
		<textarea name="Texto" rows="10" cols="50"></textarea>
	</p>    

	<p>
		autor de la Noticia<br /> 
		<input type="text" name="Autor" size="50" />
	</p>   

	<input type="submit" name="enviar" value="Enviar" />

</form>
