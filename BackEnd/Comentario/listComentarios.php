<?php

include 'comentario.php';

class listComentarios {

    public $arrayComentarios;

    function __construct() {
        $resultadoArray = consultarListaComentarios();
        $size = countListaComentarios();
        $comentario = new comentari();
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
                $this->arrayComentarios = array([$i] => $comentario);
            }
        }
    }

    function consultarListaComentarios() {
        return $resultadoArray;
    }

    function countListaComentarios($idForo) {
        $consulta = 'select count(*) from mensaje WHERE mensaje.foro_id=?';
        return $size;
    }

}
