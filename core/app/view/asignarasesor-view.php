<?php $peticion = PeticionData::getById($_GET["id"]);
$asesor = UserData::getAllAsesor();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Asignar asesor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateasesor" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-md-6">
      <input type="text" name="nombre" value="<?php echo $peticion->nombre; echo " "; echo $peticion->apellidos;?>" class="form-control" id="nombre" placeholder="Nombre" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $peticion->email;?>" class="form-control" id="nmail" placeholder="Email" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Problema</label>
    <div class="col-md-6">
      <input type="text" name="problema" value="<?php echo $peticion->problema;?>" class="form-control" id="problema" placeholder="Problema" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
      <input type="text" name="tipo" value="<?php echo $peticion->tipo;?>" class="form-control" id="tipo" placeholder="Tipo" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripción</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" value="<?php echo $peticion->descripcion;?>" class="form-control" id="descripcion" placeholder="Descripcion" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de problema*</label>
    <div class="col-md-6">
    <select name="tipo_problema" accesskey="5" required class="form-control">
    <option value="">Sin asignar</option>
    <?php foreach($asesor as $asesor):?>
      <option value="<?php echo $asesor->id;?>"><?php echo $asesor->nombre; echo " "; echo $asesor->apellidos?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $peticion->id;?>">
      <button type="submit" class="btn btn-primary">Confirmar</button>
      <button name="BtnCancelar" onclick=this.form.action="index.php?view=tipoproblema" formnovalidate class="btn btn-danger">Cancelar</button>
    </div>
  </div>
</form>
	</div>
</div>