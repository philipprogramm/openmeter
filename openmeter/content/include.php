<!-- Modal <?php echo $modalId; ?> -->
<div class="modal fade" id="modal<?php echo $modalId; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $modalId; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel<?php echo $modalId; ?>"><?php echo($modalSettings["title"]); ?></h5>

                <?php
                    // only show top close button, if force_readall not true
                    if ($modalSettings["forceall"] == False){
                        ?>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Schließen">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        <?php
                    }
                ?>

            </div>

            <div class="modal-body">
                <?php
                    // echo the content
                    include($modalSettings["url"]);
                ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>