<?php

include 'foro.php';

class listForo {

    public $arrayForos;
    public $sizeArray;

    function __construct() {
        $size = countListaForos();
        if ($size > 5) {
            $size = 5;
        }
        $resultadoArray = consultarListaForos(0, $size);
        $foro = new foro();
        for ($i = 0; $i < $size; $i++) {
            $foro->setIdForo($resultadoArray[$i]);
            $foro->consultaForo();
            $this->arrayForos = array([$i] => $foro);
        }
    }

    function añadirMasForo() {
        $size = countListaForos();
        if ($size > $this->sizeArray) {
            $size = $size - $this->sizeArray;
            if ($size > 5) {
                $size = 5;
            }
            $puntoA = $this->sizeArray + 1;
            $puntoB = $puntoA + $size;
            $resultadoArray = consultarListaForos($idForo, $puntoA, $puntoB);
            $foro = new foro();
            for ($i = 0; $i < $size; $i++) {
                $foro->setIdForo($resultadoArray[$i]);
                $foro->consultaForo();
                $this->arrayForos[$i] = $foro;
            }
            $this->sizeArray += $size;
        }
    }

    function consultarListaForos($puntoA, $puntoB) {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "SELECT foro.id FROM foro LIMIT ?, ?";
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

    function countListaForos() {
        $consulta = 'select count(*) from foro';
        return $size;
    }

    function getForos($num) {
        return $this->$arrayForos[$num];
    }

}
