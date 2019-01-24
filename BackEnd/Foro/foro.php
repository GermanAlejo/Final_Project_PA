<?php

function consultaForo($nomForo) {
    //obtenemos la conexion con la base de datos
    $con = dbConnection();
    //creamos la consulta
    $buscarUsuario = "SELECT fo.titulo, fo.etiqueta FROM FORO fo WHERE fo.titulo = ?";
    
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $buscarUsuario);
    //metemos la variable a la consulta
    mysqli_stmt_bind_param($stmt, "s", $nomForo);
    //ejecutamos la consulta
    mysqli_stmt_execute($stmt);
    //guardamos el resultado de la consulta
    $resultado = mysqli_stmt_get_result($stmt);
    //pasamos el resultado de la consulta a un array
    $fila = mysqli_fetch_assoc($resultado);
    //devolvemos el resultado en orden titulo, etiqueta
    return $fila;
}

function crearForo(){
    
}