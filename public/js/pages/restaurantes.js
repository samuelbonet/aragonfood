$(function() {

    const modal_eliminar_elemento = $('#modal-eliminar');
    const modal_eliminar = new bootstrap.Modal(modal_eliminar_elemento[0], {
		backdrop: 'static'
	});
	let id = null;
	

	$('.eliminar-restaurante').on('click', function() {
		id = $(this).attr('data-id');
		let nombre = $(this).closest('.restaurante').find('.nombre-restaurante').html();
		$('.modal-body', modal_eliminar_elemento).html(`¿Estás seguro de que quieres eliminar el restaurante <i>${nombre}</i>?`)
		modal_eliminar.show();
	});	


	modal_eliminar_elemento.on('click', '.cerrar', function () {
		modal_eliminar.hide();

	}).on('click', '.eliminar', function () {
		let data = {
			'_token': $('meta[name="csrf-token"]').attr('content')
		};
		$.post(BASE_URL + `restaurantes/${id}/eliminar`, data, function() {
			location.reload();
		})
	});
})