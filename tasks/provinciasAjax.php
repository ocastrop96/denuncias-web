<?php
require_once "../models/connectDB.php";
if(isset($_POST["DNDepId"]) && !empty($_POST["DNDepId"])){
    $query = $db->query("CALL LIST_PROV(".$_POST["DNDepId"].")");
    $rowCount = $query->num_rows;

    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Provincia</option>';

        while ($row = $query->fetch_assoc()) {
            echo '<option value="'.$row['idProv'].'">'.$row['descProv'].'</option>';
        }
    }
    else{
        echo '<option value="0">No hay provincias relacionadas</option>';
    }
}
