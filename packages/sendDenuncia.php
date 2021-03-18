<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal de Denuncias Anticorrución HNSEB">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Denuncias Anticorrupción | HNSEB</title>
    <link rel="icon" href="../views/assets/img/logo-denuncia.png" type="image/x-icon">
    <link rel="shortcut icon" href="../views/assets/img/logo-denuncia.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../views/assets/img/logo-denuncia.png">
    <!-- CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../views/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../views/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../views/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../views/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <!-- Toastr -->
    <link rel="stylesheet" href="../views/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../views/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../views/assets/css/loader.css">
    <link rel="stylesheet" href="../views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- CSS -->

    <!-- JS -->
    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../views/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Select2 ../-->
    <script src="../views/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstra../p4 Duallistbox -->
    <script src="../views/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMas../k -->
    <script src="../views/plugins/moment/moment.min.js"></script>
    <script src="../views/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-ran../ge-picker -->
    <script src="../views/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstra../p color picker -->
    <script src="../views/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdo../minus Bootstrap 4 -->
    <script src="../views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../views/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
    <script src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../views/plugins/toastr/toastr.min.js"></script>
    <!-- jquery-v../alidation -->
    <script src="../views/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../views/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE../ App -->
    <script src="../views/assets/js/adminlte.min.js"></script>
    <script src="../views/plugins/bbox/js/bootbox.min.js"></script>
    <script src="../views/plugins/bbox/js/bootbox.locales.min.js"></script>
    <script src="../views/assets/js/formdenuncia.js"></script>
    <script src="../views/assets/js/loader.js"></script>
    <script src="../views/assets/js/setters.js"></script>
    <!-- JS -->
</head>

