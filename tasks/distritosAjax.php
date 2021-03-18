<?php
require_once "../models/connectDB.php";
if(isset($_POST["DNProvId"]) && !empty($_POST["DNProvId"])){
    $query = $db->query("CALL LIST_DIST(".$_POST["DNProvId"].")");
    $rowCount = $query->num_rows;

    if ($rowCount > 0) {
        echo '<option value="0">Seleccione Distrito</option>';

        while ($row = $query->fetch_assoc()) {
            echo '<option value="'.$row['idDist'].'">'.$row['descDist'].'</option>';
        }
    }
    else{
        echo '<option value="0">No hay distritos relacionados</option>';
    }
}
