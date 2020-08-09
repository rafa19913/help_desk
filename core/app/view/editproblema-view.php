<?php $problema = ProblemaData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar problema</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateproblema" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del problema*</label>
    <div class="col-md-6">
      <input type="text" name="name" autofocus value="<?php echo $problema->name;?>" class="form-control" id="name" placeholder="Nombre de problema">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $problema->id;?>">
      <button type="submit" class="btn btn-primary">Confirmar</button>
      <button name="BtnCancelar" onclick=this.form.action="index.php?view=tipoproblema" formnovalidate class="btn btn-danger">Cancelar</button>
    </div>
  </div>
</form>
	</div>
</div>