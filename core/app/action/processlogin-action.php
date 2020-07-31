<?php

// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");


$base = new Database();
$con = $base->connect();
if($con->ping()){

	

if(!isset($_SESSION["user_id"])) {
$user = $_POST['username'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();


 $sql = "select * from usuario where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if($found==true) {
//	session_start();
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	//print "<script>window.location='index.php?view=login';</script>";

?>
	<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Aviso!</h4>
                El usuario o contraseña son incorrectos.
              </div>

<?php

}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}

}else{
	header('Location: core\app\view\errordatabase-view.html');
	}



?>