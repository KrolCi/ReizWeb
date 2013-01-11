<? 
if ($_POST["usuario"]=="McReiz" && $_POST["contrasena"]=="tres tristes tigres"){ 
   	session_start(); 
    $_SESSION["autentificado"]= "SI"; 
   	header ("Location: panel.php");	
}else { 
   	header("Location: index.php?errorusuario=si"); 
} 
?> 