<body class="hold-transition layout-top-nav">
    <div class="contenedor_loader">
        <div class="loader">
        </div>
    </div>
    <?php
    require_once "../models/connectDB.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "../phpmailer/Exception.php";
    require "../phpmailer/PHPMailer.php";
    require "../phpmailer/SMTP.php";
    error_reporting(0);
    // Datos Iniciales de Denuncia
    date_default_timezone_set('America/Lima');
    $FechaDenuncia = date('Y-m-d');
    // Datos Iniciales de Denuncia

    // Datos de Denuncia Persona Natural
    $tDocN = $_POST["dNTipDoc"];
    $nDocN = $_POST["dNnDoc"];
    $nombN = $_POST["dNnomb"];
    $aPN = $_POST["dNapPat"];
    $aMN = $_POST["dNapMat"];
    $depN = $_POST["dNDep"];
    $provN = $_POST["dNProv"];
    $distN = $_POST["dNDist"];
    $domN = $_POST["dNDom"];
    $emailN = $_POST["dNEmail"];
    $telN = $_POST["dNTel"];
    $celN = $_POST["dNCel"];
    $resN = $_POST["dNReserva"];
    // Datos de Denuncia Persona Natural

    // Datos de Denuncia Persona Jurídica
    $rucJ = $_POST["dJRuc"];
    $razJ = $_POST["dJRazon"];
    $tDocJ = $_POST["dJTipDoc"];
    $nDocJ = $_POST["dJnDoc"];
    $nombJ = $_POST["dJnomb"];
    $aPJ = $_POST["dJapPat"];
    $aMJ = $_POST["dJapMat"];
    $depJ = $_POST["dJDep"];
    $provJ = $_POST["dJProv"];
    $distJ = $_POST["dJDist"];
    $domJ = $_POST["dJDom"];
    $emailJ = $_POST["dJEmail"];
    $telJ = $_POST["dJTel"];
    $celJ = $_POST["dJCel"];
    $resJ = $_POST["dJReserva"];
    // Datos de Denuncia Persona Jurídica
    // Datos de Denuncia Persona Anonimo
    $emailDA = $_POST["dAEmail"];
    $telDA = $_POST["dATel"];
    $celDA = $_POST["dACel"];
    // Datos de la denuncia
    $tipDen = $_POST["cboTPersona"];
    $descDen = $_POST["ddDetalle"];
    $listDen = $_POST["listaServidores"];
    $confPDen = $_POST["dMPruebas"];
    $ubiPDen = $_POST["ddUbPruebas"];
    $compDen = $_POST["ddDisposicion"];
    $confCorreo = $_POST["ddConfirmaEmail"];
    // Datos de la denuncia
    // Adjuntos para enviar
    $adj1 = $_FILES["ddArch1"]["name"];
    $tmp1 = $_FILES["ddArch1"]["tmp_name"];
    $adj2 = $_FILES["ddArch2"]["name"];
    $tmp2 = $_FILES["ddArch2"]["tmp_name"];
    $adj3 = $_FILES["ddArch3"]["name"];
    $tmp3 = $_FILES["ddArch3"]["tmp_name"];
    // Adjuntos para enviar

    // Información para los correos
    $iTipoDenuncia = $_POST["dCNTDenun"];
    // Natural
    $iTipoDocN = $_POST["dCNTipDoc"];
    $iDepN = $_POST["dCNDep"];
    $iProvN = $_POST["dCNProv"];
    $iDistN = $_POST["dCNDist"];
    // Natural

    // Juridica
    $iTipoDocJ = $_POST["dCJTipDoc"];
    $iDepJ = $_POST["dCJDep"];
    $iProvJ = $_POST["dCJProv"];
    $iDistJ = $_POST["dCJDist"];
    // Juridica
    // Información para los correos

    // Registro de  Denunciante Persona Natural
    if (isset($tipDen) && $tipDen == 1) {
        // Validación de empty()
        if (
            !empty($tDocN) &&
            !empty($nDocN) &&
            !empty($nombN) &&
            !empty($aPN) &&
            !empty($aMN) &&
            !empty($depN) &&
            !empty($provN) &&
            !empty($distN) &&
            !empty($domN) &&
            !empty($emailN) &&
            !empty($resN) &&
            !empty($descDen) &&
            !empty($listDen) &&
            !empty($confPDen) &&
            !empty($compDen) &&
            !empty($confCorreo)
        ) {
            if ($tDocN > 0 && $depN > 0 && $provN > 0 && $distN > 0 && $confCorreo == 1 && $listDen != "[]" && $listDen != "") {
                if ($telN == "") {
                    $telN1 = "SIN-DATOS";
                } else {
                    $telN1 = $telN;
                }
                if ($celN == "") {
                    $celN1 = "SIN-DATOS";
                } else {
                    $celN1 = $celN;
                }
                if ($ubiPDen == "") {
                    $ubiPDen1 = "SIN-DATOS";
                } else {
                    $ubiPDen1 = $ubiPDen;
                }
                // Ejecutar Procedimiento almacenado
                $query1 = $db->query("CALL REG_DEN_NATURAL('$FechaDenuncia', '$tipDen','$tDocN','$nDocN', '$nombN', '$aPN', '$aMN','$depN','$provN','$distN','$domN', '$emailN','$telN1','$celN1','$resN','$descDen','$listDen','$confPDen','$ubiPDen1','$compDen','$confCorreo')");
                // Ejecutar Procedimiento almacenado
                if ($query1 == true) {
                    $cuerpoDenunciante = "";
                    $destinoDenunciante = $emailN;
                    $asuntoDenunciante = "Registro de Denuncia Web";

                    $cuerpoOfice = "";
                    $destinoOfice = "denuncias@hnseb.gob.pe";
                    $asuntoOfice = "Información de Registro de Denuncia Web";
                    // Mensaje de Confirmación
                    echo '<script>
                            Swal.fire({
                            type: "success",
                            title: "¡Su denuncia ha sido registrada exitosamente!. Nos estaremos comunicando con Ud. a través del correo electrónico ingresado.",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            function redirect() {
                                window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                            }
                            setTimeout(redirect, 1500);
                            </script>';
                    // Mensaje de Confirmación
                    // Envío de correo a Denunciante
                    $mailDenunciante = new PHPMailer(true);
                    $mailOfice1 = new PHPMailer(true);

                    $destDen = $nombN . " " . $aPN . " " . $aMN;

                    $cuerpoDenunciante = '<div style="margin:0;padding:0">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="padding:10px 0 30px 0">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                    <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:24px">
                                                                    <b>
                                                                        <h4>Registro de Denuncia Virtual: </h4>
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0px 0 5px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                    <h3>Estimado(a): ' . $destDen . '</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                    Su denuncia ha sido registrada con éxito. Nos estaremos comunicando con Ud. a través del correo electrónico registrado.<br></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                                        Denuncias Anticorrupcion - Portal</b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                    $fRegistro = date("d-m-Y", strtotime($FechaDenuncia));
                    $cuerpoOfice = '<div style="margin:0;padding:0">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:10px 0 30px 0">
                                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                                        <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:20px">
                                                                                        <b>
                                                                                            <h4><u>Denuncia Web Registrada: </u></h4>
                                                                                        </b></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:0px 0px 0px 0px;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <h4>Fecha de Registro: ' . $fRegistro . '</h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:0px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <h3><u>Datos del Denunciante</u></h3>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Tipo de Denunciante :</b> ' . $iTipoDenuncia . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>' . $iTipoDocN . ' :</b> ' . $nDocN . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Nombres y Apellidos :</b> ' . $destDen . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Ubigeo :</b> ' . $iDepN . '-' . $iProvN . '-' . $iDistN . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Domicilio :</b> ' . $domN . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Correo :</b> ' . $emailN . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>¿Con reserva de identidad? :</b> ' . $resN . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Teléfono :</b> ' . $telN1 . '</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Celular :</b> ' . $celN1 . '</td>
                                                                                </tr>
                                                                                <br><br>
                                                                                <tr>
                                                                                    <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <h3><u>Datos de la Denuncia</u></h3>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <b>Descripción de la Denuncia :</b></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <p> ' . $descDen . '</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                        <h3><u>Servidores denunciados</u></h3>
                                                                                    </td>
                                                                                </tr>';

                    $listServ = json_decode($_POST["listaServidores"], true);
                    foreach ($listServ as $key => $value) {
                        $cuerpoOfice .= '<tr><td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                        <p><b>Servidor Denunciado N°:</b> ' . $value["id"] . '</p>
                        <p><b>Nombres :</b> ' . $value["nombres"] . '</p>
                        <p><b>Oficina :</b> ' . $value["oficina"] . '</p>
                        <p><b>Cargo :</b> ' . $value["cargo"] . '</p>
                    </td></tr><br><br>';
                    }
                    $cuerpoOfice .= '<tr>
                                        <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                            <b>¿Adjunta medios probatorios? :</b> ' . $confPDen . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                            <b>Ubicación externa de pruebas :</b></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                            <p>' . $ubiPDen1 . '</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                            <b>Compromiso de Disposición :</b> ' . $compDen . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                            <b>Nota: Cualquier comunicación respecto a la denuncia, comunicarse al correo del denunciante</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                                Denuncias Anticorrupción - Portal</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>';
                    try {
                        $mailDenunciante->SMTPDebug = 0;
                        $mailDenunciante->isSMTP();
                        $mailDenunciante->Host = 'mail.olgercastropalacios.com';
                        $mailDenunciante->SMTPAuth = true;
                        $mailDenunciante->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailDenunciante->Password = '.^P;mSX.{.}q';
                        $mailDenunciante->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailDenunciante->Port = 465;

                        $mailOfice1->SMTPDebug = 0;
                        $mailOfice1->isSMTP();
                        $mailOfice1->Host = 'mail.olgercastropalacios.com';
                        $mailOfice1->SMTPAuth = true;
                        $mailOfice1->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailOfice1->Password = '.^P;mSX.{.}q';
                        $mailOfice1->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailOfice1->Port = 465;

                        // Recipientes
                        $mailDenunciante->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailOfice1->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailDenunciante->addAddress($destinoDenunciante);
                        $mailOfice1->addAddress($destinoOfice);
                        $mailDenunciante->addReplyTo('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        // Adjuntos
                        if (!empty($adj1)) {
                            $path1 = 'upload/' . $adj1;
                            move_uploaded_file($tmp1, $path1);
                            $mailOfice1->addAttachment($path1);
                        }
                        if (!empty($adj2)) {
                            $path2 = 'upload/' . $adj2;
                            move_uploaded_file($tmp2, $path2);
                            $mailOfice1->addAttachment($path2);
                        }
                        if (!empty($adj3)) {
                            $path3 = 'upload/' . $adj3;
                            move_uploaded_file($tmp3, $path3);
                            $mailOfice1->addAttachment($path3);
                        }
                        // Adjuntos
                        $mailDenunciante->Subject = $asuntoDenunciante;
                        $mailOfice1->Subject = $asuntoOfice;
                        $mailDenunciante->isHTML(true);
                        $mailOfice1->isHTML(true);
                        $mailDenunciante->CharSet = "utf-8";
                        $mailOfice1->CharSet = "utf-8";
                        $mailDenunciante->Body = $cuerpoDenunciante;
                        $mailOfice1->Body = $cuerpoOfice;
                        $mailDenunciante->send();
                        $mailOfice1->send();
                    } catch (Exception $e) {
                        echo "Hubo un error al enviar: {$mailDenunciante->ErrorInfo}";
                        echo "Hubo un error al enviar: {$mailOfice1->ErrorInfo}";
                    }
                    // Envío de correo a Denunciante
                } else {
                    echo '<script>
                            Swal.fire({
                            type: "error",
                            title: "Faltan datos, por favor verifique",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            function redirect() {
                                window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                            }
                            setTimeout(redirect, 1500);
                        </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Registre sus datos correctamente",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                </script>';
        }
    }
    // Registro de  Denunciante Persona Natural

    // Registro de  Denunciante Persona Jurídica
    elseif (isset($tipDen) && $tipDen == 2) {
        // Validación de empty()
        if (
            !empty($tDocJ) &&
            !empty($rucJ) &&
            !empty($razJ) &&
            !empty($nDocJ) &&
            !empty($nombJ) &&
            !empty($aPJ) &&
            !empty($aMJ) &&
            !empty($depJ) &&
            !empty($provJ) &&
            !empty($distJ) &&
            !empty($domJ) &&
            !empty($emailJ) &&
            !empty($resJ) &&
            !empty($descDen) &&
            !empty($listDen) &&
            !empty($confPDen) &&
            !empty($compDen) &&
            !empty($confCorreo)
        ) {
            if ($tDocJ > 0 && $depJ > 0 && $provJ > 0 && $distJ > 0 && $confCorreo == 1 && $listDen != "[]" && $listDen != "") {
                if ($telJ == "") {
                    $telJ1 = "SIN-DATOS";
                } else {
                    $telJ1 = $telJ;
                }
                if ($celJ == "") {
                    $celJ1 = "SIN-DATOS";
                } else {
                    $celJ1 = $celJ;
                }
                if ($ubiPDen == "") {
                    $ubiPDen2 = "SIN-DATOS";
                } else {
                    $ubiPDen2 = $ubiPDen;
                }

                // Ejecutar Procedimiento almacenado
                $query2 = $db->query("CALL REG_DEN_JURIDICA('$FechaDenuncia', '$tipDen','$tDocJ','$rucJ','$razJ','$nDocJ', '$nombJ', '$aPJ', '$aMJ','$depJ','$provJ','$distJ','$domJ', '$emailJ','$telJ1','$celJ1','$resJ','$descDen','$listDen','$confPDen','$ubiPDen2','$compDen','$confCorreo')");
                if ($query2 == true) {
                    $cuerpoDenunciante2 = "";
                    $destinoDenunciante2 = $emailJ;
                    $asuntoDenunciante2 = "Registro de Denuncia Web";

                    $cuerpoOfice2 = "";
                    $destinoOfice2 = "denuncias@hnseb.gob.pe";
                    $asuntoOfice2 = "Información de Registro de Denuncia Web";
                    // Mensaje de Confirmación
                    echo '<script>
                            Swal.fire({
                            type: "success",
                            title: "¡Su denuncia ha sido registrada exitosamente!. Nos estaremos comunicando con Ud. a través del correo electrónico ingresado.",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            function redirect() {
                                window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                            }
                            setTimeout(redirect, 1500);
                            </script>';
                    // Mensaje de Confirmación
                    // Envío de correo a Denunciante
                    $mailDenunciante2 = new PHPMailer(true);
                    $mailOfice2 = new PHPMailer(true);
                    $destRep = $nombJ . " " . $aPJ . " " . $aMJ;
                    $cuerpoDenunciante2 = '<div style="margin:0;padding:0">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="padding:10px 0 30px 0">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                        <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:24px">
                                                                        <b>
                                                                            <h4>Registro de Denuncia Virtual: </h4>
                                                                        </b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:0px 0 5px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                        <h3>Estimado(a): ' . $destRep . ' representante de ' . $razJ . ' con RUC N° ' . $rucJ . '</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                        Su denuncia ha sido registrada con éxito. Nos estaremos comunicando con Ud. a través del correo electrónico registrado.<br></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                                            Denuncias Anticorrupcion - Portal</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                    $fRegistro2 = date("d-m-Y", strtotime($FechaDenuncia));
                    $cuerpoOfice2 = '<div style="margin:0;padding:0">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="padding:10px 0 30px 0">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                    <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:20px">
                                                                    <b>
                                                                        <h4><u>Denuncia Web Registrada: </u></h4>
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0px 0px 0px 0px;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h4>Fecha de Registro: ' . $fRegistro2 . '</h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Datos del Denunciante</u></h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Tipo de Denunciante :</b> ' . $iTipoDenuncia . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>RUC :</b> ' . $rucJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Razón Social :</b> ' . $razJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:6px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b><u>Representante</u></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>' . $iTipoDocJ . ' :</b> ' . $nDocJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Nombres y Apellidos :</b> ' . $destRep . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                <b>Ubigeo :</b> ' . $iDepJ . '-' . $iProvJ . '-' . $iDistJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Domicilio :</b> ' . $domJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Correo :</b> ' . $emailJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>¿Con reserva de identidad? :</b> ' . $resJ . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Teléfono :</b> ' . $telJ1 . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Celular :</b> ' . $celJ1 . '</td>
                                                            </tr>
                                                            <br><br>
                                                            <tr>
                                                                <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Datos de la Denuncia</u></h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Descripción de la Denuncia :</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                <p> ' . $descDen . '</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Servidores denunciados</u></h3>
                                                                </td>
                                                            </tr>';
                    $listServ2 = json_decode($_POST["listaServidores"], true);
                    foreach ($listServ2 as $key => $value) {
                        $cuerpoOfice2 .= '<tr><td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                <p><b>Servidor Denunciado N°:</b> ' . $value["id"] . '</p>
                                                                <p><b>Nombres :</b> ' . $value["nombres"] . '</p>
                                                                <p><b>Oficina :</b> ' . $value["oficina"] . '</p>
                                                                <p><b>Cargo :</b> ' . $value["cargo"] . '</p>
                                                            </td></tr>';
                    }
                    $cuerpoOfice2 .= '<tr>
                    <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                        <b>¿Adjunta medios probatorios? :</b> ' . $confPDen . '</td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Ubicación externa de pruebas :</b></td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <p>' . $ubiPDen2 . '</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Compromiso de Disposición :</b> ' . $compDen . '</td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Nota: Cualquier comunicación respecto a la denuncia, comunicarse al correo del denunciante</b></td>
                            </tr>
                        </tbody>
                        </table>
                        </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                            Denuncias Anticorrupción - Portal</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </div>';
                    try {
                        $mailDenunciante2->SMTPDebug = 0;
                        $mailDenunciante2->isSMTP();
                        $mailDenunciante2->Host = 'mail.olgercastropalacios.com';
                        $mailDenunciante2->SMTPAuth = true;
                        $mailDenunciante2->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailDenunciante2->Password = '.^P;mSX.{.}q';
                        $mailDenunciante2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailDenunciante2->Port = 465;

                        $mailOfice2->SMTPDebug = 0;
                        $mailOfice2->isSMTP();
                        $mailOfice2->Host = 'mail.olgercastropalacios.com';
                        $mailOfice2->SMTPAuth = true;
                        $mailOfice2->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailOfice2->Password = '.^P;mSX.{.}q';
                        $mailOfice2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailOfice2->Port = 465;

                        // Recipientes
                        $mailDenunciante2->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailOfice2->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailDenunciante2->addAddress($destinoDenunciante2);
                        $mailOfice2->addAddress($destinoOfice2);
                        $mailDenunciante2->addReplyTo('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        // Adjuntos
                        if (!empty($adj1)) {
                            $path11 = 'upload/' . $adj1;
                            move_uploaded_file($tmp1, $path11);
                            $mailOfice2->addAttachment($path11);
                        }
                        if (!empty($adj2)) {
                            $path21 = 'upload/' . $adj2;
                            move_uploaded_file($tmp2, $path21);
                            $mailOfice2->addAttachment($path21);
                        }
                        if (!empty($adj3)) {
                            $path31 = 'upload/' . $adj3;
                            move_uploaded_file($tmp3, $path31);
                            $mailOfice2->addAttachment($path31);
                        }
                        // Adjuntos
                        $mailDenunciante2->Subject = $asuntoDenunciante2;
                        $mailOfice2->Subject = $asuntoOfice2;
                        $mailDenunciante2->isHTML(true);
                        $mailOfice2->isHTML(true);
                        $mailDenunciante2->CharSet = "utf-8";
                        $mailOfice2->CharSet = "utf-8";
                        $mailDenunciante2->Body = $cuerpoDenunciante2;
                        $mailOfice2->Body = $cuerpoOfice2;
                        $mailDenunciante2->send();
                        $mailOfice2->send();
                    } catch (Exception $e) {
                        echo "Hubo un error al enviar: {$mailDenunciante2->ErrorInfo}";
                        echo "Hubo un error al enviar: {$mailOfice2->ErrorInfo}";
                    }
                } else {
                    echo '<script>
                            Swal.fire({
                            type: "error",
                            title: "Faltan datos, por favor verifique",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            function redirect() {
                                window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                            }
                            setTimeout(redirect, 1500);
                        </script>';
                }
            } else {
                echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Ingrese correctamente sus datos",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Registre sus datos correctamente",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                </script>';
        }
    }
    // Registro de  Denunciante Persona Jurídica

    // Registro de  Denunciante Anónimo
    elseif (isset($tipDen) && $tipDen == 3) {
        // Validación de empty()
        if (
            !empty($emailDA) &&
            !empty($descDen) &&
            !empty($listDen) &&
            !empty($confPDen) &&
            !empty($compDen) &&
            !empty($confCorreo)
        ) {
            if ($confCorreo == 1 && $listDen != "[]" && $listDen != "") {
                if ($telDA == "") {
                    $telDA1 = "SIN-DATOS";
                } else {
                    $telDA1 = $telDA;
                }
                if ($celDA == "") {
                    $celDA1 = "SIN-DATOS";
                } else {
                    $celDA1 = $celDA;
                }
                if ($ubiPDen == "") {
                    $ubiPDen3 = "SIN-DATOS";
                } else {
                    $ubiPDen3 = $ubiPDen;
                }
                // Ejecutar Procedimiento almacenado
                $query3 = $db->query("CALL REG_DEN_ANONIMO('$FechaDenuncia','$tipDen','$emailDA','$telDA1','$celDA1','$descDen','$listDen','$confPDen','$ubiPDen3','$compDen','$confCorreo')");
                // Ejecutar Procedimiento almacenado
                if ($query3 == true) {
                    $cuerpoDenunciante3 = "";
                    $destinoDenunciante3 = $emailDA;
                    $asuntoDenunciante3 = "Registro de Denuncia Web";

                    $cuerpoOfice3 = "";
                    $destinoOfice3 = "denuncias@hnseb.gob.pe";
                    $asuntoOfice3 = "Información de Registro de Denuncia Web";
                    // Mensaje de Confirmación
                    echo '<script>
                     Swal.fire({
                     type: "success",
                     title: "¡Su denuncia ha sido registrada exitosamente!. Nos estaremos comunicando con Ud. a través del correo electrónico ingresado.",
                     showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                     </script>';
                    // Mensaje de Confirmación
                    $mailDenunciante3 = new PHPMailer(true);
                    $mailOfice3 = new PHPMailer(true);

                    $cuerpoDenunciante3 = '<div style="margin:0;padding:0">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="padding:10px 0 30px 0">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                        <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:24px">
                                                                        <b>
                                                                            <h4>Registro de Denuncia Virtual: </h4>
                                                                        </b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:0px 0 5px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                        <h3>Estimado(a) Usuario:</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px">
                                                                        Su denuncia ha sido registrada con éxito. Nos estaremos comunicando con Ud. a través del correo electrónico registrado.<br></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                                            Denuncias Anticorrupcion - Portal</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                    $fRegistro3 = date("d-m-Y", strtotime($FechaDenuncia));
                    $cuerpoOfice3 = '<div style="margin:0;padding:0">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="padding:10px 0 30px 0">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc;border-collapse:collapse;max-width:600px;width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="center" bgcolor="#5d7a8a" style="color:#5d7a8a;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">
                                                    <img src="https://portal.hnseb.gob.pe/wp-content/uploads/2020/09/portal-anticorrupcion.png" alt="Portal Anticorrupcion" width="500" height="190" style="display:block" class="CToWUd a6T" tabindex="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding:20px 30px 40px 30px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="color:#0d2e3b;font-family:Arial,sans-serif;font-size:20px">
                                                                    <b>
                                                                        <h4><u>Denuncia Web Registrada: </u></h4>
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0px 0px 0px 0px;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h4>Fecha de Registro: ' . $fRegistro3 . '</h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Datos del Denunciante</u></h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Tipo de Denunciante :</b> ' . $iTipoDenuncia . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Correo :</b> ' . $emailDA . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Teléfono :</b> ' . $telDA1 . '</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:2px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Celular :</b> ' . $celDA1 . '</td>
                                                            </tr>
                                                            <br><br>
                                                            <tr>
                                                                <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Datos de la Denuncia</u></h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <b>Descripción de la Denuncia :</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                <p> ' . $descDen . '</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:15px 0 0px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                    <h3><u>Servidores denunciados</u></h3>
                                                                </td>
                                                            </tr>';
                    $listServ3 = json_decode($_POST["listaServidores"], true);
                    foreach ($listServ3 as $key => $value) {
                        $cuerpoOfice3 .= '<tr><td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                                                                                        <p><b>Servidor Denunciado N°:</b> ' . $value["id"] . '</p>
                                                                                                        <p><b>Nombres :</b> ' . $value["nombres"] . '</p>
                                                                                                        <p><b>Oficina :</b> ' . $value["oficina"] . '</p>
                                                                                                        <p><b>Cargo :</b> ' . $value["cargo"] . '</p>
                                                                                                    </td></tr>';
                    }
                    $cuerpoOfice3 .= '<tr>
                    <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                        <b>¿Adjunta medios probatorios? :</b> ' . $confPDen . '</td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Ubicación externa de pruebas :</b></td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <p>' . $ubiPDen3 . '</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Compromiso de Disposición :</b> ' . $compDen . '</td>
                            </tr>
                            <tr>
                                <td style="padding:3px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:16px">
                                    <b>Nota: Cualquier comunicación respecto a la denuncia, comunicarse
                                        al correo del denunciante</b></td>
                            </tr>
                        </tbody>
                        </table>
                            </td>
                            </tr>
                            <tr>
                                <td bgcolor="#05171f" style="padding:30px 30px 30px 30px">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="color:#ffffff;font-family:Arial,sans-serif;font-size:13px" width="75%"><b>Oficina de Control Interno - HNSEB &copy;2021
                                                        Denuncias Anticorrupción - Portal</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </div>';

                    try {
                        $mailDenunciante3->SMTPDebug = 0;
                        $mailDenunciante3->isSMTP();
                        $mailDenunciante3->Host = 'mail.olgercastropalacios.com';
                        $mailDenunciante3->SMTPAuth = true;
                        $mailDenunciante3->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailDenunciante3->Password = '.^P;mSX.{.}q';
                        $mailDenunciante3->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailDenunciante3->Port = 465;

                        $mailOfice3->SMTPDebug = 0;
                        $mailOfice3->isSMTP();
                        $mailOfice3->Host = 'mail.olgercastropalacios.com';
                        $mailOfice3->SMTPAuth = true;
                        $mailOfice3->Username = 'reclamoshnseb@olgercastropalacios.com';
                        $mailOfice3->Password = '.^P;mSX.{.}q';
                        $mailOfice3->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mailOfice3->Port = 465;

                        // Recipientes
                        $mailDenunciante3->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailOfice3->setFrom('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        $mailDenunciante3->addAddress($destinoDenunciante3);
                        $mailOfice3->addAddress($destinoOfice3);
                        $mailDenunciante3->addReplyTo('denuncias@hnseb.gob.pe', 'Portal Anticorrupción-HNSEB');
                        // Adjuntos
                        if (!empty($adj1)) {
                            $path12 = 'upload/' . $adj1;
                            move_uploaded_file($tmp1, $path12);
                            $mailOfice3->addAttachment($path12);
                        }
                        if (!empty($adj2)) {
                            $path22 = 'upload/' . $adj2;
                            move_uploaded_file($tmp2, $path22);
                            $mailOfice3->addAttachment($path22);
                        }
                        if (!empty($adj3)) {
                            $path32 = 'upload/' . $adj3;
                            move_uploaded_file($tmp3, $path32);
                            $mailOfice3->addAttachment($path32);
                        }
                        // Adjuntos
                        $mailDenunciante3->Subject = $asuntoDenunciante3;
                        $mailOfice3->Subject = $asuntoOfice3;
                        $mailDenunciante3->isHTML(true);
                        $mailOfice3->isHTML(true);
                        $mailDenunciante3->CharSet = "utf-8";
                        $mailOfice3->CharSet = "utf-8";
                        $mailDenunciante3->Body = $cuerpoDenunciante3;
                        $mailOfice3->Body = $cuerpoOfice3;
                        $mailDenunciante3->send();
                        $mailOfice3->send();
                    } catch (Exception $e) {
                        echo "Hubo un error al enviar: {$mailDenunciante3->ErrorInfo}";
                        echo "Hubo un error al enviar: {$mailOfice3->ErrorInfo}";
                    }
                } else {
                    echo '<script>
                            Swal.fire({
                            type: "error",
                            title: "Faltan datos, por favor verifique",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            function redirect() {
                                window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                            }
                            setTimeout(redirect, 1500);
                        </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                type: "error",
                title: "Ingrese correctamente sus datos",
                showConfirmButton: false,
                timer: 1500
                });
                function redirect() {
                    window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                }
                setTimeout(redirect, 1500);
            </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                    type: "error",
                    title: "Registre sus datos correctamente",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    function redirect() {
                        window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                    }
                    setTimeout(redirect, 1500);
                </script>';
        }
    }
    // Registro de  Denunciante Anónimo

    else {
        echo '<script>
                Swal.fire({
                type: "error",
                title: "Asegúrese de ingresar sus datos correctamente",
                showConfirmButton: false,
                timer: 1500
                });
                function redirect() {
                    window.location = "https://transparencia.hnseb.gob.pe/denuncias-web/index.php";
                }
                setTimeout(redirect, 1500);
        </script>';
    }

































    // // Datos de Denuncia Persona Anonimo

    // 
    ?>
</body>

</html>