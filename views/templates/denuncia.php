<div class="content">
    <div class="container">
        <div class="row align-items-center mb-3 mt-2 alert alert-dark">
            <div class="col-sm-12">
                <span class="h6 font-weight-bolder">(*) Completa correctamente los campos requeridos en el formulario.</span>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="packages/sendDenuncia.php" method="post" enctype="multipart/form-data" id="formDenuncia" class="formDenuncia">
            <div class="row mx-4">
                <div class="col-12 col-md-2 col-lg-2">
                    <label for="cboTipoDenunciante">Tipo de Persona:</label>
                </div>
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select class="form-control cboTPersona" name="cboTPersona" id="cboTPersona">
                            <?php
                            $itemTPersona = null;
                            $valorTPersona  = null;
                            $TPersona = ControladorUtilitarios::ctrListarTipoPersona($itemTPersona, $valorTPersona);
                            foreach ($TPersona as $key => $value) {
                                echo '<option value="' . $value["idtipPersona"] . '">' . $value["descTipoPersona"] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="hidden" name="dCNTDenun" id="dCNTDenun" value="Persona Natural">
                    </div>
                </div>
            </div>
            <!-- Datos del Denunciante Persona Natural -->
            <div class="row mt-3" id="NaturalD">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">I. Datos del Denunciante</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Tipo de Documento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="hidden" name="dCNTipDoc" id="dCNTipDoc">
                                            <select class="form-control" name="dNTipDoc" id="dNTipDoc">
                                                <option value="0" selected="">Seleccione tipo Doc</option>
                                                <?php

                                                $itemTDoc1 = null;
                                                $valorTDoc1 = null;
                                                $TDoc1 = ControladorUtilitarios::ctrListarTipoDocumento($itemTDoc1, $valorTDoc1);
                                                foreach ($TDoc1 as $key => $value) {
                                                    echo '<option value="' . $value["idTipoDoc"] . '">' . $value["descTipoDoc"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Número de Documento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese N° de documento" autocomplete="off" name="dNnDoc" id="dNnDoc">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-lg-4 pl-lg-5 pt-lg-2 mt-lg-4 mt-md-4 pl-md-5 pt-md-2 mt-md-4 d-none" id="dNbtnDNI">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-dark" id="btnDNIn"><i class="fas fa-search"></i>&nbsp;Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombres:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese nombres" autocomplete="off" name="dNnomb" id="dNnomb">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese apellido paterno" autocomplete="off" name="dNapPat" id="dNapPat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Materno:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese apellido materno" autocomplete="off" name="dNapMat" id="dNapMat">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Departamento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCNDep" id="dCNDep">
                                            <select class="form-control" name="dNDep" id="dNDep">
                                                <option value="0">Seleccione Departamento</option>
                                                <?php
                                                $itemUbigeo1 = null;
                                                $valorUbigeo1 = null;
                                                $Ubigeo1 = ControladorUtilitarios::ctrListarDepartamentos($itemUbigeo1, $valorUbigeo1);
                                                foreach ($Ubigeo1 as $key => $value) {
                                                    echo '<option value="' . $value["idDep"] . '">' . $value["descDep"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Provincia:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCNProv" id="dCNProv">
                                            <select class="form-control" name="dNProv" id="dNProv" disabled>
                                                <option value="0">Seleccione Provincia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Distrito:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCNDist" id="dCNDist">
                                            <select class="form-control" name="dNDist" id="dNDist" disabled>
                                                <option value="0">Seleccione Distrito</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Domicilio:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese su domicilio" autocomplete="off" name="dNDom" id="dNDom">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Correo Electrónico:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Ingrese su correo electrónico" autocomplete="off" name="dNEmail" id="dNEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="descripcion-denuncia">¿Con reserva de identidad? *</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dNReservaSi" name="dNReserva" checked value="SI">
                                            <label for="dNReservaSi" class="custom-control-label">Si</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dNReservaNo" name="dNReserva" value="NO">
                                            <label for="dNReservaNo" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <label for=""><i class="fas fa-info-circle"></i>&nbsp;La reserva de identidad se aplicará tanto para la persona que registra la denuncia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Denunciante Persona Natural -->
            <!-- Datos de Contacto Persona Natural -->
            <div class="row mt-3" id="NaturalC">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">Datos de Contacto</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                            </div>
                                            <input type="tel" class="form-control" autocomplete="off" placeholder="Teléfono (Opcional)" name="dNTel" id="dNTel" maxlength="9">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input type="tel" class="form-control" placeholder="Celular (Opcional)" autocomplete="off" name="dNCel" id="dNCel" maxlength="9">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de Contacto Persona Natural -->

            <!-- Datos del Denunciante Persona Jurídica -->
            <div class="row mt-3 d-none" id="JuridicaD">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">I. Datos del Denunciante</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Número de RUC:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingresa RUC" autocomplete="off" name="dJRuc" id="dJRuc" maxlength="11">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-lg-4 pl-lg-5 pt-lg-2 mt-lg-4 mt-md-4 pl-md-5 pt-md-2 mt-md-4" id="dJbtnRUC">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-dark" id="btnRUCj"><i class="fas fa-search"></i>&nbsp;Buscar RUC</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Razón Social:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese razón social" autocomplete="off" name="dJRazon" id="dJRazon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Domicilio:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese su domicilio" autocomplete="off" name="dJDom" id="dJDom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="descripcion-denuncia">¿Con reserva de identidad? *</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dJReservaSi" name="dJReserva" checked value="SI">
                                            <label for="dJReservaSi" class="custom-control-label">Si</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dJReservaNo" name="dJReserva" value="NO">
                                            <label for="dJReservaNo" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <label for=""><i class="fas fa-info-circle"></i>&nbsp;La reserva de identidad se aplicará tanto para la persona jurídica como para el representante que registra la denuncia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Denunciante Persona Jurídica -->
            <!-- Datos del Representante Persona Jurídica -->
            <div class="row mt-3 d-none" id="JuridicaR">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">Datos del Representante</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Tipo de Documento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="hidden" name="dCJTipDoc" id="dCJTipDoc">
                                            <select class="form-control" name="dJTipDoc" id="dJTipDoc">
                                                <option value="0" selected>Seleccione tipo Doc</option>
                                                <?php

                                                $itemTDoc2 = null;
                                                $valorTDoc2 = null;
                                                $TDoc2 = ControladorUtilitarios::ctrListarTipoDocumento($itemTDoc2, $valorTDoc2);
                                                foreach ($TDoc2 as $key => $value) {
                                                    echo '<option value="' . $value["idTipoDoc"] . '">' . $value["descTipoDoc"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Número de Documento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese N° de documento" autocomplete="off" name="dJnDoc" id="dJnDoc">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-lg-4 pl-lg-5 pt-lg-2 mt-lg-4 mt-md-4 pl-md-5 pt-md-2 mt-md-4 d-none" id="dJbtnDNI">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-dark" id="btnDNIj"><i class="fas fa-search"></i>&nbsp;Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombres:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese nombres" autocomplete="off" name="dJnomb" id="dJnomb">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese apellido paterno" autocomplete="off" name="dJapPat" id="dJapPat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Apellido Materno:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese apellido materno" autocomplete="off" name="dJapMat" id="dJapMat">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Departamento:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCJDep" id="dCJDep">
                                            <select class="form-control" name="dJDep" id="dJDep">
                                                <option value="0">Seleccione Departamento</option>
                                                <?php
                                                $itemUbigeo2 = null;
                                                $valorUbigeo2 = null;
                                                $Ubigeo2 = ControladorUtilitarios::ctrListarDepartamentos($itemUbigeo2, $valorUbigeo2);
                                                foreach ($Ubigeo2 as $key => $value) {
                                                    echo '<option value="' . $value["idDep"] . '">' . $value["descDep"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Provincia:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCJProv" id="dCJProv">
                                            <select class="form-control" name="dJProv" id="dJProv" disabled>
                                                <option value="0">Seleccione Provincia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Distrito:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <input type="hidden" name="dCJDist" id="dCJDist">
                                            <select class="form-control" name="dJDist" id="dJDist" disabled>
                                                <option value="0">Seleccione Distrito</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Domicilio:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese su domicilio" autocomplete="off" name="dJRDom" id="dJRDom">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Correo Electrónico:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Ingrese su correo electrónico" autocomplete="off" name="dJEmail" id="dJEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Representante Persona Jurídica -->

            <!-- Datos de Contacto Persona Jurídica -->
            <div class="row mt-3 d-none" id="JuridicaC">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">Datos de Contacto</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Teléfono (Opcional)" name="dJTel" id="dJTel" maxlength="9">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Celular (Opcional)" autocomplete="off" name="dJCel" id="dJCel" maxlength="9">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de Contacto Persona Jurídica -->

            <!-- Datos del Denunciante Anónimo -->
            <div class="row mt-3 d-none" id="AnonimoD">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">I. Datos de Contacto</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Correo Electrónico:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Ingrese correo electrónico" name="dAEmail" id="dAEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Teléfono (Opcional)" name="dATel" id="dATel" maxlength="9">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Celular:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Celular (Opcional)" autocomplete="off" name="dACel" id="dACel" maxlength="9">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos del Denunciante Anónimo -->
            <!-- Datos de la Denuncia -->
            <div class="row mt-3" id="DDenuncia">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">II. Datos de la Denuncia</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Fecha:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?php date_default_timezone_set('America/Lima');
                                                                                            $FechaActual = date('d/m/Y');
                                                                                            echo $FechaActual; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tipo de Entidad:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                            </div>
                                            <input type="text" class="form-control" readonly value="Hospitales MINSA">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre de la Entidad:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                            </div>
                                            <input type="text" class="form-control" readonly value="Hospital Nacional Sergio E. Bernales">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Descripción de la denuncia (2000 caracteres):<span class="text-danger">&nbsp;*</span></label>
                                        <textarea class="form-control" rows="3" placeholder="Ingresa la descripción detallada de tu denuncia..." maxlength="2000" name="ddDetalle" id="ddDetalle"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de la Denuncia -->

            <!-- Datos de los denunciados -->
            <div class="row mt-3" id="DDenunciados">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">III. Datos de los Servidores Denunciados</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nombres:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese nombres del servidor" autocomplete="off" id="sNombres" name="sNombres">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Apellidos:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese apellidos del servidor" autocomplete="off" id="sApellidos" name="sApellidos">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Oficina o Área donde labora el servidor:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                            <select class="form-control" id="sArea" name="sArea">
                                                <option value="0">Seleccione Oficina o Área</option>
                                                <?php
                                                $itemArea = null;
                                                $valorArea  = null;
                                                $Area = ControladorUtilitarios::ctrListarAreas($itemArea, $valorArea);
                                                foreach ($Area as $key => $value) {
                                                    echo '<option value="' . $value["descArea"] . '">' . $value["descArea"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cargo del servidor:<span class="text-danger">&nbsp;*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ingrese cargo del servidor" autocomplete="off" id="sCargo" name="sCargo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 mt-lg-3 pl-lg-5 pt-lg-3 mt-lg-3 mt-md-3 pl-md-5 pt-md-3 mt-md-3" id="btnDNIPJ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-dark" id="btnAddServidor"><i class="fas fa-user-plus"></i>&nbsp;Agregar</button>
                                        </div>

                                        <input type="hidden" id="listaServidores" name="listaServidores">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Listado de Servidores de Denunciados (Nombres y Apellidos|Oficina o Departamento | Cargo)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="listaDenunciados">
                            </div>
                            <!-- Bloque de Listado de Denunciados -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de los denunciados -->

            <!-- Medios probatorios de la denuncia -->
            <div class="row mt-3" id="DMedios">
                <div class="col-sm-12">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h5 class="card-title m-0 font-weight-bold">IV. Medios probatorios</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="descripcion-denuncia">¿Cuenta con medios que respalden su denuncia? *</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dMPruebasSi" name="dMPruebas" value="SI" checked>
                                            <label for="dMPruebasSi" class="custom-control-label">Si</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="dMPruebasNo" name="dMPruebas" value="NO">
                                            <label for="dMPruebasNo" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="blockSI">
                                <div class="row">
                                    <div class="alert alert-default-info">
                                        <div class="col-sm-12 pt-0">
                                            <span class="h6 font-weight-normal">Puedes adjuntar archivos como medio probatorio de tu denuncia (imagenes,documentos,etc) en formatos de Word(.doc .docx), Excel(.xls .xlsx), PDF,JPG o PNG que no pesen más de 2MB</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="ddArch1" name="ddArch1" id="ddArch1" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="ddArch2" name="ddArch2" id="ddArch2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="ddArch3" name="ddArch3" id="ddArch3">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="alert alert-default-info">
                                    <div class="col-sm-12 pt-0">
                                        <span class="h6 font-font-weight-normal">El el campo siguiente, podrás indicar el área, oficina o departamento de la entidad en dónde se puede ubicar otros medios probatorios. De la misma manera, podrás indicar el enlance web donde se pueda descargar otros medios probatorios superiores a 2MB de peso, tales como vídeos, audios. Caso contrario, puede enviarlos al correo denuncias@hnseb.gob.pe, indicando el asunto medios probatorio y tema de la denuncia.</span>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Señala de la ubicación de las pruebas (máximo 500 caracteres):</label>
                                        <textarea class="form-control" rows="3" placeholder="Ingresa la ubicación de otros medios probatorios de tu denuncia..." maxlength="500" name="ddUbPruebas" id="ddUbPruebas"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="ddDisposicionSi" name="ddDisposicion" checked value="SI">
                                            <label for="ddDisposicionSi" class="custom-control-label">Si</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="ddDisposicionNo" name="ddDisposicion" value="NO">
                                            <label for="ddDisposicionNo" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-10 col-lg-10">
                                    <div class="form-group">
                                        <label for="">Manifiesto mi compromiso de permanecer a disposición de la entidad, a fin de brindar las aclaraciones que sea necesarias o brindar mayor información sobre las irregularidades materia de denuncia.<span class="text-danger">&nbsp;*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="ddConfirmaEmail" id="ddConfirmaEmail" value="0">
                                            <input class="custom-control-input" type="checkbox" id="dDAceptacion" name="dDAceptacion">
                                            <label for="dDAceptacion" class="custom-control-label"><span class="text-danger">*</span>&nbsp;El denunciante acepta que la comunicación y/o documentación que le corresponda recibr en atención a su denuncia mediante el correo electrónico indicado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3 mt-2 alert alert-default-success">
                                <div class="col-sm-12">
                                    <span class="h6 font-weight-normal"> Si está seguro de los datos ingresados y desea registrar la denuncia, presione el botón "Enviar"</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-dark btn-lg mb-4" name="btnSend" id="btnSend">REGISTRAR</button>
                    </center>
                </div>
            </div>
            <!-- Medios probatorios de la denuncia -->
        </form>
    </div>
</div>
<!-- Empieza el formulario -->