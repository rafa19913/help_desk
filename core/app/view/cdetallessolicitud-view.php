<?php $peticion = PeticionData::getById($_GET["id"]);
$asesor = UserData::getAllAsesor();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Detalles de solicitud</h1>
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
    <label for="inputEmail1" class="col-lg-2 control-label">Asesor</label>
    <div class="col-md-6">
      <input type="text" name="asesor" value="<?php echo $peticion->nombre_asesor; echo " "; echo $peticion->apellidos_asesor?>" class="form-control" id="descripcion" placeholder="Descripcion" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Detalles del asesor</label>
    <div class="col-md-6">
    <textarea name="detalles" rows="4" cols="20" accesskey="6" class="form-control" id="detalles" placeholder="Detalles definidos por el asesor" disabled><?php echo $peticion->detalles_asesor;?></textarea>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button name="BtnCancelar" onclick=this.form.action="index.php?view=csolicitudes" formnovalidate class="btn btn-danger">Salir</button>
    </div>
  </div>
</form>
	</div>
</div>