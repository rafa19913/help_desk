<?php
/*
if(count($_POST)>0){
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=categories';</script>";


}
*/


$user = new CategoryData();

$category = $_POST["name"];
$users = CategoryData::getByName($category);

if(count($users)>0){
	
?>


<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Aviso!</h4>
                No se pueden registrar dos categorias con el mismo nombre.
              </div>

	<?php
}else{

	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=categories';</script>";
	
}

?>