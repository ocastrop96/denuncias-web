<?php
// Controladores
require_once "controllers/plantillaControlador.php";
require_once "controllers/utilitariosControlador.php";
// Modelos
require_once "models/utilitariosModel.php";

$WebDenuncia = new ControladorPlantillaDenuncia();
$WebDenuncia -> ctrPlantillaDenuncia();