<div class="row">
	<div class="col-md-12">
		<h1>Menú principal</h1>
</div>
</div>
  <div class="row">
      <?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID()); 
?>  

       


<?php if($u->id_rol==1):?>

	<div class="col-lg-3 col-xs-6">
		 <!-- small box -->
		 <div class="small-box bg-blue">
		   <div class="inner">
			 <h3><?php echo count(PeticionData::getAllPendientes());?></h3>


			 <p>Solicitudes pendientes</p>
		   </div>
		   <div class="icon">
			 <i class="fa fa-exclamation"></i>
		   </div>
		   <a href="./?view=asolicitudespendientes" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
		 </div>
	   </div>
	   <!-- ./col -->

	   <div class="col-lg-3 col-xs-6">
		 <!-- small box -->
		 <div class="small-box bg-green">
		   <div class="inner">
			 <h3><?php echo count(PeticionData::getAllAsignadas());?></h3>


			 <p>Solicitudes asignadas</p>
		   </div>
		   <div class="icon">
			 <i class="fa fa-check"></i>
		   </div>
		   <a href="./?view=asolicitudesasignadas" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
		 </div>
	   </div>
	   <!-- ./col -->

	   <div class="col-lg-3 col-xs-6">
		 <!-- small box -->
		 <div class="small-box bg-orange">
		   <div class="inner">
		   <h3><?php echo count(ProblemaData::getAll());?></h3>


			 <p>Tipos de problemas</p>
		   </div>
		   <div class="icon">
			 <i class="fa fa-warning"></i>
		   </div>
		   <a href="./?view=tipoproblema" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
		 </div>
	   </div>
	   <!-- ./col -->
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(UserData::getAll());?></h3>


              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="./?view=users" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

<?php endif;?>


<?php if($u->id_rol==2):?>
       
	<div class="col-lg-3 col-xs-6">
		 <!-- small box -->
		 <div class="small-box bg-blue">
		   <div class="inner">
			 <h3><?php echo count(PeticionData::getAllAsesor($u->id));?></h3>


			 <p>Solicitudes</p>
		   </div>
		   <div class="icon">
			 <i class="fa fa-list-ul"></i>
		   </div>
		   <a href="./?view=tsolicitudes" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
		 </div>
	   </div>
	   <!-- ./col -->
	

<?php endif;?>

<?php if($u->id_rol==3):?>
       
	   <div class="col-lg-3 col-xs-6">
		 <!-- small box -->
		 <div class="small-box bg-blue">
		   <div class="inner">
			 <h3><?php echo count(PeticionData::getAll($u->id));?></h3>


			 <p>Solicitudes</p>
		   </div>
		   <div class="icon">
			 <i class="fa fa-list-ul"></i>
		   </div>
		   <a href="./?view=csolicitudes" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
		 </div>
	   </div>
	   <!-- ./col -->

<?php endif;?>
        


      </div>
      <!-- /.row -->
<?php endif;?>
<!--
<div class="row">
	<div class="col-md-12">
<?php if($found):?>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/alerts-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
<?php endif;?>

</div>
<div class="clearfix"></div>
<?php if(count($products)>0){?>
<br><table class="table table-bordered table-hover">
	<thead>
		<th >Codigo</th>
		<th>Nombre del producto</th>
		<th>En Stock</th>
		<th></th>
	</thead>
	<?php
foreach($products as $product):
	$q=OperationData::getQYesF($product->id);
	?>
	<?php if($q<=$product->inventary_min):?>
	<tr class="<?php if($q==0){ echo "danger"; }else if($q<=$product->inventary_min/2){ echo "danger"; } else if($q<=$product->inventary_min){ echo "warning"; } ?>">
		<td><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $q; ?></td>
		<td>
		<?php if($q==0){ echo "<span class='label label-danger'>No hay existencias.</span>";}else if($q<=$product->inventary_min/2){ echo "<span class='label label-danger'>Quedan muy pocas existencias.</span>";} else if($q<=$product->inventary_min){ echo "<span class='label label-warning'>Quedan pocas existencias.</span>";} ?>
		</td>
	</tr>
<?php endif;?>
<?php
endforeach;
?>
</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay alertas</h2>
		<p>Por el momento no hay alertas de inventario, estas se muestran cuando el inventario ha alcanzado el nivel minimo.</p>
	</div>
	<?php
}

?>
-->
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>