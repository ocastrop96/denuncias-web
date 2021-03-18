<?php
require_once "../controllers/utilitariosControlador.php";
require_once "../models/utilitariosModel.php";

class AjaxDistrito{
    public $idDistr;
    public function ajaxListarDistrito()
    {
        $item = "idDist";
        $valor = $this->idDistr;

        $respuesta = ControladorUtilitarios::ctrListarDistritos($item,$valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idDistr"])) {
    $Distrito = new AjaxDistrito();
    $Distrito -> idDistr = $_POST["idDistr"];
    $Distrito -> ajaxListarDistrito();
}