$(function() {
    // Selecciona el modal de eliminar por su ID y crea una instancia de Modal de Bootstrap
    const modal_eliminar_elemento = $('#modal-eliminar');
    const modal_eliminar = new bootstrap.Modal(modal_eliminar_elemento[0], {
        backdrop: 'static'
    });

    let id = null; // Variable para almacenar el ID del restaurante a eliminar

    // Evento al hacer clic en el botón de eliminar restaurante
    $('.eliminar-restaurante').on('click', function() {
        id = $(this).attr('data-id'); // Obtiene el ID del restaurante
        let nombre = $(this).closest('.restaurante').find('.nombre-restaurante').html(); // Obtiene el nombre del restaurante
        // Actualiza el contenido del cuerpo del modal con el nombre del restaurante a eliminar
        $('.modal-body', modal_eliminar_elemento).html(`¿Estás seguro de que quieres eliminar el restaurante <i>${nombre}</i>?`);
        modal_eliminar.show(); // Muestra el modal de eliminar
    });

    // Evento al hacer clic en el botón de cerrar el modal
    modal_eliminar_elemento.on('click', '.cerrar', function() {
        modal_eliminar.hide(); // Oculta el modal de eliminar
    }).on('click', '.eliminar', function() {
        // Evento al hacer clic en el botón de eliminar dentro del modal
        let data = {
            '_token': $('meta[name="csrf-token"]').attr('content') // Obtiene el token CSRF
        };
        // Realiza una solicitud POST para eliminar el restaurante con el ID correspondiente
        $.post(BASE_URL + `restaurantes/${id}/eliminar`, data, function() {
            location.reload(); // Recarga la página después de eliminar el restaurante
        });
    });
});
