<?php

include 'comentario.php';

class listComentarios {

    public $arrayComentarios;
    public $sizeArray;

    function __construct($idForo) {
        $size = countListaComentarios();
        if ($size > 5) {
            $size = 5;
        }
        $resultadoArray = consultarListaComentarios($idForo, 0, $size);
        $comentario = new comentari();
        for ($i = 0; $i < $size; $i++) {
            $comentario->setIdComentario($resultadoArray[$i]);
            $comentario->consultarComentario();
            $this->arrayComentarios = array([$i] => $comentario);
        }
        $this->sizeArray = $size;
    }

    function añadirMasComentarios() {
        $size = countListaComentarios();
        if ($size > $this->sizeArray) {
            $size = $size - $this->sizeArray;
            if ($size > 5) {
                $size = 5;
            }
            $puntoA = $this->sizeArray + 1;
            $puntoB = $puntoA + $size;
            $resultadoArray = consultarListaComentarios($idForo, $puntoA, $puntoB);
            $comentario = new comentari();
            for ($i = 0; $i < $size; $i++) {
                $comentario->setIdComentario($resultadoArray[$i]);
                $comentario->consultarComentario();
                $this->arrayComentarios[$i] = $comentario;
            }
            $this->sizeArray += $size;
        }
    }

    function consultarListaComentarios($idForo, $puntoA, $puntoB) {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "SELECT mensaje.id FROM mensaje WHERE mensaje.foro_id=? LIMIT ?, ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "sss", $idForo, $puntoA, $puntoB);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
        $resultadoArray = mysqli_fetch_assoc($resultado);
        return $resultadoArray;
    }

    function countListaComentarios($idForo) {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = 'select count(*) from mensaje WHERE mensaje.foro_id=?';
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "s", $idForo);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
        return $resultado;
    }

    function getComentario($num) {
        return $this->$arrayComentarios[$num];
    }

}

/*

 * SELECT * FROM foro LIMIT 0, 5 paginación 0-5
 * select count(*) from foro
 */