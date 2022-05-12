<style>
#actaInfraccion{
    margin: 30px 20px;
}
@page { size: auto;  margin: 0mm; }
</style>
<?php
 setlocale(LC_TIME, 'es_ES.UTF-8');                                            
 $mes = strftime('%B', mktime(0, 0, 0, date('m')));
?>
<div id="actaInfraccion" style="position:relative">
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 35px">
            <h3><b>ORIGINAL</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 50%;float:right">
            <h2>ACTA DE INFRACCIÓN N° <?php echo $inspeccion->case_id; ?></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%; float:left">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span> a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. Siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="dniActa"><?php echo $inspeccion->chof_id ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                </div>
                <div style="text-indent: 30px;">
                    Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>, vehículo patente N° <?php echo $inspeccion->patente_tractor; ?>, N° de habilitación del SENASA <?php echo $inspeccion->nro_senasa ?>, Documentación Sanitaria tipo <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->tipo. ". ";} ?>
                    Establecimiento N° <?php echo $origen->num_establecimiento; ?>, nombre del Establecimiento de Origen <?php echo $origen->razon_social ?>, Transportista <?php echo $transportista->razon_social ?>, teléfono del transportista 
                    <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                    destinos <?php foreach ($destinos as $destino) { echo $destino->razon_social. ", ". $destino->altura. ", ".$destino->calle. ", ". $destino->departamento. ". ";} ?> producto/s <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->productos. " ";} ?>,
                    temperatura <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->temperatura. " ";} ?>, precintos <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->precintos. " ";} ?>, Peso Bruto <?php echo $inspeccion->bruto ?>, 
                    Tara <?php echo $inspeccion->tara ?> kg, N° de Ticket <?php echo $inspeccion->ticket ?>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['valor']; ?></span>.
                </div>
                <div style="text-indent: 30px;">
                    Se constatan las siguientes infracciones: <span class="acta_tposInfracciones"><?php foreach ($inspeccion->infracciones->infraccion->detalleInfracciones->detalleInfraccion as $tiposInfracciones) { echo $tiposInfracciones->valor. ". ";} ?></span>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <?php echo $inspeccion->observaciones ?>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                    Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a <span class="acta_nyaDepositario"><?php echo $inspeccion->infracciones->infraccion->depositario ?></span>, D.N.I. N° <span class="dniActa"><?php echo $inspeccion->infracciones->infraccion->documento ?></span>, Teléfono
                    <span class="telefonoActa"><?php echo $inspeccion->infracciones->infraccion->telefono ?></span>, correo electrónico  <span class="correoActa"><?php echo $inspeccion->infracciones->infraccion->email ?></span>, con domicilio legal <span class="direccionLegalActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_legal?></span>,
                    y domicilio comercial <span class="direccionComercialActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_comercial?></span>. Con las características organolépticas que se describen a continuación <span class="acta_caractOrganolepticas"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_organolepticas ?></span>, en un depósito
                    con las siguientes características: <span class="acta_caractDeposito"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_deposito ?></span>, y registrándose la siguiente temperatura <span class="acta_tempCamaraActa"><?php echo $inspeccion->infracciones->infraccion->temperatura_actual?></span><br>
                    <br>
                    Fecha y Hora: <span class="acta_fecha"><?php echo date('d-m-Y'); ?></span>, <span class="acta_hora"><?php echo date('H:i'); ?></span> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo apercibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 30%;text-align: center;float:left; margin-left:10px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <?php echo $inspeccion->chofer; ?> D.N.I. N° <?php echo $inspeccion->chof_id ?> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a los fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de hacerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la misma audiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.</div></br>
        </div>
        <div style="width: 100%;text-align: center;margin-top: 50px;float:left">
            <p><b>NOTIFICADO:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p><b>INSPECTORES:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
    </div>
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 35px">
            <h3><b>DUPLICADO</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 50%;float:right">
            <h2>ACTA DE INFRACCIÓN N° <?php echo $inspeccion->case_id; ?></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%; float:left">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span> a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. Siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="dniActa"><?php echo $inspeccion->chof_id ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                </div>
                <div style="text-indent: 30px;">
                    Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>, vehículo patente N° <?php echo $inspeccion->patente_tractor; ?>, N° de habilitación del SENASA <?php echo $inspeccion->nro_senasa ?>, Documentación Sanitaria tipo <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->tipo. ". ";} ?>
                    Establecimiento N° <?php echo $origen->num_establecimiento; ?>, nombre del Establecimiento de Origen <?php echo $origen->razon_social ?>, Transportista <?php echo $transportista->razon_social ?>, teléfono del transportista 
                    <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                    destinos <?php foreach ($destinos as $destino) { echo $destino->razon_social. ", ". $destino->altura. ", ".$destino->calle. ", ". $destino->departamento. ". ";} ?> producto/s <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->productos. " ";} ?>,
                    temperatura <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->temperatura. " ";} ?>, precintos <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->precintos. " ";} ?>, Peso Bruto <?php echo $inspeccion->bruto ?>, 
                    Tara <?php echo $inspeccion->tara ?> kg, N° de Ticket <?php echo $inspeccion->ticket ?>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['descripcion']; ?></span>.
                </div>
                <div style="text-indent: 30px;">
                    Se constatan las siguientes infracciones: <span class="acta_tposInfracciones"><?php foreach ($inspeccion->infracciones->infraccion->detalleInfracciones->detalleInfraccion as $tiposInfracciones) { echo $tiposInfracciones->valor. ". ";} ?></span>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <?php echo $inspeccion->observaciones ?>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a <span class="acta_nyaDepositario"><?php echo $inspeccion->infracciones->infraccion->depositario ?></span>, D.N.I. N° <span class="dniActa"><?php echo $inspeccion->infracciones->infraccion->documento ?></span>, Teléfono
                    <span class="telefonoActa"><?php echo $inspeccion->infracciones->infraccion->telefono ?></span>, correo electrónico  <span class="correoActa"><?php echo $inspeccion->infracciones->infraccion->email ?></span>, con domicilio legal <span class="direccionLegalActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_legal?></span>,
                    y domicilio comercial <span class="direccionComercialActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_comercial?></span>. Con las características organolépticas que se describen a continuación <span class="acta_caractOrganolepticas"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_organolepticas ?></span>, en un depósito
                    con las siguientes características: <span class="acta_caractDeposito"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_deposito ?></span>, y registrándose la siguiente temperatura <span class="acta_tempCamaraActa"><?php echo $inspeccion->infracciones->infraccion->temperatura_actual?></span><br>
                    <br>
                    Fecha y Hora: <span class="acta_fecha"><?php echo date('d-m-Y'); ?></span>, <span class="acta_hora"><?php echo date('H:i'); ?></span> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo apercibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 30%;text-align: center;float:left; margin-left:10px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <?php echo $inspeccion->chofer; ?> D.N.I. N° <?php echo $inspeccion->chof_id ?> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a los fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de hacerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la misma audiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.</div></br>
        </div>
        <div style="width: 100%;text-align: center;margin-top: 50px;float:left">
            <p><b>NOTIFICADO:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p><b>INSPECTORES:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
    </div>
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 35px">
            <h3><b>TRIPLICADO</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 50%;float:right">
            <h2>ACTA DE INFRACCIÓN N° <?php echo $inspeccion->case_id; ?></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%; float:left">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span> a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. Siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="dniActa"><?php echo $inspeccion->chof_id ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                </div>
                <div style="text-indent: 30px;">
                    Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>, vehículo patente N° <?php echo $inspeccion->patente_tractor; ?>, N° de habilitación del SENASA <?php echo $inspeccion->nro_senasa ?>, Documentación Sanitaria tipo <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->tipo. ". ";} ?>
                    Establecimiento N° <?php echo $origen->num_establecimiento; ?>, nombre del Establecimiento de Origen <?php echo $origen->razon_social ?>, Transportista <?php echo $transportista->razon_social ?>, teléfono del transportista 
                    <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                    destinos <?php foreach ($destinos as $destino) { echo $destino->razon_social. ", ". $destino->altura. ", ".$destino->calle. ", ". $destino->departamento. ". ";} ?> producto/s <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { echo $permiso->productos. " ";} ?>,
                    temperatura <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->temperatura. " ";} ?>, precintos <?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->precintos. " ";} ?>, Peso Bruto <?php echo $inspeccion->bruto ?>, 
                    Tara <?php echo $inspeccion->tara ?> kg, N° de Ticket <?php echo $inspeccion->ticket ?>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['descripcion']; ?></span>.
                </div>
                <div style="text-indent: 30px;">
                    Se constatan las siguientes infracciones: <span class="acta_tposInfracciones"><?php foreach ($inspeccion->infracciones->infraccion->detalleInfracciones->detalleInfraccion as $tiposInfracciones) { echo $tiposInfracciones->valor. ". ";} ?></span>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <?php echo $inspeccion->observaciones ?>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                    Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a <span class="acta_nyaDepositario"><?php echo $inspeccion->infracciones->infraccion->depositario ?></span>, D.N.I. N° <span class="dniActa"><?php echo $inspeccion->infracciones->infraccion->documento ?></span>, Teléfono
                    <span class="telefonoActa"><?php echo $inspeccion->infracciones->infraccion->telefono ?></span>, correo electrónico  <span class="correoActa"><?php echo $inspeccion->infracciones->infraccion->email ?></span>, con domicilio legal <span class="direccionLegalActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_legal?></span>,
                    y domicilio comercial <span class="direccionComercialActa"><?php echo $inspeccion->infracciones->infraccion->domicilio_comercial?></span>. Con las características organolépticas que se describen a continuación <span class="acta_caractOrganolepticas"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_organolepticas ?></span>, en un depósito
                    con las siguientes características: <span class="acta_caractDeposito"><?php echo $inspeccion->infracciones->infraccion->caracteristicas_deposito ?></span>, y registrándose la siguiente temperatura <span class="acta_tempCamaraActa"><?php echo $inspeccion->infracciones->infraccion->temperatura_actual?></span><br>
                    <br>
                    Fecha y Hora: <span class="acta_fecha"><?php echo date('d-m-Y'); ?></span>, <span class="acta_hora"><?php echo date('H:i'); ?></span> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo apercibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 30%;text-align: center;float:left; margin-left:10px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
        <div style="width: 30%;text-align: center;float:left">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del inspector</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <?php echo $inspeccion->chofer; ?> D.N.I. N° <?php echo $inspeccion->chof_id ?> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a los fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de hacerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la misma audiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.</div></br>
        </div>
        <div style="width: 100%;text-align: center;margin-top: 50px;float:left">
            <p><b>NOTIFICADO:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p><b>INSPECTORES:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
    </div>
</div>