<style>
#actaReprecintado{
    margin: 30px 20px;
}
@page { size: auto;  margin: 0mm; }
</style>
<?php
 setlocale(LC_TIME, 'es_ES.UTF-8');                                            
 $mes = strftime('%B', mktime(0, 0, 0, date('m')));
?>
<div id="actaReprecintado" style="position:relative">
    <!-- ORIGINAL -->
    <div class="page_1" style="width: 100%;break-after:page">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 35px">
            <h3><b>ORIGINAL</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h2><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acta_contador"><?php echo $inspeccion->numerador_reprecintado ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <p>
                  En la ciudad de San Juan, Departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, Localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span>, a los <span class="acta_diaInspeccion"><?php echo $diaInspeccionReprecintado; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccionReprecintado ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccionReprecintado; ?></span>,
                siendo las <span class="acta_horaInspeccion"><?php echo $horaInspeccionReprecintado; ?></span> horas.  Los inspectores del S. V. I. S <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> con domicilio en 
                 <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="acta_dniChofer"><?php echo $inspeccion->chof_id; ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                 Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>. Termico/s patente/s: </span><span class="acta_term_patente"><?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->patente. "; ";} ?></span>.</br>
                 <span class="acta_docSanitaria">
                 <?php if ($inspeccion->permisos_transito->permiso_transito) { ?> <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { if($permiso->reprecintado == 'true') { echo "Tipo de PT " . $permiso->tipo. " | N° de permiso " . $permiso->perm_id .   " | Producto " . $permiso->productos .  " | Temperatura " .$permiso->temperatura. " | Empresa de origen " .$permiso->origen_nom ; foreach ($destinos as $destino){ if($permiso->perm_id == $destino->perm_id ){ echo " | Destino " . $destino->departamento. " | Domicilio " . $destino->calle. ", ".$destino->altura ;}}echo "</br>";} }?><?php }?></span>
                 Transportista <span class="acta_transportista"><?php echo $transportista->razon_social ?></span>, teléfono del transportista 
                 <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                 precintos <span class="acta_precintos"><?php if ($inspeccion->precinto_reprecintado) { echo $inspeccion->precinto_reprecintado. " ";} ?></span>, Peso Bruto <span class="acta_bruto"><?php echo $inspeccion->bruto ?></span>, 
                 Tara <span class="acta_tara"><?php echo $inspeccion->tara ?></span> kg, N° de Ticket <span class="acta_ticket"><?php echo $inspeccion->ticket ?></span>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['descripcion']; ?></span>.
                 Observaciones: <span class="acta_observaciones"><?php echo $inspeccion->observaciones ?></span>.<br><br>
                </p>
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Interesado</h4>
        </div>
    </div>
    <!--FIN ORIGINAL-->
    <!-- DUPLICADO -->
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
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acta_contador"><?php echo $inspeccion->numerador_reprecintado ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
            <p>
                  En la ciudad de San Juan, Departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, Localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span>, a los <span class="acta_diaInspeccion"><?php echo $diaInspeccionReprecintado; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccionReprecintado ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccionReprecintado; ?></span>,
                siendo las <span class="acta_horaInspeccion"><?php echo $horaInspeccionReprecintado; ?></span> horas.  Los inspectores del S. V. I. S <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> con domicilio en 
                 <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="acta_dniChofer"><?php echo $inspeccion->chof_id; ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                 Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>. Termico/s patente/s: </span><span class="acta_term_patente"><?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->patente. "; ";} ?></span>.</br>
                 <span class="acta_docSanitaria">
                 <?php if ($inspeccion->permisos_transito->permiso_transito) { ?> <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { if($permiso->reprecintado == 'true') { echo "Tipo de PT " . $permiso->tipo. " | N° de permiso " . $permiso->perm_id .   " | Producto " . $permiso->productos .  " | Temperatura " .$permiso->temperatura. " | Empresa de origen " .$permiso->origen_nom ; foreach ($destinos as $destino){ if($permiso->perm_id == $destino->perm_id ){ echo " | Destino " . $destino->departamento. " | Domicilio " . $destino->calle. ", ".$destino->altura ;}}echo "</br>";} }?><?php }?></span>
                 Transportista <span class="acta_transportista"><?php echo $transportista->razon_social ?></span>, teléfono del transportista 
                 <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                 precintos <span class="acta_precintos"><?php  if ($inspeccion->precinto_reprecintado) { echo $inspeccion->precinto_reprecintado. " ";} ?></span>, Peso Bruto <span class="acta_bruto"><?php echo $inspeccion->bruto ?></span>, 
                 Tara <span class="acta_tara"><?php echo $inspeccion->tara ?></span> kg, N° de Ticket <span class="acta_ticket"><?php echo $inspeccion->ticket ?></span>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['descripcion']; ?></span>.
                 Observaciones: <span class="acta_observaciones"><?php echo $inspeccion->observaciones ?></span>.<br><br>
                </p>
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Interesado</h4>
        </div>
    </div>
    <!--FIN DUPLICADO-->
    <!--TRIPLICADO-->
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
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acta_contador"><?php echo $inspeccion->numerador_reprecintado ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
            <p>
                  En la ciudad de San Juan, Departamento <span class="acta_depto"><?php echo $inspeccion->departamento ?></span>, Localidad <span class="acta_localidad"><?php echo $inspeccion->localidad ?></span>, a los <span class="acta_diaInspeccion"><?php echo $diaInspeccionReprecintado; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccionReprecintado ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccionReprecintado; ?></span>,
                siendo las <span class="acta_horaInspeccion"><?php echo $horaInspeccionReprecintado; ?></span> horas.  Los inspectores del S. V. I. S <span class="acta_inspectores"><?php echo $inspeccion->inspectores ?></span>, se constituyen en <span class="acta_puntoControl"><?php echo $inspeccion->se_constituye ?></span> con domicilio en 
                 <span class="acta_puntoControlDomicilio"><?php echo $inspeccion->domicilio_constituye ?></span> propiedad de <span class="acta_propiedadDe"><?php echo $inspeccion->propiedad_de ?></span>. siendo atendidos por <span class="acta_quienAtendio"><?php echo $inspeccion->atendidos_por ?></span> D.N.I. N° <span class="acta_dniChofer"><?php echo $inspeccion->chof_id; ?></span> en su carácter de <span class="acta_caracter"><?php echo $inspeccion->caracter_de ?></span>.<br>
                 Proceden a <span class="acta_procedenA"><?php echo $inspeccion->proceden_a ?></span>. Termico/s patente/s: </span><span class="acta_term_patente"><?php foreach ($inspeccion->termicos->termico as $termico) { echo $termico->patente. "; ";} ?></span>.</br>
                 <span class="acta_docSanitaria">
                 <?php if ($inspeccion->permisos_transito->permiso_transito) { ?> <?php foreach ($inspeccion->permisos_transito->permiso_transito as $permiso) { if($permiso->reprecintado == 'true') { echo "Tipo de PT " . $permiso->tipo. " | N° de permiso " . $permiso->perm_id .   " | Producto " . $permiso->productos .  " | Temperatura " .$permiso->temperatura. " | Empresa de origen " .$permiso->origen_nom ; foreach ($destinos as $destino){ if($permiso->perm_id == $destino->perm_id ){ echo " | Destino " . $destino->departamento. " | Domicilio " . $destino->calle. ", ".$destino->altura ;}}echo "</br>";} }?><?php }?></span>
                 Transportista <span class="acta_transportista"><?php echo $transportista->razon_social ?></span>, teléfono del transportista 
                 <span class="acta_telTransportista"><?php echo $inspeccion->tel_transportista ?></span> correo electrónico del transportista <span class="acta_emailTransportista"><?php echo $inspeccion->email_transportista ?></span> 
                 precintos <span class="acta_precintos"><?php  if ($inspeccion->precinto_reprecintado) { echo $inspeccion->precinto_reprecintado. " ";} ?></span>, Peso Bruto <span class="acta_bruto"><?php echo $inspeccion->bruto ?></span>, 
                 Tara <span class="acta_tara"><?php echo $inspeccion->tara ?></span> kg, N° de Ticket <span class="acta_ticket"><?php echo $inspeccion->ticket ?></span>. Tipo de documentación <span class="acta_tpoDocumentacion"><?php echo $datosEscaneo['doc_impo']['descripcion']; ?></span>.
                 Observaciones: <span class="acta_observaciones"><?php echo $inspeccion->observaciones ?></span>.<br><br>
                </p>
            </div>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 150px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Interesado</h4>
        </div>
    </div>
    <!-- FIN TRIPLICADO -->
</div><!--FIN ACTA-->