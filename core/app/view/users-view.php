<div class="row">
	<div class="col-md-12">

<script>
function confirmar()
{
  if(confirm('¿Esta seguro de eliminar este elemento?'))
    return true;
  else
    return false;
}
</script>

		<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID()); 
}
?>

	<a href="index.php?view=newuser" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo usuario</a>
		<h1>Usuarios</h1>
<br>
		<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "Agustin";
		$u->lastname = "Ramos";
		$u->email = "evilnapsis@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$users = UserData::getAll(); 
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nombre de usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nombre." ".$user->apellidos; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->email; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->id_rol==1):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>

				<?php if($u->id_rol==1):?>
				
				<td style="width:130px;">

				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>

				<a href="index.php?view=deluser&id=<?php echo $user->id;?>" onclick="return confirmar()" class="btn btn-danger btn-xs">Eliminar</a></td>

					<?php else:?>

					<td style="width:130px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs disabled">Editar</a>

					<a href="index.php?view=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs disabled">Eliminar</a>

				</td>
				</tr>

				<?php endif;?>
				<?php

			}
 echo "</table>";


		}else{
			// no hay usuarios
		}


		?>


	</div>
</div>