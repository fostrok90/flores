<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showcodempleado}}
  <fieldset class="row">
    <label class="col-5" for="codempleado">Código de Empleado</label>
    <input type="text" name="codempleado" id="codempleado" readonly value="{{codempleado}}" class="col-7" />
  </fieldset>
  {{endif showcodempleado}}

  <fieldset class="row">
    <label class="col-5" for="nomempleado">Nombre Empleado: </label>
    <input type="text" name="nomempleado" id="nomempleado" {{readonly}} value="{{nomempleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="apePaempleado">Apellido Paterno: </label>
    <input type="text" name="apePaempleado" id="apePaempleado" {{readonly}} value="{{apePaempleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="apeMaempleado">Apellido Materno: </label>
    <input type="text" name="apeMaempleado" id="apeMaempleado" {{readonly}} value="{{apeMaempleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="numIdeempleado">Numero de id: </label>
    <input type="text" name="numIdeempleado" id="numIdeempleado" {{readonly}} value="{{numIdeempleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="tel1empleado">Primer telefono: </label>
    <input type="text" name="tel1empleado" id="tel1empleado" {{readonly}} value="{{tel1empleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="tel2empleado">Segundo Telefono: </label>
    <input type="text" name="tel2empleado" id="tel2empleado" {{readonly}} value="{{tel2empleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="tel3empleado">Tercer Telefono: </label>
    <input type="text" name="tel3empleado" id="tel3empleado" {{readonly}} value="{{tel3empleado}}" class="col-7" />
  </fieldset>

  <fieldset class="row">
    <label class="col-5" for="correoempleado">Correo empleado: </label>
    <input type="text" name="correoempleado" id="correoempleado" {{readonly}} value="{{correoempleado}}" class="col-7" />
  </fieldset>


  <fieldset class="row">
    <label class="col-5" for="estadoempleado">Estado:</label>
    <select name="estadoempleado" id="estadoempleado" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach estadoempleado}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor estadoempleado}}
    </select>
  </fieldset>

  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>

</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
