$(document).ready(function () {

	/*
	 * Modal para eliminar Atributo
	 */
	$('a#delete-attribute').on('click', function(event) {
        event.preventDefault();
        var routeAction = $(this).attr('href');
        var $modal = $('#generalModal');
        var $form = $modal.find('form');
        var trFather = $(this).parent().parent().parent().parent();
        var attribute = trFather.find('td')[2].innerHTML;
        $form.attr('action', routeAction).attr('method', 'post');
        $modal.find('.modal-title').html('Eliminar atributo');
        $modal.find('.modal-body p').html('¿Seguro que quieres eliminar a <strong>'+attribute+'</strong> ?');
        $modal.find('#btn-submit').html('Eliminar');
        $modal.modal('show');
     });


});