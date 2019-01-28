<?php

class promocion {

    public $idPromocion;
    public $creador_id;
    public $fecha_inicio;
    public $fecha_fin;
    public $titulo;
    public $descripcion;
    public $descuento;

    function getIdPromocion() {
        return $this->idPromocion;
    }

    function getCreador_id() {
        return $this->creador_id;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function setIdPromocion($idPromocion) {
        $this->idPromocion = $idPromocion;
    }

    function setCreador_id($creador_id) {
        $this->creador_id = $creador_id;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function crearPromocion() {
        
    }

    function consultarPromocion() {
        
    }

    function modificarPromocion() {
        
    }

    function eliminarPromocion() {
        
    }

}




/*
 * INSERT INTO `promocion` (`id`, `creador_id`, `fecha_inicio`, `fecha_fin`, `titulo`, `descripcion`, `descuento`, `foto`) VALUES (NULL, '1', '2019-01-25', '2019-02-14', 'Sorteo entradas rey leon', 'que te lo has creído tu ', '', NULL);
 * SELECT foto,titulo,descripcion,fecha_inicio,fecha_fin FROM `promocion`
 * 
 * delete from promocion where promocion.id =3
 * reactivar
 * UPDATE `promocion` SET `fecha_inicio` = '2019-01-30', `fecha_fin` = '2019-01-31' WHERE `promocion`.`id` = 3
 * modificar
 * UPDATE `promocion` SET `titulo` = 'titulo', `descripcion` = 'descripcion', `foto` = 'foto cambiada.url' WHERE `promocion`.`id` = 3
 * 
 */