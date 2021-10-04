<style>
#actaInfraccionPCC{
    margin: 30px 20px;
}
@page { size: auto;  margin: 0mm; }
</style>
<?php
 setlocale(LC_TIME, 'es_ra.utf-8');                                            
 $mes = strftime('%B', mktime(0, 0, 0, date('m')));
?>
<div id="actaInspeccionPCC" style="">
    <div class="col-md-5" style="width: 50%;float:left">
        <div class="logoSJgobierno" style="margin-bottom: 7px">
            <img src="lib/imageForms/logo_gobierno_sj.png" alt="" style="max-height: 80px;">
        </div>
        <p><b>SECRETARÍA DE AGRICULTURA, GANADERÍA Y AGROINDUSTRIA</b></p>
        <p><b>DIRECCIÓN DE DESARROLLO PECUARIO</b></p>
        <p><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></p>
    </div>
    <div class="col-md-6" style="width: 50%;float:left">
        <h3>ACTA DE INFRACCIÓN N° <span class="acta_caseId"></span></h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 35px;width: 100%; float:left">
        <div class="bodyActa" style="">
                En la provincia de San Juan, departamento . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . localidad . . . . . . . . . . . . . . . . . . . . . . a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . se constituyen en 
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . con domicilio en 
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . propiedad de D.D.P siendo atendidos por <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> en su carácter de chofer. PROCEDEN a <span class="acta_observaciones"></span>.</br>
                Vehículo patente <span class="acta_patenteTractor"></span></br>
                N° de habilitación de SENASA <span class="acta_numSenasa"></span></br>
                Permisos de Tránsito <span class="acta_permisos"></span></br>
                Establecimiento N° <span class="acta_estaNum"></span></br>
                Nombre del Establecimiento de Origen <span class="acta_estaOrigen"></span></br>
                Transportista <span class="acta_transportista"></span></br>
                Correo electrónico <span class="acta_transportista"></span></br>
                Destino <span class="acta_destinos"></span></br> 
                Producto/s <span class="acta_productos"></span></br>
                Precinto/s - Temperatura <span class="acta_precintoTemperatura"></span></br>
                
                Peso Bruto <span class="acta_bruto"></span> Tara <span class="acta_tara"></span> Número de Ticket <span class="acta_ticket"></span></br>
                Se le emplaza al infractor para que despúes de <b>cuarenta y ocho(48) horas</b> de labrada está y dentro de los (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo aprecibimientos de hacerlo
                concurrir con la fuerza pública. Se procede a notificar de los artículos N° 12 y 76 del Código de Faltas, conforme a la obligación impuesta en el Artículo N° 68 del mismo código.<b>(Ver reverso)</b>
        </div>
    </div>
    <div class="col-md-4" style="text-align: center;float:left; margin-left:10px">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
    <div class="col-md-4" style="text-align: center;float:left">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
    <div class="col-md-4" style="text-align: center;float:left">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
</div>