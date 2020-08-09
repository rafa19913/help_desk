<?php



    $estado = PeticionData::getById($_GET["id"]);
    
    $estado->id_estado=3;

    		
	$estado->updateEstado();

	print "<script>window.location='index.php?view=tsolicitudes';</script>";



?>