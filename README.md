# Final_Project_PA
Final project for the course PA of university Pablo de Olavide

TODO:

1. Diseño pagina principal
2. Registro
3. Introducir formularios y funcionalidades de login.php en funciones
5. registro no considera las tablas especializadas de los usuarios solo inserta en la tabla usuario y vehiculo en caso de haberlo
6. incrementar valor maximo de logintud para el email
7. Cambiar en header para que cuando el usuario este logeado no se muestre el boton de login y cuando no lo este no se muestre las opciones de ajustes de cuenta

La carpeta DB contiene el .sql de la base de datos, para actualizar el archivo de la base de datos modificar/subir el archivo a esa carpeta.

Posible template para los ajustes de cuenta: https://bootsnipp.com/snippets/M48pA

Pantallas:

-Index: Pagina principal para bucar viajes
-Registro
-login
-Ajustes: pagina para cambiar los parametros del usuario(nombre, correo, añadir vehiculos,...)
-viajes: pagina listando todos los viajes en los que se ha participado
-viajes-conductor: pagina listando los viajes en los que el usuario ha sido conductor
-Planear viaje: Pagina para que lo conductores planeen viajes.
-Valorar: pagina para crear valoraciones sobre viajes y conductores
-Foros: pagina que listara los foros disponibles
-Discusion: pagina para cada foro donde se monstraran los comentarios
-panel de adm
-res-viajes: al realizar una busqueda de viajes en esta pagina se mostrara el resultado de la busqueda mostrando los viajes


Codigo pa despues:
<div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hasCar" onclick="showCarForm('hasCar', 'carValuesID', null, 'on')" unchecked>
                        <label class="form-check-label" for="gridCheck">
                            Do you own a car?
                        </label>
                    </div>
                </div>
                <div id="carValuesID" class="form-row" style="display: none">
                    <div class="form-group col-md-6">
                        <label for="inputCard">Plate Number</label>
                        <input type="text" name="plateNumber" class="form-control">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCard">Car slots</label>

                        <input type="text" name="slots" class="form-control">

                    </div>
                </div>
				
				
				
				//optional values
        if (isset($formInput['cardNumber'])) {
            $cardNumber = $formInput['cardNumber'];
        } else {
            $cardNumber = "";
        }
        if (isset($_POST['plateNumber'])) {
            $plateNumber = $formInput['plateNumber'];
            $rol = "conductor"; //set user rol to driver in case he has a vehicle
        } else {
            $rol = "cliente";
        }
        if (isset($_POST['slots'])) {
            $carSlots = $formInput['slots'];
        } else {
            $carSlots = false;
        }
		
		
		
		
		
        //number of slots in the car are optional thus we check before that they are filled
        if (isset($_POST['slots']) && !empty($_POST['slots'])) {
            if (!filter_var($_POST['slots'], FILTER_VALIDATE_INT)) {
                $error[] = "Slots not valid";
            }
        }
		
		
		
		
		
		
		echo "slots: " . $carSlots;
            //if slots is true means theres a number thus a driver and a car to insert
            if ($carSlots) {
                //sql sentence for inserting vehicle
                $sqlVehicle = "INSERT INTO vehiculo (Matricula, Plazas, Propietario_id)"
                        . " VALUES ('" . $plateNumber . "', '" . $carSlots . "', '" . $user_id
                        . "')";

                //insert vehicle into DB
                $query2 = mysqli_query($con, $sqlVehicle);

                if (!$query2) {
                    $error[] = "Vehicle already registered";
                }
            } else {
                $error[] = "Error iserting vehicle";
            }