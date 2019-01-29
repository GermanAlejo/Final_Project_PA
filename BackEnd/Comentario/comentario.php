<?php

class comentari {

    public $idComentario;
    public $foro_id;
    public $autor_id;
    public $mensaje;
    public $nomAutor;

    
    function getIdComentario() {
        return $this->idComentario;
    }

    function getForo_id() {
        return $this->foro_id;
    }

    function getAutor_id() {
        return $this->autor_id;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getNomAutor() {
        return $this->nomAutor;
    }

    function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }

    function setForo_id($foro_id) {
        $this->foro_id = $foro_id;
    }

    function setAutor_id($autor_id) {
        $this->autor_id = $autor_id;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setNomAutor($nomAutor) {
        $this->nomAutor = $nomAutor;
    }

    function crearComentario() {
        $consulta="INSERT INTO `mensaje` (`id`, `foro_id`, `autor_id`, `mensaje`) VALUES (NULL, '1', '3', '?')";
    }

    function consultarComentario() {
        $consulta="SELECT usuario.nombre,mensaje.mensaje FROM mensaje JOIN usuario WHERE mensaje.foro_id=1 and usuario.id=mensaje.autor_id";
    }

    function eliminarComentario() {
        $consulta="delete from mensaje where mensaje.id=2";
    }

}
