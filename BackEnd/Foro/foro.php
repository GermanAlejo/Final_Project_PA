<?php

include 'listComentarios.php';

class foro {

    public $idForo;
    public $titulo;
    public $listComentarios;

    function __construct() {
        $this->listComentarios = new listComentarios();
    }

    function getIdForo() {
        return $this->idForo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setIdForo($idForo) {
        $this->idForo = $idForo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function consultaForo() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "SELECT fo.titulo, fo.etiqueta FROM FORO fo WHERE fo.id = ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos la variable a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idForo);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
        $fila = mysqli_fetch_assoc($resultado);
//devolvemos el resultado en orden titulo, etiqueta
        return $fila;
    }

    function crearForo() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $crear = "INSERT INTO foro (titulo) VALUES (?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $crear);
//metemos la variable a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->titulo);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    function borrarForo() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $borrar = "DELETE FROM foro fo WHERE fo.id = ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $borrar);
//metemos la variable a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idForo);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    //"UPDATE foro SET titulo = ?, etiqueta = ? WHERE foro.id = ?";
    function modifForo() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $modificar = "UPDATE foro SET";
        if ($foroTitulo !== "") {
            $modificar += "";
        }
        $modificar1 = "UPDATE foro SET titulo = ?, etiqueta = ? WHERE foro.id = ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $modificar);
//metemos la variable a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idForo);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

}

/*
 * 
 * INSERT INTO `foro` (`id`, `titulo`, `etiqueta`) VALUES (NULL, 'titulo del foro', 'memes');
 * DELETE FROM `foro` WHERE `foro`.`id` = 2
 * UPDATE `foro` SET `titulo` = 'titulo nuevo', `etiqueta` = 'nueva etiqueta' WHERE `foro`.`id` = 2
 * SELECT titulo,etiqueta from foro
 */