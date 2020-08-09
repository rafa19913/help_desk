<?php

if(count($_POST)>0){

	$peticion_asesor = PeticionData::getById($_POST["user_id"]);
	
	$asesor_id="NULL";
	if($_POST["tipo_problema"]!=""){ $asesor_id=$_POST["tipo_problema"];}

	$peticion_asesor->id_asesor=$asesor_id;
		
	$peticion_asesor->updateAsesor();

	print "<script>window.location='index.php?view=asolicitudesasignadas';</script>";



}

?>