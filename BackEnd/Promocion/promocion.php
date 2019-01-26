<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of promocion
 *
 * @author Racso
 */
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


    
}
