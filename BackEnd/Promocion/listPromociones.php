<?php

include 'promociones.php';

class listPromociones {

    public $arrayPromociones;

    function __construct() {
        $size = countListaPromociones();
        if ($size > 5) {
            $size = 5;
        }
        $resultadoArray = consultarListaPromociones(0, $size);
        $promocion = new promocion();
        for ($i = 0; $i < $size; $i++) {
            $promocion->setIdPromocion($resultadoArray[$i]);
            $promocion->consultarPromocion();
            $this->arrayPromociones = array([$i] => $promocion);
        }
    }

    function consultarListaPromociones($puntoA, $puntoB) {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "SELECT promocion.id FROM promocion LIMIT ?, ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "ss", $puntoA, $puntoB);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
        $resultadoArray = mysqli_fetch_assoc($resultado);
        return $resultadoArray;
    }

    function countListaPromociones() {
        $consulta = 'select count(*) from promocion';
        return $size;
    }

    function getPromociones($num) {
        return $this->arrayPromociones[$num];
    }

}
