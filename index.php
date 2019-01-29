<?php

include 'BackEnd/Promocion/listPromociones.php';
include 'BackEnd/Promocion/promociones.php';
include 'BackEnd/Foro/listForo.php';
include 'BackEnd/Foro/foro.php';
include 'BackEnd/Comentario/listComentarios.php';
include 'BackEnd/Comentario/comentario.php';

$A = new listPromociones();
$promo1 = $A->getPromociones(0);
echo $promo1->$idPromocion;

