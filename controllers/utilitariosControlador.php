<?php
class  ControladorUtilitarios
{
    static public function ctrListarTipoPersona($item, $valor)
    {
        $tabla = "da_tab_tipo_persona";
        $respuesta = ModeloUtilitarios::mdlListarTipoPersona($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrListarTipoDocumento($item, $valor)
    {
        $tabla = "da_tab_tipo_doc";
        $respuesta = ModeloUtilitarios::mdlListarTipoDocumento($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrListarDepartamentos($item, $valor)
    {
        $tabla = "da_tab_departamentos";
        $respuesta = ModeloUtilitarios::mdlListarDepartamentos($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrListarProvincias($item, $valor)
    {
        $tabla = "da_tab_provincias";
        $respuesta = ModeloUtilitarios::mdlListarProvincias($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrListarDistritos($item, $valor)
    {
        $tabla = "da_tab_distritos";
        $respuesta = ModeloUtilitarios::mdlListarDistritos($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrListarAreas($item, $valor)
    {
        $tabla = "da_tab_areas";
        $respuesta = ModeloUtilitarios::mdlListarAreas($tabla, $item, $valor);
        return $respuesta;
    }
}
