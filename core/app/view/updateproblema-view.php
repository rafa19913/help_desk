<?php

if(count($_POST)>0){
	$problema = ProblemaData::getById($_POST["user_id"]);
	$problema->name = $_POST["name"];
	
	$problema->update();
	
	print "<script>window.location='index.php?view=tipoproblema';</script>";


}


?>