<?php
require_once "../controllers/utilitariosControlador.php";
require_once "../models/utilitariosModel.php";

class AjaxDenunciante{
    public $idTipPer;
    public function ajaxListarDenunciante()
    {
        $item = "idtipPersona";
        $valor = $this->idTipPer;

        $respuesta = ControladorUtilitarios::ctrListarTipoPersona($item,$valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idTipPer"])) {
    $TDenunciante = new AjaxDenunciante();
    $TDenunciante -> idTipPer = $_POST["idTipPer"];
    $TDenunciante -> ajaxListarDenunciante();
}