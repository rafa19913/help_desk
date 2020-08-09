<?php

if(count($_POST)>0){

    $detalles = PeticionData::getById($_POST["user_id"]);
    
    $detalles->detalles=$_POST["detalles"];
    
    $detalles->id_estado=2;
		
	$detalles->updateDetalles();

	print "<script>window.location='index.php?view=tsolicitudes';</script>";

}

?>