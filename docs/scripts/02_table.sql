CREATE TABLE `empleados` (
  `codempleado` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `nomempleado` VARCHAR(50) NULL,
  `apePaempleado` VARCHAR(50) NULL,
  `apeMaempleado` VARCHAR(20) NULL,

  `numIdeempleado` VARCHAR(20) NULL,
  `tel1empleado` VARCHAR(20) NULL,
  `tel2empleado` VARCHAR(20) NULL,
  `tel3empleado` VARCHAR(20) NULL,

  `correoempleado` VARCHAR(128) NULL,
  `estadoempleado` VARCHAR(3) NULL,


  PRIMARY KEY (`codempleado`));
