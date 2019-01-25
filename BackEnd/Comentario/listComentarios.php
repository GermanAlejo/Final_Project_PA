<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listComentarios
 *
 * @author Racso
 */
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
                $comentario->buscaAutor();
                $this->arrayComentarios = array([$i] => $comentario);
            }
        }
    }

    function consultarListaComentarios() {
        return $resultadoArray;
    }

    function countListaComentarios() {
        return $size;
    }

}
