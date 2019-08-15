<?php
  require_once "models/examendata.model.php";
  function run()
  {
      $estadoEmpleado = obtenerEstados();
      $selectedEst = 'ACT';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "EMPLEADOS",
        "INS" => "Creando Nuevo Empleados",
        "UPD" => "Actualizando Empleados ",
        "DEL" => "Eliminando Empleados "
      );
      $viewData = array();
      $viewData["showcodempleado"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $moda = obtenerEmpleadoPorId($_POST["codempleado "]);
          $selectedEst=$moda["estadoempleado"];
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["numIdeempleado"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";

          $moda = obtenerEmpleadoPorId($_POST["codempleado"]);
          $selectedEst=$moda["estadoempleado"];
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["numIdeempleado"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";

          $moda = obtenerEmpleadoPorId($_POST["codempleado"]);
          $selectedEst=$moda["estadoempleado"];
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["numIdeempleado"];
      }
      if (isset($_POST["btnIns"])) {
          $mode = "INS";

          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showcodempleado"]  = false;
      }

      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["estadoempleado"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              $viewData["showcodempleado"] = false;
              $viewData["modeDsc"] = $modeDesc[$mode];


              if (!$hasError && agregarNuevoEmpleado(
                  $viewData["nomempleado"],
                  $viewData["apePaempleado"],
                  $viewData["apeMaempleado"],
                  $viewData["numIdeempleado"],
                  $viewData["tel1empleado"],
                  $viewData["tel2empleado"],
                  $viewData["tel3empleado"],
                  $viewData["correoempleado"],
                  $viewData["estadoempleado"]

              )
              ) {
                  redirectWithMessage(
                      "Empleado Guardado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
             $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["numIdeempleado"];
              if (modificarEmpleado(
                $viewData["nomempleado"],
                $viewData["apePaempleado"],
                $viewData["apeMaempleado"],
                $viewData["numIdeempleado"],
                $viewData["tel1empleado"],
                $viewData["tel2empleado"],
                $viewData["tel3empleado"],
                $viewData["correoempleado"],
                $viewData["estadoempleado"],
                $viewData["codempleado"]

              )
              ) {
                  redirectWithMessage(
                      "Empleado Actualizado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["numIdeempleado"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarEmpleado(
                  $viewData["codempleado"]
              )
              ) {
                  redirectWithMessage(
                      "Empleado Eliminado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["estadoempleado"] = addSelectedCmbArray($estadoempleado, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
