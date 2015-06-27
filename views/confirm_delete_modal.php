<div id="confirm-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the website?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a id="confirm" href="../delete.php?id=<?php echo $website['id'] ?>" class="btn btn-primary" role="button">Delete</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Dialog show event handler -->
<!--<script type="text/javascript">-->
<!--    $('#confirm').on('show.bs.modal', function (e) {-->
<!--        $message = $(e.relatedTarget).attr('data-message');-->
<!--        $(this).find('.modal-body p').text($message);-->
<!--        $title = $(e.relatedTarget).attr('data-title');-->
<!--        $(this).find('.modal-title').text($title);-->
<!--        // Pass form reference to modal for submission on yes/ok-->
<!--        var form = $(e.relatedTarget).closest('form');-->
<!--        $(this).find('.modal-footer #confirm').data('form', form);-->
<!--    });-->
<!--    <!-- Form confirm (yes/ok) handler, submits form -->-->
<!--    $('#confirm').find('.modal-footer #confirm').on('click', function(){-->
<!--        $(this).data('form').submit();-->
<!--    });-->
<!--</script>-->
