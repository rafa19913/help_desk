<div class="row">
	<div class="col-md-12">

    <div class="btn-group pull-right">
  <a href="index.php?view=helpnewcategory" class="btn btn-default"><i class='fa fa-question'></i> </a>
</div>


	<h1>Nueva categoría</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?view=addcategory" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" autofocus required class="form-control" id="name" placeholder="Nombre de la categoría">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Confirmar</button>
      <button name="BtnCancelar" onclick=this.form.action="index.php?view=categories" formnovalidate class="btn btn-danger">Cancelar</button>
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>
  
</form>
	</div>
</div>