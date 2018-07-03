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

    // Check box de paices
    $('#all-countries').on('change', function() {
        if ($(this).is(':checked')) {
            $('.cbox-country').prop('checked', true)
        } else {
            $('.cbox-country').prop('checked', false)
        }
    })

    // checked if all countries selected
    // TODO: @Jquery Crear una funcion que checkee el checkbox general en el admin de paices.

     /*
     * Modal para eliminar Usuarios
     */
    $('a#delete-user').on('click', function(event) {
        event.preventDefault();
        var routeAction = $(this).attr('href');
        var $modal = $('#generalModal');
        var $form = $modal.find('form');
        var trFather = $(this).parent().parent().parent().parent();
        var user_name = trFather.find('td')[1].innerHTML;
        $form.attr('action', routeAction).attr('method', 'post');
        $modal.find('.modal-title').html('Eliminar usuario');
        $modal.find('.modal-body p').html('¿Seguro que quieres eliminar a <strong>'+user_name+'</strong> ?');
        $modal.find('#btn-submit').html('Eliminar');
        $modal.modal('show');
     });

     /*
	 * Modal para eliminar tramites
	 */
	$('a#delete-tramite').on('click', function(event) {
        event.preventDefault();
        var routeAction = $(this).attr('href');
        var $modal = $('#generalModal');
        var $form = $modal.find('form');
        var trFather = $(this).parent().parent().parent().parent();
        var num_tramite = trFather.find('td')[0].innerHTML;
        $form.attr('action', routeAction).attr('method', 'post');
        $modal.find('.modal-title').html('Eliminar tramite');
        $modal.find('.modal-body p').html('¿Seguro que quieres eliminar el tramite <strong>'+num_tramite+'</strong> ?');
        $modal.find('#btn-submit').html('Eliminar');
        $modal.modal('show');
     });

    // funcion para enviar un correo cuando se cambia el estatus del
    // requerimiento desde el administrador
    $('#form-detail-transaction #status').on('change', function(){
        var data = {};
        data.email = $(this).data('email');
        data.transaction = $(this).data('idtransaction');
        if($(this).val() == 'enviado') {
            var routeAction = '/admin/tramites/enviar-correo-status-ok?mail='+data.email+'&transaction='+data.transaction;
            var $modal = $('#modalNotification');
            var $name = $('td#reciver-name')[0].innerHTML + ' ' + $('td#reciver-last-name')[0].innerHTML; 
            $modal.find('.modal-title').html('Enviar correo de notificación');
            $modal.find('.modal-body p').html('Vas a enviar una notificacion vía correo electronico a ' + $name + ' al correo ' + data.email + ' para notificarle que su documento ha sido enviado.');
            $modal.find('.btn-submit').html('Enviar');
            $modal.modal('show');

            $('button.btn-submit').on('click', function (event){
                event.preventDefault();
                $modal.modal('hide');
                $.get(routeAction, function (json) {
                    $('html,body').animate({
                        scrollTop: $(".mainpanel").offset().top
                    }, 2000);
                    json = JSON.parse(json);
                    var html = '<div class="alert '+(json.exito ? 'alert-info' : 'alert-warning')+' fade in">' +
                                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                    json.message + '<br> Recuerda precionar el boton de <strong>Modificar</strong> para guardar el estatus final del tramite.' +
                                '</div>';
                    $('.contentpanel').prepend(html);
                });
            });
            
        }
    });


});