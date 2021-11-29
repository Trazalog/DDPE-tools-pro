<style>
#actaInfraccionPCC{
    margin: 30px 20px;
}
@page { size: auto;  margin: 0mm; }
</style>
<?php
 setlocale(LC_TIME, 'es_ES.UTF-8');                                            
 $mes = strftime('%B', mktime(0, 0, 0, date('m')));
?>
<div id="actaInfraccionPCC" style="position:relative">
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 20px">
            <h3><b>ORIGINAL</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 20px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 30px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA INFRACCIÓN N° <span class="acta_caseId"></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . localidad . . . . . . . . . . . . . . . . . . . . a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , se constituyen en <span class="acta_puntoControl"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['nombre'] : '' ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['domicilio'] : '' ?></span> propiedad de D.D.P. siendo atendidos por <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> en su carácter de chofer.<br>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Proceden a realizar la inspección de camión térmico, vehículo patente N° <span class="acta_patenteTractor"></span>, N° de habilitación del SENASA <span class="acta_numSenasa"></span>, Documentación Sanitaria tipo <span class="acta_docSanitaria"></span>
                    Establecimiento N° <span class="acta_origenNro"></span>, nombre del Establecimiento de Origen <span class="acta_estaOrigen"></span>, Transportista <span class="acta_transportista"></span>, telefono del transportista 
                    <span class="acta_telTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> correo electrónico del transportista <span class="acta_emailTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> 
                    destinos <span class="acta_destinos"></span> producto/s <span class="acta_productos"></span>, temperatura <span class="acta_temperaturas"></span>, precintos <span class="acta_precintos"></span>, Peso Bruto <span class="acta_bruto"></span>, 
                    Tara <span class="acta_tara"></span> kg, N° de Ticket <span class="acta_ticket"></span>. Tipo de documentación <span class="acta_tpoDocumentacion"></span>
                </div> 
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <span class="acta_observaciones"></span>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                    Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , D.N.I. N°  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , Teléfono
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , correo electrónico  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , con domicilio legal  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ,
                    y domicilio comercial  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Con las características organolépticas que describen a continuación  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , en un depósito
                    con las siguientes características:  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , y registrándose las siguientes temperaturas 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . <br>
                    <br>
                    Fecha y Hora: <?php echo date('d-m-Y'); ?>, <?php echo date('H:i'); ?> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo aprecibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Interesado</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page;">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a lso fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de ahcerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la mismaaudiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.-</div></br>
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
        <footer class="footerActa" style="float: right"><p>Impreso en el Boletín Oficial e Imprenta del Estado</p></footer>
    </div>
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 20px">
            <h3><b>DUPLICADO</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 20px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 30px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA INFRACCIÓN N° <span class="acta_caseId"></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . localidad . . . . . . . . . . . . . . . . . . . . a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , se constituyen en <span class="acta_puntoControl"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['nombre'] : '' ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['domicilio'] : '' ?></span> propiedad de D.D.P. siendo atendidos por <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> en su carácter de chofer.<br>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Proceden a realizar la inspección de camión térmico, vehículo patente N° <span class="acta_patenteTractor"></span>, N° de habilitación del SENASA <span class="acta_numSenasa"></span>, Documentación Sanitaria tipo <span class="acta_docSanitaria"></span>
                    Establecimiento N° <span class="acta_origenNro"></span>, nombre del Establecimiento de Origen <span class="acta_estaOrigen"></span>, Transportista <span class="acta_transportista"></span>, telefono del transportista 
                    <span class="acta_telTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> correo electrónico del transportista <span class="acta_emailTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> 
                    destinos <span class="acta_destinos"></span> producto/s <span class="acta_productos"></span>, temperatura <span class="acta_temperaturas"></span>, precintos <span class="acta_precintos"></span>, Peso Bruto <span class="acta_bruto"></span>, 
                    Tara <span class="acta_tara"></span> kg, N° de Ticket <span class="acta_ticket"></span>.
                </div> 
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <span class="acta_observaciones"></span>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                    Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , D.N.I. N°  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , Teléfono
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , correo electrónico  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , con domicilio legal  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ,
                    y domicilio comercial  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Con las características organolépticas que describen a continuación  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , en un depósito
                    con las siguientes características:  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , y registrándose las siguientes temperaturas 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . <br>
                    <br>
                    Fecha y Hora: <?php echo date('d-m-Y'); ?>, <?php echo date('H:i'); ?> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo aprecibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Interesado</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page;">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a lso fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de ahcerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la mismaaudiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.-</div></br>
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
        <footer class="footerActa" style="float: right"><p>Impreso en el Boletín Oficial e Imprenta del Estado</p></footer>
    </div>
    <div class="page_1" style="width: 100%;break-after:page;">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 20px">
            <h3><b>TRIPLICADO</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 20px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 30px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA INFRACCIÓN N° <span class="acta_caseId"></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <div style="text-indent: 30px;">
                    En la ciudad de San Juan, departamento . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . localidad . . . . . . . . . . . . . . . . . . . . a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                    siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , se constituyen en <span class="acta_puntoControl"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['nombre'] : '' ?></span> 
                    con domicilio en <span class="acta_puntoControlDomicilio"><?php echo isset($infoPuntoControl) ? $infoPuntoControl['domicilio'] : '' ?></span> propiedad de D.D.P. siendo atendidos por <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> en su carácter de chofer.<br>
                </div>
                <br>
                <div style="text-indent: 30px;">
                    Proceden a realizar la inspección de camión térmico, vehículo patente N° <span class="acta_patenteTractor"></span>, N° de habilitación del SENASA <span class="acta_numSenasa"></span>, Documentación Sanitaria tipo <span class="acta_docSanitaria"></span>
                    Establecimiento N° <span class="acta_origenNro"></span>, nombre del Establecimiento de Origen <span class="acta_estaOrigen"></span>, Transportista <span class="acta_transportista"></span>, telefono del transportista 
                    <span class="acta_telTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> correo electrónico del transportista <span class="acta_emailTransportista">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </span> 
                    destinos <span class="acta_destinos"></span> producto/s <span class="acta_productos"></span>, temperatura <span class="acta_temperaturas"></span>, precintos <span class="acta_precintos"></span>, Peso Bruto <span class="acta_bruto"></span>, 
                    Tara <span class="acta_tara"></span> kg, N° de Ticket <span class="acta_ticket"></span>.
                </div> 
                <br>
                <div style="text-indent: 30px;">
                    Observaciones: <span class="acta_observaciones"></span>.<br><br>
                </div>
                <div style="text-indent: 30px;">
                    Quedando como Depositario Judicial de la mercadería en cuestión, el señor/a . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , D.N.I. N°  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , Teléfono
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , correo electrónico  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , con domicilio legal  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ,
                    y domicilio comercial  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Con las características organolépticas que describen a continuación  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , en un depósito
                    con las siguientes características:  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . , y registrándose las siguientes temperaturas 
                    . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . <br>
                    <br>
                    Fecha y Hora: <?php echo date('d-m-Y'); ?>, <?php echo date('H:i'); ?> horas.<br>
                    <div class="firmaDepositario" style="text-align: right;">
                        <div style="text-align: center;">
                            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
                            <h5>Firma del Depositario Judicial</h5>
                        </div>
                    </div>
                </div>
                Se le emplaza  para que despúes de <b>cuarenta y ocho (48) horas</b> de labrada está y dentro de los cinco (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo aprecibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código. (Ver reverso) 
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Inspector</h5>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 40px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h5>Firma del Interesado</h5>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;break-after:page;">
        <div class="body_page_2">
            En este acto se procede a notificar al Sr/Sra <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> de los artículos N° 12 y N° 76 del código de faltas conforme la obligación
            impuesta en el artículo N° 68 del mismo código.
            </br>
            <b>ARTÍCULO 12.- Asistencia Letrada.</b> No es obligatoria la asistencia letrada en el juicio; pero se le hará saber al presunto infractor, en la primera oportunidad procesal y bajo pena de nulidad los
            derechos que le asisten, entre ellos el de concurrir con defensor letrado.
                <div style="text-indent: 30px;"> El juez podrá, en función de la complejidad de la causa, requerir asistencia letrada obligatoria. Si el imputado estuviera impedido de obtener los servicios de un letrado, se le proveerá de un defensor
                oficial.-</div>
            </br>
            <b>ARTÍCULO 76.- Audiencia en Juicio- Prueba.</b> El proceso se llevará a cabo en audiencia oral y pública, salvo que motivos de moralidad u orden público aconsejaren lo contrario, de lo cual el juez deberá
            dar funtamentos.</br>
            <div style="text-indent: 30px;">El juez procederá a interrogar al imputado a lso fines de su identificación, tras lo cual le hará conocer los antecedentes agregados a la causa.</div></br>
            <div style="text-indent: 30px;">Le informará asimismo sobre su derecho a declarar o de abstenerse de ahcerlo, sin que ello implique presunción en su contra y de nombrar defensor si lo quisiere.</div></br>
            <div style="text-indent: 30px;">Seguidamente, el magistrado oirá personalmente al imputado sobre el hecho que se le atribuye, pudiendo éste expresar todo cuanto considere conveniente en su descargo.</div></br>
            <div style="text-indent: 30px;">La prueba será ofrecida y producida en la mismaaudiencia. Si ello no fuere posible el juez podrá disponer la realización de nuevas audiencias.</div></br>
            <div style="text-indent: 30px;">Se labrará acta de lo sustancial, la que será suscrita por el juez y el secretario, pudiendo también hacerlo el imputado, los testigos y demás participantes del acto.</div></br>
            <div style="text-indent: 30px;">Cuando el juez lo considere conveniente aceptará la presentación de escritos o dispondrá que se tome versión escrita de las declaraciones, interrogatorios y careos.</div></br>
            <div style="text-indent: 30px;">Los planteos de inconstitucionalidad, incompetencia y prescripción deberán formularse por escrito.</div></br>
            <div style="text-indent: 30px;">El juez podrá disponer medidas para mejor proveer.</div></br>
            <div style="text-indent: 30px;">En todos los casos se dará al imputado oportunidad de controlar la producción de las pruebas.-</div></br>
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
        <footer class="footerActa" style="float: right"><p>Impreso en el Boletín Oficial e Imprenta del Estado</p></footer>
    </div>
</div><!--FIN ACTA-->