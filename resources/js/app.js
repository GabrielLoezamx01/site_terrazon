import $ from 'jquery';
import * as bootstrap from 'bootstrap';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
window.$ = window.jQuery = $;
window.noUiSlider = noUiSlider;


$(document).ready(function () {
    function showCustomToast(title, message) {
        // Crear el elemento toast
        var toastElement = document.createElement('div');
        toastElement.className = 'toast mb-1';
        toastElement.setAttribute('role', 'alert');
        toastElement.setAttribute('aria-live', 'assertive');
        toastElement.setAttribute('aria-atomic', 'true');

        // Crear el contenido del toast
        var toastContent = `
            <div class="toast-header">
                <strong class="me-auto toast-title">${title}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body toast-message">
                ${message}
            </div>
        `;
        // Añadir el contenido al elemento toast
        toastElement.innerHTML = toastContent;
        // Añadir el toast al contenedor de toasts (asumiendo que tienes un contenedor con id 'toastContainer')
        var toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.style.position = 'fixed';
            toastContainer.style.top = '10px';
            toastContainer.style.right = '20px';
            document.body.appendChild(toastContainer);
        }
        toastContainer.appendChild(toastElement);
        // Inicializar y mostrar el toast
        var bsToast = new bootstrap.Toast(toastElement);
        bsToast.show();
    }

    function toogleFavorite(idProperty, idFav) {
        let $idFav = $(idFav);
        $.ajax({
            url: `/user/favorite/${idProperty}`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            success: function (response) {
                if (response.status == 1) {
                    $idFav.addClass('active');
                    showCustomToast("Favoritos", "La propiedad se ha añadido a sus favoritos");
                } else {
                    $idFav.removeClass('active');
                    showCustomToast("Favoritos", "La propiedad se ha quitado de sus favoritos");
                }

            },
            error: function (xhr, status, error) {
                showCustomToast("Inicie sesión", "Para añadir a favoritos favor de iniciar sesión");
            }
        });
    }
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/api/contact',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#message').html('<p style="color: green;">' + response.message + '</p>');
                $('#contactForm')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    $('#message').html('<p style="color: red;">' + errorMessage + '</p>');
                } else {
                    $('#message').html('<p style="color: red;">Ha ocurrido un error. Por favor, inténtalo de nuevo.</p>');
                }
            }
        });
    });

 
    $('#suscribeForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/api/suscribe',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                showCustomToast("¡Gracias por suscribirte!", "Gracias por suscribirte a nuestro boletín");
                $('#suscribeForm')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    showCustomToast("Error al suscribirse", errorMessage);
                } else {
                    showCustomToast("Error al suscribirse",'<p style="color: red;">Ha ocurrido un error. Por favor, inténtalo de nuevo.</p>');
                }
            }
        });
    });
    $('#suscribeFooter').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/api/suscribe',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                showCustomToast("¡Gracias por suscribirte!", "Gracias por suscribirte a nuestro boletín");
                $('#suscribeFooter')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                    });
                    showCustomToast("Error al suscribirse", errorMessage);
                } else {
                    showCustomToast("Error al suscribirse",'<p style="color: red;">Ha ocurrido un error. Por favor, inténtalo de nuevo.</p>');
                }
            }
        });
    });
    window.toogleFavorite = toogleFavorite;
});
