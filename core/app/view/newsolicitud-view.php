<?php 
$problema = ProblemaData::getAll();
    ?>

<div class="row">
	<div class="col-md-12">

	<h1>Nueva solicitud</h1>
	<br>
		<form class="form-horizontal" method="post" onsubmit="setFormSubmitting()" id="addproduct" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Problema*</label>
    <div class="col-md-6">
      <input type="text" name="problema" accesskey="1" autofocus required class="form-control" id="problema" placeholder="Nombre del problema">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de problema*</label>
    <div class="col-md-6">
    <select name="tipo_problema" accesskey="5" required class="form-control">
    <option value="">-- Ninguna --</option>
    <?php foreach($problema as $problema):?>
      <option value="<?php echo $problema->id;?>"><?php echo $problema->problema;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripción*</label>
    <div class="col-md-6">
    <textarea name="description" rows="4" cols="20" accesskey="6" class="form-control" id="description" placeholder="Descripción del material"></textarea>
    </div>
  </div>
  
  


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">

      <button name="BtnGuardar" type="submit" onclick=this.form.action="index.php?view=addcsolicitud" class="btn btn-primary">Confirmar</button>

      <button name="BtnCancelar" onclick=this.form.action="index.php?view=csolicitudes" formnovalidate class="btn btn-danger">Cancelar</button>


    </div>
  </div>
</form>
	</div>
</div>

<p class="alert alert-info">* Campos obligatorios</p>


<script>
var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };
var isDirty = function() { return true; }

window.onload = function() {
    window.addEventListener("beforeunload", function (e) {
        if (formSubmitting || !isDirty()) {
            return undefined;
        }

        var confirmationMessage = 'It looks like you have been editing something. '
                                + 'If you leave before saving, your changes will be lost.';

        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
    });
};
</script>