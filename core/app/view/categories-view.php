<script>
function confirmar()
{
  if(confirm('¿Esta seguro de eliminar este elemento?'))
    return true;
  else
    return false;
}
</script>

<div class="row">
	<div class="col-md-12">

<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID()); 
}
?>

<div class="btn-group pull-right">
	<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva categoría</a>
</div>

	<h1>Categorías</h1>
<br>
		<?php

		$users = CategoryData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>

				<?php if($u->administrador):?>

				<td style="width:130px;"><a href="index.php?view=editcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>

					<a href="index.php?view=delcategory&id=<?php echo $user->id;?>" onclick="return confirmar()" class="btn btn-danger btn-xs">Eliminar</a></td>

					
				</tr>

				<?php else:?>
					<td style="width:130px;"><a href="index.php?view=editcategory&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs disabled">Editar</a> <a href="index.php?view=delcategory&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs disabled">Eliminar</a></td>
				</tr>
				<?php endif;?>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>


	</div>
</div>