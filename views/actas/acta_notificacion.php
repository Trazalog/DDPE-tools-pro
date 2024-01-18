<style>
#actaInspeccionPCC{
    margin: 30px 20px;
}
@page { size: auto;  margin: 0mm; }
</style>
<?php
 setlocale(LC_TIME, 'es_ES.UTF-8');                                            
 $mes = strftime('%B', mktime(0, 0, 0, date('m')));
?>
<div id="actaInspeccionPCC" style="position:relative">
    <!-- ORIGINAL -->
    <div class="page_1" style="width: 100%;break-after:page">
        <div class="logoSJgobierno" style="width: 100%;float:left;margin-bottom: 7px;height: 80px;">
            <img src="lib/imageForms/logo_gobierno_sj_ddpe.png" alt="" style="object-fit: scale-down;max-width: 100%;">
        </div>
        <div style="width: 100%;text-align:right;margin-bottom: 35px">
            <h3><b>ORIGINAL</b></h3>
        </div>
        <div style="width: 100%;text-align:center; margin-bottom: 35px">
            <h2><b>ACTA DE NOTIFICACIÓN</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acta_contador"><?php echo $acta_notificacion->acno_id ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <p>
                    <span class="acta_diaInspeccion"><?php echo $diaInspeccion; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccion ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccion; ?></span>
                </p>
                <p>
                  <span class="acta_texto"><?php echo $acta_notificacion->texto ?></span>.<br><br>
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
            <h2><b>ACTA DE NOTIFICACIÓN</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acno_id"><?php echo $acta_notificacion->acno_id ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <p>
                    <span class="acta_diaInspeccion"><?php echo $diaInspeccion; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccion ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccion; ?></span>
                </p>
                <p>
                  <span class="acta_texto"><?php echo $acta_notificacion->texto ?></span>.<br><br>
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
            <h2><b>ACTA DE NOTIFICACIÓN</b></h2>
        </div>
        <div style="width: 100%;margin-bottom: 40px;">
            <h2 style="width: 100%;text-align: right;margin-right: 100px"><b>ACTA N° <span class="acno_id"><?php echo $acta_notificacion->acno_id ?></span></b></h2>
        </div>
        <div style="margin-bottom: 35px;width: 100%;">
            <div class="bodyActa" style="">
                <p>
                    <span class="acta_diaInspeccion"><?php echo $diaInspeccion; ?></span> días del mes de <span class="acta_mesInspeccion"><?php echo $mesInspeccion ?></span> del año <span class="acta_anioInspeccion"><?php echo $anioInspeccion; ?></span>
                </p>
                <p>
                  <span class="acta_texto"><?php echo $acta_notificacion->texto ?></span>.<br><br>
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