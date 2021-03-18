$(document).ready(function() {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-left",
        preventDuplicates: true,
        onclick: null,
        showDuration: "100",
        hideDuration: "300",
        timeOut: "1500",
        extendedTimeOut: "100",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    // LLenado de listas Ubigeo
    // Persona Natural
    $("#dNDep").on("change", function() {
        var DNDepId = $(this).val();
        if (DNDepId > 0) {
            if (DNDepId) {
                $.ajax({
                    type: "POST",
                    url: "tasks/provinciasAjax.php",
                    data: "DNDepId=" + DNDepId,

                    success: function(html) {
                        $("#dNProv").prop("disabled", false);
                        $("#dNProv").html(html);
                        $("#dNDist").html(
                            '<option value="0">Seleccione provincia primero</option>'
                        );
                    },
                });
            }
        }
    });
    $("#dNProv").on("change", function() {
        var DNProvId = $(this).val();
        if (DNProvId > 0) {
            if (DNProvId) {
                $.ajax({
                    type: "POST",
                    url: "tasks/distritosAjax.php",
                    data: "DNProvId=" + DNProvId,

                    success: function(html) {
                        $("#dNDist").prop("disabled", false);
                        $("#dNDist").html(html);
                    },
                });
            }
        } else {
            $("#dNDist").html(
                '<option value="0">Seleccione provincia primero</option>'
            );
            $("#dNDist").prop("disabled", true);
        }
    });
    // Persona Natural
    // Persona Jurídica
    $("#dJDep").on("change", function() {
        var DJDepId = $(this).val();
        if (DJDepId > 0) {
            if (DJDepId) {
                $.ajax({
                    type: "POST",
                    url: "tasks/provinciasAjax.php",
                    data: "DNDepId=" + DJDepId,

                    success: function(html) {
                        $("#dJProv").prop("disabled", false);
                        $("#dJProv").html(html);
                        $("#dJDist").html(
                            '<option value="0">Seleccione provincia primero</option>'
                        );
                    },
                });
            }
        }
    });
    $("#dJProv").on("change", function() {
        var DJProvId = $(this).val();
        if (DJProvId > 0) {
            if (DJProvId) {
                $.ajax({
                    type: "POST",
                    url: "tasks/distritosAjax.php",
                    data: "DNProvId=" + DJProvId,

                    success: function(html) {
                        $("#dJDist").prop("disabled", false);
                        $("#dJDist").html(html);
                    },
                });
            }
        } else {
            $("#dJDist").html(
                '<option value="0">Seleccione provincia primero</option>'
            );
            $("#dJDist").prop("disabled", true);
        }
    });
    // Persona Jurídica
    // LLenado de listas Ubigeo

    //   Solo ingreso de números
    $("#dNnDoc,#dNTel,#dNCel,#dJRuc,#dJnDoc,#dJTel,#dJCel,#dATel,#dACel").keyup(
        function() {
            this.value = (this.value + "").replace(/[^0-9]/g, "");
        }
    );
    //   Solo ingreso de números
    //   Solo texto
    $(
        "#dNnomb,#dNapPat,#dNapMat,#dJnomb,#dJapPat,#dJapMat,#sNombres,#sApellidos,#sCargo"
    ).keyup(function() {
        this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúüÁÉÍÓÚÜ ]/g, "");
    });
    // Solos texto
    // Razón Social
    $("#dJRazon").keyup(function() {
        this.value = (this.value + "").replace(/[^a-zA-ZñÑáéíóúüÁÉÍÓÚÜ. ]/g, "");
    });
    // Razón Social
    //  RUC
    $("#dJRuc").change(function() {
        var dJRuc = $(this).val();
        if (dJRuc.substr(0, 2) != "20") {
            toastr.error("Debe ingresar un RUC 20 válido", "N° RUC");
            $("#dJRuc").val("");
            $("#dJRuc").focus();
        }
    });
    // RUC
    // Buscar Ruc
    $("#btnRUCj").click(function() {
        let nRUc = $("#dJRuc").val();
        $("#dJRazon").prop("readonly", true);
        $("#dJRazon").val("");
        $.ajax({
            type: "GET",
            url: "https://dniruc.apisperu.com/api/v1/ruc/" +
                nRUc +
                "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {
                $("#dJRazon").val(data["razonSocial"]);
                $("#dJDom").focus();
            },
            failure: function(data) {
                alert("Ha ocurrido un error en la conexión a la consulta de datos");
            },
            error: function(data) {
                $("#dJRazon").prop("readonly", false);
                $("#dJRazon").focus();
                toastr.info("Ingresa tu Razón Social", "Razón Social");
            },
        });
    });
    // Buscar Ruc
    // Validar Correos
    $("#dNEmail").focusout(function() {
        if (
            validadorEmail($("#dNEmail").val()) === false &&
            $("#dNEmail").val() !== ""
        ) {
            toastr.error("Ingrese un correo válido", "E-mail de Denunciante");
            $("#dNEmail").val("");
            $("#dNEmail").focus();
        }
    });
    $("#dJEmail").focusout(function() {
        if (
            validadorEmail($("#dJEmail").val()) === false &&
            $("#dJEmail").val() !== ""
        ) {
            toastr.error("Ingrese un correo válido", "E-mail de Denunciante");
            $("#dJEmail").val("");
            $("#dJEmail").focus();
        }
    });
    $("#dAEmail").focusout(function() {
        if (
            validadorEmail($("#dAEmail").val()) === false &&
            $("#dAEmail").val() !== ""
        ) {
            toastr.error("Ingrese un correo válido", "E-mail de Contacto");
            $("#dAEmail").val("");
            $("#dAEmail").focus();
        }
    });

    // Funcion validadora
    function validadorEmail(email) {
        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        if (regex.test(email)) {
            return true;
        } else {
            return false;
        }
    }
    // Validar Correos

    // Convertir a mayusculas
    $("#dNnomb").keyup(function() {
        var nombdN = $(this).val();
        var mayusnombdN = nombdN.toUpperCase();
        $("#dNnomb").val(mayusnombdN);
    });
    $("#dNapPat").keyup(function() {
        var dNapPat = $(this).val();
        var mayusdNapPat = dNapPat.toUpperCase();
        $("#dNapPat").val(mayusdNapPat);
    });
    $("#dNapMat").keyup(function() {
        var dNapMat = $(this).val();
        var mayusdNapMat = dNapMat.toUpperCase();
        $("#dNapMat").val(mayusdNapMat);
    });
    $("#dNDom").keyup(function() {
        var dNDom = $(this).val();
        var mayusdNDom = dNDom.toUpperCase();
        $("#dNDom").val(mayusdNDom);
    });
    $("#dJRazon").keyup(function() {
        var dJRazon = $(this).val();
        var mayusdJRazon = dJRazon.toUpperCase();
        $("#dJRazon").val(mayusdJRazon);
    });
    $("#dJDom").keyup(function() {
        var dJDom = $(this).val();
        var mayusdJDom = dJDom.toUpperCase();
        $("#dJDom").val(mayusdJDom);
    });
    // Convertir a mayusculas
    // Validar Campos Domicilio
    // Domicilio Natural
    $("#dNDom").focusout(function() {
        if (
            validaDomicilio($("#dNDom").val()) === false &&
            $("#dNDom").val() !== ""
        ) {
            toastr.error("Ingrese un domicilio válido", "Domicilio de Denunciante");
            $("#dNDom").val("");
            $("#dNDom").focus();
        }
    });
    // Domicilio Natural
    // Domicilio Juridico
    $("#dJDom").focusout(function() {
        if (
            validaDomicilio($("#dJDom").val()) === false &&
            $("#dJDom").val() !== ""
        ) {
            toastr.error("Ingrese un domicilio válido", "Domicilio de Denunciante");
            $("#dJDom").val("");
            $("#dJDom").focus();
        }
    });
    // Domicilio Juridico
    function validaDomicilio(domicilio) {
        var regex = /^[a-zA-Z0-9ñÑáéíóúüÁÉÍÓÚÜ -#.,\-/]+$/;
        if (regex.test(domicilio)) {
            return true;
        } else {
            return false;
        }
    }
    // Validar Campos Domicilio
    // Buscar con DNI
    $("#btnDNIn").on("click", function() {
        var tDoc = $("#dNTipDoc").val();
        var dni = $("#dNnDoc").val();

        if (tDoc == 1) {
            $("#dNnomb").prop("readonly", true);
            $("#dNapPat").prop("readonly", true);
            $("#dNapMat").prop("readonly", true);
            $.ajax({
                type: "GET",
                url: "https://dniruc.apisperu.com/api/v1/dni/" +
                    dni +
                    "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data) {
                    $("#dNnomb").val(data["nombres"]);
                    $("#dNapPat").val(data["apellidoPaterno"]);
                    $("#dNapMat").val(data["apellidoMaterno"]);
                    $("#dNDep").focus();
                },
                failure: function(data) {
                    alert("Ha ocurrido un error en la conexión a la consulta de datos");
                },
                error: function(data) {
                    $("#dNnomb").prop("readonly", false);
                    $("#dNapPat").prop("readonly", false);
                    $("#dNapMat").prop("readonly", false);
                    $("#dNnomb").focus();
                    toastr.info(
                        "Ingresa tus nombres y apellidos",
                        "Nombre de Denunciante"
                    );
                },
            });
        }
    });
    // Buscar con DNI
    // Hidde Boton Natural
    $("#dNTipDoc").on("change", function() {
        var tDoc1 = $(this).val();
        if (tDoc1 == 1) {
            $("#dNbtnDNI").removeClass("d-none");
            $("#dNnDoc").attr("maxlength", "8");
            $("#dNnomb").prop("readonly", false);
            $("#dNapPat").prop("readonly", false);
            $("#dNapMat").prop("readonly", false);
            $("#dNnDoc").val("");
            $("#dNnDoc").focus();
            $("#dNnomb").val("");
            $("#dNapPat").val("");
            $("#dNapMat").val("");
        } else {
            $("#dNbtnDNI").addClass("d-none");
            $("#dNnDoc").attr("maxlength", "12");
            $("#dNnomb").prop("readonly", false);
            $("#dNapPat").prop("readonly", false);
            $("#dNapMat").prop("readonly", false);
            $("#dNnDoc").val("");
            $("#dNnDoc").focus();
            $("#dNnomb").val("");
            $("#dNapPat").val("");
            $("#dNapMat").val("");
        }
        // var dni = $("#dNnDoc").val();
    });
    // Hidde Boton Natural
    // Hidde Boton Juridico
    $("#dJTipDoc").on("change", function() {
        var tDoc2 = $(this).val();
        if (tDoc2 == 1) {
            $("#dJbtnDNI ").removeClass("d-none");
            $("#dJnDoc").attr("maxlength", "8");
            $("#dJnomb").prop("readonly", false);
            $("#dJapPat").prop("readonly", false);
            $("#dJapMat").prop("readonly", false);
            $("#dJnDoc").val("");
            $("#dJnDoc").focus();
            $("#dJnomb").val("");
            $("#dJapPat").val("");
            $("#dJapMat").val("");
        } else {
            $("#dJbtnDNI").addClass("d-none");
            $("#dJnDoc").attr("maxlength", "12");
            $("#dJnomb").prop("readonly", false);
            $("#dJapPat").prop("readonly", false);
            $("#dJapMat").prop("readonly", false);
            $("#dJnDoc").val("");
            $("#dJnDoc").focus();
            $("#dJnomb").val("");
            $("#dJapPat").val("");
            $("#dJapMat").val("");
        }
        // var dni = $("#dNnDoc").val();
    });
    // Hidde Boton Juridico
    // Buscar DNI Juridico
    $("#btnDNIj").on("click", function() {
        var tDoc3 = $("#dJTipDoc").val();
        var dni2 = $("#dJnDoc").val();

        if (tDoc3 == 1) {
            $("#dJnomb").prop("readonly", true);
            $("#dJapPat").prop("readonly", true);
            $("#dJapMat").prop("readonly", true);
            $.ajax({
                type: "GET",
                url: "https://dniruc.apisperu.com/api/v1/dni/" +
                    dni2 +
                    "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im9jYXN0cm9wLnRpQGdtYWlsLmNvbSJ9.XtrYx8wlARN2XZwOZo6FeLuYDFT6Ljovf7_X943QC_E",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data) {
                    $("#dJnomb").val(data["nombres"]);
                    $("#dJapPat").val(data["apellidoPaterno"]);
                    $("#dJapMat").val(data["apellidoMaterno"]);
                    $("#dJDep").focus();
                },
                failure: function(data) {
                    alert("Ha ocurrido un error en la conexión a la consulta de datos");
                },
                error: function(data) {
                    $("#dJnomb").prop("readonly", false);
                    $("#dJapPat").prop("readonly", false);
                    $("#dJapMat").prop("readonly", false);
                    $("#dJnomb").focus();
                    toastr.info(
                        "Ingresa tus nombres y apellidos",
                        "Nombre de Denunciante"
                    );
                },
            });
        }
    });
    // Buscar DNI Juridico
    // Fill datos H
    $("#cboTPersona").on("change", function() {
        var idTipPer = $(this).val();
        var data = new FormData();
        data.append("idTipPer", idTipPer);
        $.ajax({
            url: "tasks/TipoDenuncianteAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCNTDenun").val(respuesta["descTipoPersona"]);
            },
        });
        console.log(idTipPer);
    });
    $("#dNTipDoc").on("change", function() {
        var idTipoDoc1 = $(this).val();

        var data = new FormData();
        data.append("idTipoDoc", idTipoDoc1);
        $.ajax({
            url: "tasks/tipoDocAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCNTipDoc").val(respuesta["descTipoDoc"]);
            },
        });
    });

    $("#dJTipDoc").on("change", function() {
        var idTipoDoc2 = $(this).val();

        var data = new FormData();
        data.append("idTipoDoc", idTipoDoc2);
        $.ajax({
            url: "tasks/tipoDocAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCJTipDoc").val(respuesta["descTipoDoc"]);
            },
        });
    });

    $("#dNDep").on("change", function() {
        var idDepa1 = $(this).val();

        var data = new FormData();
        data.append("idDepa", idDepa1);
        $.ajax({
            url: "tasks/DepAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCNDep").val(respuesta["descDep"]);
            },
        });
    });

    $("#dJDep").on("change", function() {
        var idDepa2 = $(this).val();

        var data = new FormData();
        data.append("idDepa", idDepa2);
        $.ajax({
            url: "tasks/DepAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCJDep").val(respuesta["descDep"]);
            },
        });
    });

    $("#dNProv").on("change", function() {
        var idProvi1 = $(this).val();

        var data = new FormData();
        data.append("idProvi", idProvi1);
        $.ajax({
            url: "tasks/ProvAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCNProv").val(respuesta["descProv"]);
            },
        });
    });

    $("#dJProv").on("change", function() {
        var idProvi2 = $(this).val();

        var data = new FormData();
        data.append("idProvi", idProvi2);
        $.ajax({
            url: "tasks/ProvAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCJProv").val(respuesta["descProv"]);
            },
        });
    });

    $("#dNDist").on("change", function() {
        var idDistr1 = $(this).val();

        var data = new FormData();
        data.append("idDistr", idDistr1);
        $.ajax({
            url: "tasks/DistAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCNDist").val(respuesta["descDist"]);
            },
        });
    });
    $("#dJDist").on("change", function() {
        var idDistr2 = $(this).val();

        var data = new FormData();
        data.append("idDistr", idDistr2);
        $.ajax({
            url: "tasks/DistAjax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                $("#dCJDist").val(respuesta["descDist"]);
            },
        });
    });
    // Validar detalle denuncia
    $("#ddDetalle").on("focusout", function() {
        if (
            validaDetalleDenuncia($("#ddDetalle").val()) === false &&
            $("#ddDetalle").val() !== ""
        ) {
            toastr.error(
                "No se permiten caracteres especiales",
                "Detalle de Denuncia:"
            );
            $("#ddDetalle").focus();
        }
    });

    function validaDetalleDenuncia(detalle) {
        var regex = /^[a-zA-Z0-9ñÑáéíóúüÁÉÍÓÚÜ -#.:,\-/]+$/;
        if (regex.test(detalle)) {
            return true;
        } else {
            return false;
        }
    }
    // Validar detalle denuncia
    //   Validar otras ubicaciones de pruebas
    $("#ddUbPruebas").on("focusout", function() {
        if (
            validaUbicaMedios($("#ddUbPruebas").val()) === false &&
            $("#ddUbPruebas").val() !== ""
        ) {
            toastr.error(
                "No se permiten caracteres especiales",
                "Ubicación de medios"
            );
            $("#ddUbPruebas").focus();
        }
    });

    function validaUbicaMedios(detalle2) {
        var regex = /^[a-zA-Z0-9ñÑáéíóúüÁÉÍÓÚÜ -#.:,&%=?_\-/]+$/;
        if (regex.test(detalle2)) {
            return true;
        } else {
            return false;
        }
    }
    //   Validar otras ubicaciones de pruebas

    //   Tiene pruebas?
    $("#dMPruebasSi").click(function() {
        if ($("#dMPruebasSi").is(":checked")) {
            $("#blockSI").removeClass("d-none");
            $("#ddArch1").prop('required', true);
        }
    });
    $("#dMPruebasNo").click(function() {
        if ($("#dMPruebasNo").is(":checked")) {
            $("#blockSI").addClass("d-none");
            $("#ddArch1").prop('required', false);
        }
    });
    //   Tiene pruebas?

    //   Listado de Denunciados
    //   listaDenunciados donde carga view

    // listaProductos valor a guardar
    var numServidor = 0;
    $("#btnAddServidor").click(function() {
        numServidor++;
        var nombres = $("#sNombres").val();
        var apellidos = $("#sApellidos").val();
        var oficina = $("#sArea").val();
        var cargo = $("#sCargo").val();

        if (
            nombres != "" &&
            apellidos != "" &&
            cargo != "" &&
            oficina != "0" &&
            oficina != ""
        ) {
            $("#listaDenunciados").append(
                '<div class="row">' +
                '<div class="col-sm-3 one">' +
                '<div class="form-group">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="fas fa-user-tie"></i></span>' +
                "</div>" +
                '<input type="text" class="form-control nNyA" name="nNyA" id="nNyA" value="' +
                nombres +
                " " +
                apellidos +
                '" readonly>' +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="col-sm-4 two">' +
                '<div class="form-group">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>' +
                "</div>" +
                '<input type="text" class="form-control nOficina" name="nOficina" id="nOficina" value="' +
                oficina +
                '" readonly>' +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="col-sm-3 three">' +
                '<div class="form-group">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text"><i class="fas fa-briefcase"></i></span>' +
                "</div>" +
                '<input type="text" class="form-control nCargo" name="nCargo" id="nCargo" value="' +
                cargo +
                '" readonly>' +
                "</div>" +
                "</div>" +
                "</div>" +
                '<div class="col-sm-2">' +
                '<div class="form-group">' +
                '<div class="input-group input-group-sm">' +
                '<span class="input-group-append">' +
                '<button type="button" class="btn btn-danger quitarServidor bServ" idServidor="' +
                numServidor +
                '">Limpiar &nbsp;<i class="fas fa-user-minus"></i></button>' +
                "</span>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>"
            );
            ListarServidores();
            localStorage.removeItem("quitarServidor");
            $("#sNombres").val("");
            $("#sApellidos").val("");
            $("#sArea").val(0);
            $("#sCargo").val("");
        } else {
            toastr.error(
                "Ingrese correctamente los datos de servidor denunciado",
                "Datos de Servidores Denunciados:"
            );
        }
    });

    function ListarServidores() {
        var listaServir = [];
        var iDServe = $(".bServ");
        var nombAp = $(".nNyA");
        var nOficina = $(".nOficina");
        var nCargos = $(".nCargo");

        for (var i = 0; i < nombAp.length; i++) {
            listaServir.push({
                id: $(iDServe[i]).attr("idServidor"),
                nombres: $(nombAp[i]).val(),
                oficina: $(nOficina[i]).val(),
                cargo: $(nCargos[i]).val(),
            });
        }
        $("#listaServidores").val(JSON.stringify(listaServir));
        // listaServidores
    }

    //   Quitar servidor
    var idQuitarServidor = [];
    localStorage.removeItem("quitarServidor");

    $(".formDenuncia").on("click", "button.quitarServidor", function() {
        $(".quitarServidor").remove();
        $(".nNyA").remove();
        $(".nOficina").remove();
        $(".nCargo").remove();
        $(".one").remove();
        $(".two").remove();
        $(".three").remove();

        var idServidor = $(this).attr("idServidor");

        if (localStorage.getItem("quitarServidor") == null) {
            idQuitarServidor = [];
        } else {
            idQuitarServidor.concat(localStorage.getItem("quitarServidor"));
        }
        idQuitarServidor.push({ idServidor: idServidor });
        localStorage.setItem("quitarServidor", JSON.stringify(idQuitarServidor));

        ListarServidores();
    });
    // Validar archivos subidos
    $("#ddArch1").change(function() {
        var input1 = document.getElementById('ddArch1');
        var file1 = input1.files[0];
        var ext = input1.value.toUpperCase();
        if (input1.value != "") {
            if (!(ext.substr(-4) == ".JPG" || ext.substr(-5) == ".XLSX" || ext.substr(-4) == ".XLS" || ext.substr(-4) == ".DOC" || ext.substr(-5) == ".DOCX" || ext.substr(-4) == ".PDF" || ext.substr(-4) == ".JPG" || ext.substr(-4) == ".PNG")) {
                $("#ddArch1").val("");
                $("#ddArch1").focus();
                Swal.fire(
                    'Formato de archivo no permitido',
                    '¡Solo se admite archivos Word, Excel, PDF, JPG o PNG que pesen menos de 2MB!',
                    'error'
                );
            }
            if (file1.size > 2000000) {
                Swal.fire(
                    'Tamaño de archivo excedido',
                    '¡El archivo ingresado debe pesar menos de 2MB!',
                    'error'
                );
                $("#ddArch1").val("");
                $("#ddArch1").focus();
            }
        }
    });
    $("#ddArch2").change(function() {
        var input2 = document.getElementById('ddArch2');
        var file2 = input2.files[0];
        var ext2 = input2.value.toUpperCase();
        if (input2.value != "") {
            if (!(ext2.substr(-4) == ".JPG" || ext2.substr(-5) == ".XLSX" || ext2.substr(-4) == ".XLS" || ext2.substr(-4) == ".DOC" || ext2.substr(-5) == ".DOCX" || ext2.substr(-4) == ".PDF" || ext2.substr(-4) == ".JPG" || ext2.substr(-4) == ".PNG")) {
                $("#ddArch2").val("");
                $("#ddArch2").focus();
                Swal.fire(
                    'Formato de archivo no permitido',
                    '¡Solo se admite archivos Word, Excel, PDF, JPG o PNG que pesen menos de 2MB!',
                    'error'
                );
            }
            if (file2.size > 2000000) {
                Swal.fire(
                    'Tamaño de archivo excedido',
                    '¡El archivo ingresado debe pesar menos de 2MB!',
                    'error'
                );
                $("#ddArch2").val("");
                $("#ddArch2").focus();
            }
        }
    });
    $("#ddArch3").change(function() {
        var input3 = document.getElementById('ddArch3');
        var file3 = input3.files[0];
        var ext3 = input3.value.toUpperCase();
        if (input3.value != "") {
            if (!(ext3.substr(-4) == ".JPG" || ext3.substr(-5) == ".XLSX" || ext3.substr(-4) == ".XLS" || ext3.substr(-4) == ".DOC" || ext3.substr(-5) == ".DOCX" || ext3.substr(-4) == ".PDF" || ext3.substr(-4) == ".JPG" || ext3.substr(-4) == ".PNG")) {
                $("#ddArch3").val("");
                $("#ddArch3").focus();
                Swal.fire(
                    'Formato de archivo no permitido',
                    '¡Solo se admite archivos Word, Excel, PDF, JPG o PNG que pesen menos de 2MB!',
                    'error'
                );
            }
            if (file3.size > 2000000) {
                Swal.fire(
                    'Tamaño de archivo excedido',
                    '¡El archivo ingresado debe pesar menos de 2MB!',
                    'error'
                );
                $("#ddArch3").val("");
                $("#ddArch3").focus();
            }
        }
    });
    // Validar archivos subidos
    // Confirmacion de com correo
    $("#dDAceptacion").click(function() {
        if ($('#dDAceptacion').is(':checked')) {
            $("#ddConfirmaEmail").val("1");
        } else {
            $("#ddConfirmaEmail").val("0");
        }
        // Confirmacion de com correo
    })
});