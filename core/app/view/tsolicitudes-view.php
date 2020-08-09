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

		<h1>Solicitudes</h1>
<br>

<?php

$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID()); //Llama el id del usuario que tiene la sesion activa
}

    $solicitud = PeticionData::getAllAsesor($u->id); //Entra como parametro a la consulta el id del usuario activo
    if(count($solicitud)>0){
        // si hay usuarios
?>

<table class="table table-bordered table-hover">
			<thead>
			<th>Problema</th>
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Fecha</th>
            <th>Estado</th>
			<th></th>
			</thead>
        <?php
        foreach($solicitud as $solicitudes){

        
    
        ?>
        <tr>
        <td><?php echo $solicitudes->problema; ?></td>
        <td><?php echo $solicitudes->tipo; ?></td>
        <td><?php echo $solicitudes->descripcion; ?></td>
        <td><?php echo $solicitudes->fecha; ?></td>
        <td><?php echo $solicitudes->estado; ?></td>

        <td style="width:130px;">
 
        <a href="index.php?view=tdetallessolicitud&id=<?php echo $solicitudes->id;?>" class="btn btn-success btn-xs">Detalles</a>
        <a href="index.php?view=finalizar&id=<?php echo $solicitudes->id;?>" class="btn btn-primary btn-xs">Finalizar</a></td>
        </tr>
<?php
        }
    }
        ?>