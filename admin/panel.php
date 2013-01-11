<? 
//Inicio la sesión 
session_start(); 

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if ($_SESSION["autentificado"] != "SI") { 
   	//si no existe, envio a la página de autentificacion 
   	header("Location: index.php"); 
   	//ademas salgo de este script 
   	exit(); 
}	
?>
<html lang="es">
<head>
<title>mi panel</title>
<style>
body{
	text-align:center;
}
h3{
	margin:0;
	padding:0;
}
article,aside{
	vertical-align:top;
	display: inline-block;
	margin-top: 30px;
}
aside{
	width:180px;
	text-align: left;
}
aside h3{
	text-align: center;
}
article{
	width: 500px;
}

</style>
</head>
<body>
<aside>
	<nav>
		<ul>
			<h3>:: Noticias ::</h3>
			<li><a href="panel.php?id=crearnoticia">Crear noticia</a></li>
			<li><a href="panel.php?id=noticiapanel">Editar o borrar noticias</a></li>
			<br />
			
			<h3>:: Dise&ntilde;os ::</h3>
			<li><a href="panel.php?id=publicarlayout">Publicar diseño</a></li>
			<li><a href="panel.php?id=designpanel">modificar o borrar diseño</a></li>
			<br />
			
			<h3>:: Extras ::</h3>
			<li><a href="panel.php?id=content-m">Modificar contenido</li>
			<br />
			
			<li><a href="salir.php">Salir</a></li>
			</ul>
	</nav>
</aside>
<article>
<?PHP
	if (isset($_GET['id'])) {
		if (!empty($_GET['id']) && $_GET['id'] != "index") {
			if (file_exists($_GET['id'].".php")) {
				include ($_GET['id'].".php");
			} else {
				echo "No existe esta seccion";
			}
		} else {
			include ("principal.php");
		}
	} else {
		include ("principal.php");
	}
?>
</article>
</body>
</html>