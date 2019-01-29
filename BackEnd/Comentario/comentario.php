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
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "INSERT INTO mensaje (foro_id, autor_id, mensaje) VALUES (NULL, '?', '?', '?')";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "sss", $this->foro_id, $this->autor_id, $this->mensaje);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    function consultarComentario() {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "SELECT usuario.nombre,mensaje.mensaje FROM mensaje JOIN usuario WHERE mensaje.foro_id=? and usuario.id=?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "ss", $this->foro_id, $this->autor_id);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
        $fila = mysqli_fetch_assoc($resultado);
        $this->nomAutor = $fila[0];
        $this->mensaje = $fila[1];
        $this->idComentario = $fila[2]; //faltan en la consulta
        $this->foro_id = $fila[3]; //
        $this->autor_id = $fila[4]; //
    }

    function eliminarComentario() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "delete from mensaje where mensaje.id=?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idComentario);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

}
