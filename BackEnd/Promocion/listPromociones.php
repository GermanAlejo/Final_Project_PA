<?php

include 'promociones.php';

class listPromociones {

    public $arrayPromociones;

    function __construct() {
        $resultadoArray = consultarListaPromociones();
        $size = countListaPromociones();
        $promociones = new comentari();
        $j = 0;
        for ($i = 0; $i < $size; $i++) {
            if ($resultadoArray[$j] !== null) {
                $promociones->setIdComentario($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $promociones->setForo_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $promociones->setAutor_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $promociones->setMensaje($resultadoArray[$j]);
                $j++;
                $promociones->buscaAutor();
                $this->arrayComentarios = array([$i] => $promociones);
            }
        }
    }

    function consultarListaPromociones() {
        return $resultadoArray;
    }

    function countListaPromociones() {
        return $size;
    }

}
