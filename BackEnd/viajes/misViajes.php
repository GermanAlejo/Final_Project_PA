<?php

include '../../libraries.php';
//getViajesUsuario();

//this function returns all trips where the user has drive
function getViajesConductor() {

    $error[] = "";

//check if the user is logged
    if (isset($_SESSION['user_id'])) {

//get userID to known which cars to get from DB
        $user_id = $_SESSION['user_id'];

//first conenct to DB
        $con = dbConnection();

        //first get the trip data about the DB
        $sql = "SELECT usuario.nombre,viaje.origen,viaje.destino,viaje.fecha "
                . "FROM viaje join usuario JOIN cliente "
                . "WHERE viaje.conductor_id=" . $user_id . " and viaje.conductor_id=cliente.usuario_id and "
                . "cliente.usuario_id=usuario.id";

        //consulta para obtener nombre (del conductor) fecha origen y destino
        echo $sql;
        $query = mysqli_query($con, $sql);

        if (!$query) {
            $error = "Error in sql";
            mysqli_close($con);
        } else {

//this loop should go to each row of the trips table and store it in an array
            while ($row = mysqli_fetch_assoc($query)) {

                $res[] = array(
                    'name' => $row['nombre'],
                    'date' => $row['fecha'],
                    'from' => $row['origen'],
                    'to' => $row['destino']);
            }


//close DB conection
            mysqli_close($con);

//the array with the tables rows is returnet to the frontend
            print_r($res);
        }
    } else {
        unSetSession();
        $error[] = "The user must be logged-in";
    }

    print_r($error);
}

//returns all trips where the user has been client
function getViajesUsuario() {
    $error[] = "";
    $res = "";
//check if the user is logged
    if (isset($_SESSION['user_id'])) {

//get userID to known which cars to get from DB
        $user_id = $_SESSION['user_id'];

//first conenct to DB
        $con = dbConnection();

        // get the trip data from the DB
        $sql = "SELECT viaje.id,viaje.origen,viaje.destino,viaje.fecha,usuario.nombre "
                . "FROM viajerosClientes JOIN viaje JOIN cliente JOIN usuario "
                . " WHERE viajerosClientes.cliente_id=" . $user_id
                . " AND viajerosClientes.viaje_id=viaje.id and viaje.conductor_id=cliente.usuario_id AND"
                . " cliente.usuario_id=usuario.id";

        //consulta para obtener nombre (del conductor) fecha origen y destino
        // echo $sql;
        $query = mysqli_query($con, $sql);

        if (!$query) {

            $error = "Error in sql";
            mysqli_close($con);
        } else {

//this loop should go to each row of the trips table and store it in an array
            while ($row = mysqli_fetch_assoc($query)) {

                $res[] = array(
                    'id' => $row['id'],
                    'name' => $row['nombre'],
                    'date' => $row['fecha'],
                    'from' => $row['origen'],
                    'to' => $row['destino']);
            }


//close DB conection
            mysqli_close($con);
            return $res;
//the array with the tables rows is returnet to the frontend
            //  print_r($res);
        }
    } else {
        unSetSession();
        $error[] = "The user must be logged-in";
    }

    print_r($error);
    return $res;

    function viajesPendientes() {
        if (isset($_SESSION['user_id'])) {
            $idUser = $_SESSION['user_id'];
            //obtenemos la conexion con la base de datos
            $con = dbConnection();
//creamos la consulta
            $consulta = "SELECT tra.capacidad, tra.descripcion, tra.destino, tra.fecha, tra.hora_salida, tra.id, tra.origen, tra.precio, tra.seguro_id, tra.vehiculo_id FROM viaje tra, viajerosclientes vi WHERE tra.fecha>=SYSDATE() and vi.viaje_id=tra.id and vi.cliente_id=? or tra.conductor_id=?";
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
            mysqli_stmt_bind_param($stmt, "ss", $idUser, $idUser);
//ejecutamos la consulta
            mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);
//pasamos el resultado de la consulta a un array
            $resultadoArray = mysqli_fetch_assoc($resultado);
            return $resultadoArray;
        }
    }

    function countPendientes() {
        $idUser = $_SESSION['user_id'];
        //obtenemos la conexion con la base de datos
        $con = dbConnection();
//creamos la consulta 
        $consulta = "SELECT COUNT(DISTINCT tra.id) FROM viaje tra, viajerosClientes vi WHERE tra.fecha>=SYSDATE() and vi.viaje_id=tra.id and vi.cliente_id=? or tra.conductor_id=?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
//metemos las variables a la consulta
        mysqli_stmt_bind_param($stmt, "ss", $idUser, $idUser);
//ejecutamos la consulta
        mysqli_stmt_execute($stmt);
//guardamos el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
        return $resultado;
    }

}
