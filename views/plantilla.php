<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal de Denuncias Anticorrución HNSEB">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Denuncias Anticorrupción | HNSEB</title>
    <link rel="icon" href="views/assets/img/logo-denuncia.png" type="image/x-icon">
    <link rel="shortcut icon" href="views/assets/img/logo-denuncia.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="views/assets/img/logo-denuncia.png">
    <!-- CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="views/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="views/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="views/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <!-- Toastr -->
    <link rel="stylesheet" href="views/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="views/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="views/assets/css/loader.css">
    <link rel="stylesheet" href="views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- CSS -->

    <!-- JS -->
    <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="views/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Select2 -->
    <script src="views/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="views/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="views/plugins/moment/moment.min.js"></script>
    <script src="views/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="views/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="views/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
    <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="views/plugins/toastr/toastr.min.js"></script>
    <!-- jquery-validation -->
    <script src="views/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="views/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/assets/js/adminlte.min.js"></script>
    <script src="views/plugins/bbox/js/bootbox.min.js"></script>
    <script src="views/plugins/bbox/js/bootbox.locales.min.js"></script>
    <script src="views/assets/js/loader.js"></script>
    <script src="views/assets/js/formdenuncia.js"></script>
    <script src="views/assets/js/setters.js"></script>
    <!-- JS -->

</head>

<body class="hold-transition layout-top-nav">
    <div class="contenedor_loader">
        <div class="loader">
        </div>
    </div>
    <?php
    echo '<div class="wrapper"><div class="content-wrapper">';

    include "templates/cabecera.php";
    if (isset($_GET["ruta"])) {
        if ($_GET["ruta"] == "denuncia") {
            include "templates/" . $_GET["ruta"] . ".php";
        } else {
            include "templates/404.php";
        }
    } else {
        include "templates/denuncia.php";
    }
    include "templates/pie.php";
    echo '</div></div>';
    ?>
</body>

</html>