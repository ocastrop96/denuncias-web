$(document).ready(function () {
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
  $("#dCNTDenun").val("Natural");
  // Carga de archivos Plug
  bsCustomFileInput.init();
  // Condiciones de Datos (Show)
  $("#cboTPersona").on("change", function () {
    var TipDenuncia = $(this).val();
    if (TipDenuncia == 1) {
      $("#NaturalD").removeClass("d-none");
      $("#NaturalC").removeClass("d-none");
      $("#JuridicaD").addClass("d-none");
      $("#JuridicaR").addClass("d-none");
      $("#JuridicaC").addClass("d-none");
      $("#AnonimoD").addClass("d-none");
    } else {
      if (TipDenuncia == 2) {
        $("#NaturalD").addClass("d-none");
        $("#NaturalC").addClass("d-none");
        $("#JuridicaD").removeClass("d-none");
        $("#JuridicaR").removeClass("d-none");
        $("#JuridicaC").removeClass("d-none");
        $("#AnonimoD").addClass("d-none");
      } else {
        $("#NaturalD").addClass("d-none");
        $("#NaturalC").addClass("d-none");
        $("#JuridicaD").addClass("d-none");
        $("#JuridicaR").addClass("d-none");
        $("#JuridicaC").addClass("d-none");
        $("#AnonimoD").removeClass("d-none");
      }
    }
  });
  // Condiciones de Datos (Show)

  // Valid fields

  $.validator.addMethod(
    "valueNotEquals",
    function (value, element, arg) {
      return arg !== value;
    },
    "Value must not equal arg."
  );

  $("#btnSend").on("click", function () {
    var tipDenunciante = $("#cboTPersona").val();
    if (tipDenunciante == 1) {
      $("#formDenuncia").validate({
        rules: {
          dNTipDoc: {
            valueNotEquals: "0",
          },
          dNnDoc: {
            required: true,
          },
          dNnomb: {
            required: true,
          },
          dNapPat: {
            required: true,
          },
          dNapMat: {
            required: true,
          },
          dNDep: {
            valueNotEquals: "0",
          },
          dNProv: {
            valueNotEquals: "0",
          },
          dNDist: {
            valueNotEquals: "0",
          },
          dNDom: {
            required: true,
          },
          dNEmail: {
            required: true,
            email: true,
          },
          ddDetalle: {
            required: true,
          },
          dDAceptacion: {
            required: true,
          },
        },
        messages: {
          dNTipDoc: {
            valueNotEquals: "Seleccion Tipo Doc",
          },
          dNnDoc: {
            required: "Ingresa tu N° de Documento",
          },
          dNnomb: {
            required: "Ingrese sus nombres",
          },
          dNapPat: {
            required: "Ingrese apellido su paterno",
          },
          dNapMat: {
            required: "Ingrese apellido  su materno",
          },
          dNDep: {
            valueNotEquals: "Selecciona tu Departamento",
          },
          dNProv: {
            valueNotEquals: "Selecciona tu Provincia",
          },
          dNDist: {
            valueNotEquals: "Selecciona tu Distrito",
          },
          dNDom: {
            required: "Ingresa tu domicilio",
          },
          dNEmail: {
            required: "Ingresa tu correo electrónico",
            email: "Ingrese un correo válido",
          },
          ddDetalle: {
            required: "Ingresa el detalle de tu denuncia",
          },
          dDAceptacion: {
            required:
              "Marca la casilla de aceptación para comunicación por e-mail",
          },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
          error.addClass("invalid-feedback");
          element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass("is-invalid");
        },
      });
    } else {
      if (tipDenunciante == 2) {
        $("#formDenuncia").validate({
          rules: {
            dJRuc: {
              required: true,
            },
            dJRazon: {
              required: true,
            },
            dJTipDoc: {
              valueNotEquals: "0",
            },
            dJnDoc: {
              required: true,
            },
            dJnomb: {
              required: true,
            },
            dJapPat: {
              required: true,
            },
            dJapMat: {
              required: true,
            },
            dJDep: {
              valueNotEquals: "0",
            },
            dJProv: {
              valueNotEquals: "0",
            },
            dJDist: {
              valueNotEquals: "0",
            },
            dJDom: {
              required: true,
            },
            dJEmail: {
              required: true,
              email: true,
            },
            ddDetalle: {
              required: true,
            },
            dDAceptacion: {
              required: true,
            },
          },
          messages: {
            dJRuc: {
              required: "Ingresa tu RUC 20",
            },
            dJRazon: {
              required: "Ingresa tu razón social",
            },
            dJTipDoc: {
              valueNotEquals: "Seleccion Tipo Doc",
            },
            dJnDoc: {
              required: "Ingresa tu N° de Documento",
            },
            dJnomb: {
              required: "Ingrese sus nombres",
            },
            dJapPat: {
              required: "Ingrese apellido su paterno",
            },
            dJapMat: {
              required: "Ingrese apellido  su materno",
            },
            dJDep: {
              valueNotEquals: "Selecciona tu Departamento",
            },
            dJProv: {
              valueNotEquals: "Selecciona tu Provincia",
            },
            dJDist: {
              valueNotEquals: "Selecciona tu Distrito",
            },
            dJDom: {
              required: "Ingresa tu domicilio",
            },
            dJEmail: {
              required: "Ingresa tu correo electrónico",
              email: "Ingrese un correo válido",
            },
            ddDetalle: {
              required: "Ingresa el detalle de tu denuncia",
            },
            dDAceptacion: {
              required:
                "Marca la casilla de aceptación para comunicación por e-mail",
            },
          },
          errorElement: "span",
          errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
          },
        });
      }

      if (tipDenunciante == 3) {
        $("#formDenuncia").validate({
          rules: {
            dAEmail: {
              required: true,
              email: true,
            },
            ddDetalle: {
              required: true,
            },
            dDAceptacion: {
              required: true,
            },
          },
          messages: {
            dAEmail: {
              required: "Ingresa tu correo electrónico",
              email: "Ingrese un correo válido",
            },
            ddDetalle: {
              required: "Ingresa el detalle de tu denuncia",
            },
            dDAceptacion: {
              required:
                "Marca la casilla de aceptación para comunicación por e-mail",
            },
          },
          errorElement: "span",
          errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
          },
        });
      }
    }
  });

  $("#btnSend").click(function() {
    var form = $("#formDenuncia");
    validacion = form.valid();
    if (validacion == true) {
        let timerInterval;
        Swal.fire({
            title: "Estamos registrando su denuncia",
            html: "El registro culminará en unos segundos. Espere por favor...",
            timer: 20000,
            timerProgressBar: true,
            onBeforeOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                    const content = Swal.getContent();
                    if (content) {
                        const b = content.querySelector("b");
                        if (b) {
                            b.textContent = Swal.getTimerLeft();
                        }
                    }
                }, 100);
            },
            onClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    } else {

    }
});
  // Valid fields
});
