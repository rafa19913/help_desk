<?php

$problema_t = new ProblemaData();

$problema = $_POST["name"];
$users = ProblemaData::getByName($problema);

if(count($users)>0){
	
?>


<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Aviso!</h4>
                Ya existe un aula con el mismo nombre.
              </div>

	<?php
}else{

	$problema_t->name = $_POST["name"];

	$problema_t->add();

print "<script>window.location='index.php?view=tipoproblema';</script>";
	
}

?>