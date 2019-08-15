<section>
  <header>
    <h1>EMPLEADOS</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Nombre</th>
          <th>Apellido P.</th>
          <th>Apellido M.</th>
          <th>Numero ident.</th>
          <th>Primer Tel</th>
          <th>Segundo Tel</th>
          <th>Tercer Tel</th>
          <th>Correo</th>
          <th>Estado</th>
          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="codempleado" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach empleado}}
        <tr>
          <td>{{codempleado}}</td>
          <td>{{nomempleado}}</td>
          <td>{{apePaempleado}}</td>
          <td>{{apeMaempleado}}</td>
          <td>{{numIdeempleado}}</td>
          <td>{{tel1empleado}}</td>
          <td>{{tel2empleado}}</td>
          <td>{{tel3empleado\}}</td>
          <td>{{correoempleado}}</td>
          <td>{{estadoempleado}}</td>
          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="codempleado" value="{{codempleado}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor empleado}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
