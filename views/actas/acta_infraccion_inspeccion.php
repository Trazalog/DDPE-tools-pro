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
    <div class="page_1" style="width: 100%;page-break-after:always">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h3><b>SERVICIO VETERINARIO DE INSPECCIÓN SANITARIA</b></h3>
        </div>
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acta_caseId"></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
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
        <div style="width: 33%;text-align: center;float:left;margin-top: 50px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 33%;text-align: center;float:left;margin-top: 50px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Inspector</h4>
        </div>
        <div style="width: 32%;text-align: center;float:left;margin-top: 50px">
            <p>. . . . . . . . . . . . . . . . . . . . . . . . . . . . </p>
            <h4>Firma del Interesado</h4>
        </div>
    </div>
    <div class="page_2" style="width: 100%; margin-top: 60px;page-break-after:always">
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
            <p><b>INSPECTORES:</b> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
        <div style="width: 50%;text-align: center;margin-top: 50px;float:left">
            <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</p>
        </div>
        <footer class="footerActa" style="float: right"><p>Impreso en el Boletín Oficial e Imprenta del Estado</p></footer>
    </div>
</div><!--FIN ACTA-->