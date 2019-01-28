<?php

include 'foro.php';

class listForo {

    public $arrayForos;

    function __construct() {
        $resultadoArray = consultarListaForos();
        $size = countListaForos();
        $foro = new foro();
        $j = 0;
        for ($i = 0; $i < $size; $i++) {
            if ($resultadoArray[$j] !== null) {
                $foro->setIdComentario($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $foro->setForo_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $foro->setAutor_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $foro->setMensaje($resultadoArray[$j]);
                $j++;
                $foro->buscaAutor();
                $this->$arrayForos = array([$i] => $foro);
            }
        }
    }

    function consultarListaForos() {
        return $resultadoArray;
    }

    function countListaForos() {
        return $size;
    }

}
