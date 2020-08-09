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



<?php if($u->id_rol=1):?>
<div class="btn-group pull-right">
  <a href="index.php?view=newproblema" class="btn btn-default"><i class='fa fa-book'></i> Agregar tipo de problema</a>
</div>

<?php else:?>
<div class="btn-group pull-right">
  <a href="index.php?view=newproblema" class="btn btn-default disabled"><i class='fa fa-th-list'></i> Agregar Aula</a>
</div>
<?php endif;?>

    <h1>Tipos de problemas</h1>
<br>
    <?php
    $problema = ProblemaData::getAll();
    if(count($problema)>0){
      // si hay usuarios
      ?>

      <table class="table table-bordered table-hover">
      <thead>
      <th>Problema</th>
      <th></th>
      </thead>
      <?php
      foreach($problema as $problema){
        ?>
        <tr>
        <td><?php echo $problema->problema; ?></td>


        <td style="width:130px;"><a href="index.php?view=editproblema&id=<?php echo $problema->id;?>" class="btn btn-warning btn-xs">Editar</a>

          <a href="index.php?view=delproblema&id=<?php echo $problema->id;?>" onclick="return confirmar()" class="btn btn-danger btn-xs">Eliminar</a></td>

          
        </tr>

        <?php

      }



    }else{
      echo "<p class='alert alert-danger'>Aun no se han registrado aulas</p>";
    }


    ?>


  </div>
</div>