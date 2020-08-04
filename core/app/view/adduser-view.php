<?php
/*
if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}
*/



$user = new UserData();

$username = $_POST["username"];
$email = $_POST["email"];

$users = UserData::getByUser($username, $email);

if(count($users)>0){
	
?>


<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Aviso!</h4>
                Ya existe un usuario con el mismo nombre o email.
              </div>

	<?php
}else{

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->password = sha1(md5($_POST["password"]));
	$rol_id="NULL";
	if($_POST["rol_id"]!=""){ $rol_id=$_POST["rol_id"];}

	$user->rol_id=$rol_id;

	
	$user->add();


print "<script>window.location='index.php?view=users';</script>";


}
	
}



?>