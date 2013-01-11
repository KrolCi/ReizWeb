<?php
	$on = "3";
	$pag = "tutoriales y guias";
	require_once("./include/config.php");
	
	require_once("./theme/header.php");
	require_once("./theme/menu.php");
	require("include/paging_class.php");
	
	echo "<div id='wrapper'>";
	require_once("./theme/tuto.php");
	require_once("./theme/aside.php");
	echo "</div>";
	require_once("./theme/footer.php");
?>