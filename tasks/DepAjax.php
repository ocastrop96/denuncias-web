<?php
require_once "../controllers/utilitariosControlador.php";
require_once "../models/utilitariosModel.php";

class AjaxDepartamento{
    public $idDepa;
    public function ajaxListarDepartamento()
    {
        $item = "idDep";
        $valor = $this->idDepa;

        $respuesta = ControladorUtilitarios::ctrListarDepartamentos($item,$valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idDepa"])) {
    $Departamento = new AjaxDepartamento();
    $Departamento -> idDepa = $_POST["idDepa"];
    $Departamento -> ajaxListarDepartamento();
}