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


<!--
<a href="index.php?view=newsolicitud" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nueva solicitud</a>
	-->	
        <h1>Solicitudes asignadas</h1>
<br>

<?php

$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID()); //Llama el id del usuario que tiene la sesion activa
}

    $solicitud = PeticionData::getAllAsignadas(); //Entra como parametro a la consulta el id del usuario activo
    if(count($solicitud)>0){
        // si hay usuarios
?>

<table class="table table-bordered table-hover">
			<thead>
			<th>Problema</th>
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Fecha</th>
      <th>Asesor</th>
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
        <td><?php echo $solicitudes->nombre; echo " "; echo $solicitudes->apellidos; ?></td>

        <td style="width:70px;">
<!--
        <a href="index.php?view=detallesolicitud&id=<?php echo $solicitudes->id;?>" onclick="return confirmar()" class="btn btn-danger btn-xs">Eliminar</a></td>
-->


<?php
        }
    }
        ?>