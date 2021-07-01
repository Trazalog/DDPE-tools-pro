<!-- The Modal -->
<div class="modal modal-fade" id="mdl-ingreso">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xmodal-body">
                <?php 
                   echo comp('frm-ingreso', base_url(SICP."Ingreso_barrera/view_ingreso"), true);
                ?>
            </div>
        </div>
    </div>
</div>