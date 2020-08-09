<?php

$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID()); //Llama el id del usuario que tiene la sesion activa
}

$peticion = new PeticionData();

$peticion->id = $u->id;
$peticion->problema = $_POST["problema"];
$peticion->tipo_problema = $_POST["tipo_problema"];
$peticion->descripcion = $_POST["description"];
$peticion->id_asesor = 1;
$peticion->id_estado = 1;

$peticion->add();

print "<script>window.location='index.php?view=csolicitudes';</script>";


?>