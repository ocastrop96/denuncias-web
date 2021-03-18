<?php
require_once "../controllers/utilitariosControlador.php";
require_once "../models/utilitariosModel.php";

class AjaxTipoDoc
{
    public $idTipoDoc;
    public function ajaxListarTipoDoc()
    {
        $item = "idTipoDoc";
        $valor = $this->idTipoDoc;

        $respuesta = ControladorUtilitarios::ctrListarTipoDocumento($item,$valor);
        echo json_encode($respuesta);
    }
}
if(isset($_POST["idTipoDoc"])){

	$tipoDoc = new AjaxTipoDoc();
	$tipoDoc -> idTipoDoc = $_POST["idTipoDoc"];
	$tipoDoc -> ajaxListarTipoDoc();
}