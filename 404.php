<?php
    $on = "0";
	$pag = "ERROR 404";
	require_once("./include/config.php");
	
	require_once("./theme/header.php");
	require_once("./theme/menu.php");
	require("include/paging_class.php");
	
	echo "<div id='wrapper'>";
	require_once("./theme/error.php");
	require_once("./theme/aside.php");
	echo "</div>";
	require_once("./theme/footer.php");
?>