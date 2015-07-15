$("#confirm-delete").on('show.bs.modal', function(e) {
    $(this).find('#confirm').attr('href', $(e.relatedTarget).data('href'));
});