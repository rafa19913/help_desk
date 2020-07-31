<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar categoria</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" autofocus value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Confirmar</button>
      <button name="BtnCancelar" onclick=this.form.action="index.php?view=categories" formnovalidate class="btn btn-danger">Cancelar</button>
    </div>
  </div>
</form>
	</div>
</div>