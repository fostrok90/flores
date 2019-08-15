<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.
/*
SELECT `juguetes`.`idjuguetes`,
    `juguetes`.`nomjuguete`,
    `juguetes`.`preciojuguete`,
    `juguetes`.`estadojuguete`
FROM `examen`.`juguetes`;
*/
/**
 * Obtiene los registro de la tabla de modas
 *
 * @return Array
 */
function obtenerListas()
{
    $sqlstr = "select `empleados`.`codempleado`,
              `empleados`.`nomempleado`,
              `empleados`.`apePaempleado`,
              `empleados`.`apeMaempleado`,
              `empleados`.`numIdeempleado`,
              `empleados`.`tel1empleado`,
              `empleados`.`tel2empleado`,
              `empleados`.`tel3empleado`,
              `empleados`.`correoempleado`,
              `empleados`.`estadoempleado`
              from `flores`.`empleados`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}

function obtenerEmpleadosPorId($codempleado)
{
  $sqlstr="select `empleados`.`codempleado`,
            `empleados`.`nomempleado`,
            `empleados`.`apePaempleado`,
            `empleados`.`apeMaempleado`,
            `empleados`.`numIdeempleado`,
            `empleados`.`tel1empleado`,
            `empleados`.`tel2empleado`,
            `empleados`.`tel3empleado`,
            `empleados`.`correoempleado`,
            `empleados`.`estadoempleado`
            from `flores`.`empleados` where codempleado=%d";
  $empleados= array();
  $empleados=obtenerUnRegistro(sprintf($sqlstr, $codempleado));
  return $empleados;
}

function obtenerEstadoPorId($codempleado)
{
  $sqlstr="select `empleados`.`estadoempleado`
        from `flores`.`empleados` where codempleado=%d";
  $empleados= array();
  $empleados=obtenerUnRegistro(sprintf($sqlstr, $codempleado));
  return $empleados;
}


function obtenerEstados()
{
    return array(
        array("cod"=>"ACT", "dsc"=>"Activo"),
        array("cod"=>"ASP", "dsc"=>"Aspiranre"),
        array("cod"=>"FMQ", "dsc"=>"Finiquitado")

    );
}



function agregarNuevoEmpleados($nomempleado,$apePaempleado,$apeMaempleado,$numIdeempleado,$tel1empleado,$tel2empleado,$tel3empleado,$correoempleado,$estadoempleado) {
    $insSql = "INSERT INTO empleados(nomempleado,apePaempleado,apeMaempleado,numIdeempleado,tel1empleado,tel2empleado,tel3empleado,correoempleado,estadoempleado)
      values ('%s','%s','%s','%s','%s','%s','%s','%s','%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $nomempleado,
              $apePaempleado,
              $apeMaempleado,
              $numIdeempleado,
              $tel1empleado,
              $tel2empleado,
              $tel3empleado,
              $correoempleado,
              $estadoempleado
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificarEmpleados($nomempleado,$apePaempleado,$apeMaempleado,$numIdeempleado,$tel1empleado,$tel2empleado,$tel3empleado,$correoempleado,$estadoempleado,$codempleado)
{
    $updSQL = "UPDATE empleados set nomempleados='%s',nomempleado='%s',
    apeMaempleado='%s',
    apePaempleado='%s',
    numIdeempleado='%s',
    tel1empleado='%s',
    tel3empleado='%s',
    tel2empleado='%s',
    correoempleado='%s',
    estadoempleado='%s'  where codempleado=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $nomempleado,
            $apePaempleado,
            $apeMaempleado,
            $numIdeempleado,
            $tel1empleado,
            $tel2empleado,
            $tel3empleado,
            $correoempleado,
            $estadoempleado,
            $codempleado
        )
    );
}
function eliminarEmpleados($codempleado)
{
    $delSQL = "DELETE FROM empleados where codempleado=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $codempleado
        )
    );
}
?>
