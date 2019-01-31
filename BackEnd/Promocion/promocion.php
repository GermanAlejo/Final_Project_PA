<?php

class promocion {

    public $idPromocion;
    public $creador_id;
    public $fecha_inicio;
    public $fecha_fin;
    public $titulo;
    public $descripcion;
    public $descuento;
    public $foto;

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

    function getFoto() {
        return $this->foto;
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

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function crearPromocion() {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "INSERT INTO promocion (id, creador_id, fecha_inicio, fecha_fin, titulo, descripcion, descuento, foto) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "sssssss", $this->creador_id, $this->fecha_inicio, $this->fecha_fin, $this->titulo, $this->descripcion, $this->descuento, $this->foto);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    function consultarPromocion() {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consultar = "SELECT foto,titulo,descripcion,fecha_inicio,fecha_fin FROM promocion WHERE promocion.id=?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idPromocion);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
        $fila = mysqli_fetch_assoc($resultado);
        $this->foto = $fila[0];
        $this->titulo = $fila[1];
        $this->descripcion = $fila[2];
        $this->fecha_inicio = $fila[3];
        $this->fecha_fin = $fila[4];
    }

    function modificarPromocion() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "UPDATE promocion SET titulo=?, descripcion=?, foto=? WHERE promocion.id = ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "ssss", $this->titulo, $this->descripcion, $this->foto, $this->idPromocion);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    function reactivar() {
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "UPDATE promocion SET fecha_inicio=?, fecha_fin=? WHERE promocion.id= ?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "sss", $this->fecha_inicio, $this->fecha_fin, $this->idPromocion);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

    function eliminarPromocion() {
//obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta
        $consulta = "delete from promocion where promocion.id =?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "s", $this->idPromocion);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
//devolvemos el resultado,si termino bien o mal la creacion
        return $resultado;
    }

}
/*
function getPromos() {

    $error[] = "";
    $res;
    //user does not need to be logged
//first conenct to DB
    $con = dbConnection();


    //first get the trip data about the DB
    $sql = "SELECT titulo, descripcion, descuento FROM promocion ";

    //echo $sql;
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
      
        mysqli_close($con);
    } else if (mysqli_num_rows($query) === 1) {//check if the result is only one(row)
        $res = mysqli_fetch_array($query);
        
        mysqli_close($con);
    }

    print_r($error);

    //return trip
    return $res;
}*/


