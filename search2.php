<?php 

require_once 'core/controller/Database.php';
require_once 'core/controller/Session.php';
require_once 'core/app/model/UserData.php';

$mysqli = Database::getCon();

$tabla="";
$query="select inventario.id_inventario,inventario.nombre,inventario.serie,categoria.nombre as categoria,aula.nombre as aula,estado.estado as estado
from inventario inner join categoria
on inventario.categoria_id=categoria.id_categoria inner join aula on inventario.aula_id=aula.id_aula inner join estado on inventario.estado_id=estado.id_estado
order by inventario.id_inventario;";

if(isset($_POST['search'])){
$search = $mysqli->real_escape_string($_POST['search']);

$query = "select inventario.id_inventario,inventario.nombre,inventario.serie,categoria.nombre as categoria,aula.nombre as aula,estado.estado as estado from inventario
		inner join categoria on inventario.categoria_id=categoria.id_categoria inner join aula on inventario.aula_id=aula.id_aula inner join estado on inventario.estado_id=estado.id_estado where inventario.id_inventario like '%$search%' or inventario.nombre like '%$search%' or inventario.serie like '%$search%' or categoria.nombre like '%$search%' or aula.nombre like '%$search%' or estado.estado like '%$search%'
		order by inventario.id_inventario;";
}


$res = $mysqli->query($query);
if($res->num_rows>0){

$tabla= 
	'<table class="table">
		<tr class="bg-primary">
			<td>Marca</td>
			<td>Serie</td>
			<td>Categoría</td>
			<td>Aula</td>
			<td>Estado</td>
			<td></td>
			<td></td>
		</tr>';

while ($row = $res->fetch_array(MYSQLI_ASSOC)){
	
	$tabla.=
		'<tr>
			<td>'.$row['nombre'].'</td>
			<td>'.$row['serie'].'</td>
			<td>'.$row['categoria'].'</td>
			<td>'.$row['aula'].'</td>
			<td>'.$row['estado'].'</td>

			<td style="width:70px;">

			<td style="width:130px;"><a href="index.php?view=detallesmaterial&id='.$row['id_inventario'].'" class="btn btn-primary btn-xs">Detalles</a>


			<a href="index.php?view=editmaterial&id='.$row['id_inventario'].'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>

			<a href="index.php?view=delmaterial&id='.$row['id_inventario'].'" class="btn btn-xs btn-danger disabled"><i class="fa fa-trash"></i></a>';


			$tabla.=
		 '</tr>
		';

}

$tabla.='</table>';

} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

	echo $tabla;
