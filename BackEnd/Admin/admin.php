<?php

include_once '../../libraries.php';

//users();
//promos();
//seguros();
//foro();

function users() {

    $con = dbConnection();
    $sql = "SELECT usuario.id, usuario.correo, usuario.nombre, concat (usuario.apellido1,' ', usuario.apellido2) FROM usuario;";
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        mysqli_close($con);
    } else {

        echo '<thead class="thead-dark">';
        echo '                      <tr>';
        echo '                   <th scope="col">ID</th>';
        echo '                   <th scope="col">Email</th>';
        echo '                   <th scope="col">Nombre</th>';
        echo '                   <th scope="col">Apellidos</th>';
        echo '                   <th scope="col">Acciones</th>';
        echo '               </tr>';
        echo '           </thead>';
        echo '<tbody>';
        echo '            <tr>';
        // echo'<th scope="row">1</th>';



        while ($row = mysqli_fetch_assoc($query)) { // Important line !!! Check summary get row on array ..
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo ' <td colspan="1">
                   <i class="material-icons" onclick="location.href="../Usuario/editUsuarioPerfilForm.php"">mode_edit</i>
                   <i class="material-icons" onclick="">delete_forever</i>
                   </td>';
            echo "</tr>";
        }
        echo '</tbody>';
    }
    //close DB conection
    mysqli_close($con);
}

function promos() {

    $con = dbConnection();
    $sql = "SELECT promocion.id, promocion.fecha_inicio, promocion.fecha_fin, promocion.titulo, promocion.descripcion, promocion.descuento FROM promocion;"; //username is email
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        mysqli_close($con);
    } else {

        echo '<thead class="thead-dark">';
        echo '                      <tr>';
        echo '                   <th scope="col">ID</th>';
        echo '                   <th scope="col">Inicio</th>';
        echo '                   <th scope="col">Fin</th>';
        echo '                   <th scope="col">Título</th>';
        echo '                   <th scope="col">Descripción</th>';
        echo '                   <th scope="col">Descuento</th>';
        echo '                   <th scope="col">Acciones</th>';
        echo '               </tr>';
        echo '           </thead>';
        echo '<tbody>';
        echo '            <tr>';


        while ($row = mysqli_fetch_assoc($query)) { // Important line !!! Check summary get row on array ..
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo ' <td colspan="1">
                   <i class="material-icons" onclick="location.href="../Usuario/editUsuarioPerfilForm.php"">mode_edit</i>
                   <i class="material-icons" onclick="">delete_forever</i>
                   </td>';
            echo "</tr>";
        }
        echo '</tbody>';
    }
    //close DB conection
    mysqli_close($con);
}

function seguros() {

    $con = dbConnection();
    $sql = "SELECT seguro.n_poliza, seguro.cobertura, seguro.importe, seguro.max_asegurado FROM seguro;"; //username is email
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        mysqli_close($con);
    } else {

        echo '<thead class="thead-dark">';
        echo '                      <tr>';
        echo '                   <th scope="col">Póliza</th>';
        echo '                   <th scope="col">Coberturas</th>';
        echo '                   <th scope="col">Importe</th>';
        echo '                   <th scope="col">Máximo asegurado</th>';
        echo '                   <th scope="col">Acciones</th>';
        echo '               </tr>';
        echo '           </thead>';
        echo '<tbody>';
        echo '            <tr>';
        // echo'<th scope="row">1</th>';



        while ($row = mysqli_fetch_assoc($query)) { // Important line !!! Check summary get row on array ..
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo ' <td colspan="1">
                   <i class="material-icons" onclick="location.href="../Usuario/editUsuarioPerfilForm.php"">mode_edit</i>
                   <i class="material-icons" onclick="">delete_forever</i>
                   </td>';
            echo "</tr>";
        }
        echo '</tbody>';
    }
    //close DB conection
    mysqli_close($con);
}

function foro() {

    $con = dbConnection();
    $sql = "SELECT * FROM foro;"; //username is email
    $query = mysqli_query($con, $sql);

    if (!$query) {
        $error = "Error in sql";
        mysqli_close($con);
    } else {

        echo '<thead class="thead-dark">';
        echo '                      <tr>';
        echo '                   <th scope="col">ID</th>';
        echo '                   <th scope="col">Título</th>';
        echo '                   <th scope="col">Etiqueta</th>';
        echo '                   <th scope="col">Acciones</th>';
        echo '               </tr>';
        echo '           </thead>';
        echo '<tbody>';
        echo '            <tr>';
        // echo'<th scope="row">1</th>';



        while ($row = mysqli_fetch_assoc($query)) { // Important line !!! Check summary get row on array ..
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo ' <td colspan="1">
                   <i class="material-icons" onclick="location.href="../Usuario/editUsuarioPerfilForm.php"">mode_edit</i>
                   <i class="material-icons" onclick="">delete_forever</i>
                   </td>';
            echo "</tr>";
        }
        echo '</tbody>';
    }
    //close DB conection
    mysqli_close($con);
}
