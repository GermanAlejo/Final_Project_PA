<?php

include 'foro.php';

class listForo {

    public $arrayForos;

    function __construct() {
        $resultadoArray = consultarListaForos();
        $size = countListaComentarios();
        $foro = new foro();
        $j = 0;
        for ($i = 0; $i < $size; $i++) {
            if ($resultadoArray[$j] !== null) {
                $comentario->setIdComentario($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $comentario->setForo_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $comentario->setAutor_id($resultadoArray[$j]);
                $j++;
                if ($resultadoArray[$j] !== null)
                    $comentario->setMensaje($resultadoArray[$j]);
                $j++;
                $comentario->buscaAutor();
                $this->$arrayForos = array([$i] => $comentario);
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
