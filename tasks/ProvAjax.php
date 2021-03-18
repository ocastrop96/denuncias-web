<?php
require_once "../controllers/utilitariosControlador.php";
require_once "../models/utilitariosModel.php";

class AjaxProvincia{
    public $idProvi;
    public function ajaxListarProvincia()
    {
        $item = "idProv";
        $valor = $this->idProvi;

        $respuesta = ControladorUtilitarios::ctrListarProvincias($item,$valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idProvi"])) {
    $Provincia = new AjaxProvincia();
    $Provincia -> idProvi = $_POST["idProvi"];
    $Provincia -> ajaxListarProvincia();
}