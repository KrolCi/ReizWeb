<?php
	$on = "5";
	$pag = "Contactame";
	require_once("./include/config.php");
	
	require_once("./theme/header.php");
	require_once("./theme/menu.php");
	require("include/paging_class.php");
	
	echo "<div id='wrapper'>";
	require_once("./theme/contacto.php");
	require_once("./theme/aside.php");
	echo "</div>";
	require_once("./theme/footer.php");
?>