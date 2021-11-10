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
<div id="actaInfraccionPCC" style="">
    <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px">
        <img src="lib/imageForms/logo_gobierno_sj.png" alt="" style="max-height: 80px;">
    </div>
    <div style="width: 50%;float:left">
        <p><b>SECRETARÍA DE AGRICULTURA, GANADERÍA Y AGROINDUSTRIA</b></p>
        <p><b>DIRECCIÓN DE DESARROLLO PECUARIO</b></p>
        <p><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></p>
    </div>
    <div style="width: 50%;float:left">
        <h3>ACTA DE INFRACCIÓN N° <span class="acta_caseId"></span></h2>
    </div>
    <div style="margin-bottom: 35px;width: 100%; float:left">
        <div class="bodyActa" style="">
                En la provincia de San Juan, departamento . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . localidad . . . . . . . . . . . . . . . . . . . . . . a los <?php echo date('d'); ?> días del mes de <?php echo $mes; ?> del año <?php echo date('Y'); ?>,
                siendo las <?php echo date('H'); ?> horas.  Los inspectores del S. V. I. S. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . se constituyen en 
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . 
                Y proceden a constatar las siguientes infracciones <span class="acta_infraccion">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</span>.
                Se imputa en los hechos al Sr <span class="acta_chofer"></span> D.N.I. N° <span class="acta_dniChofer"></span> domicilio . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                Dpto . . . . . . . . . . . . . . . . . . . . . . . . . .  Por infracción a los arts. 163 y 185 del Código de Faltas 941-R y la Ley Federal de Carnes N° 22375, su decreto reglamentario 4238/68, Ley provincial 256-J . . . . . . . . . 
                . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Conforme lo autoriza el artículo 72 del Código de Faltas, se procede al secuestro de la mercadería y el vehículo que
                la traslada, consistente en un . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                dominio <span class="acta_patenteTractor"></span> N° de habilitación del SENASA <span class="acta_numSenasa"></span> Dejando como depositario judicial al Sr . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                D.N.I. N° . . . . . . . . . . . . . . . . . . . . . . <b><u>Quien acepta el cargo</u></b>. Por lo antes expuesto se procede a colocar <span class="acta_cantFajas"></span> faja/s de clausura en el vehículo intervenido,
                 dado que infringe La Ley Federal de Carnes N° 22375, su decreto reglamentario 4238/68, Ley provincial 256-J y Código de Faltas 941-R . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                Observaciones: <span class="acta_observaciones"></span>.
                Conforme lo prevé el art. 68° del Código de faltas . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
                Se le emplaza al infractor para que despúes de <b>cuarenta y ocho(48) horas</b> de labrada está y dentro de los (5) días hábiles subsiguientes, comparezca ante el Juez de Faltas de la Jurisdicción, bajo aprecibimientos de hacerlo
                concurrir con la fuerza pública.
        </div>
    </div>
    <div style="width: 30%;text-align: center;float:left; margin-left:10px">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
    <div style="width: 30%;text-align: center;float:left">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
    <div style="width: 30%;text-align: center;float:left">
        <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
        <h4>Firma del inspector</h4>
        <h4>Sello</h4>
    </div>
</div>