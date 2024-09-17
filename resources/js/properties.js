require('owl.carousel');
$(document).ready(function () {

    var owlOptions = {
        center: false,
        loop: true,
        nav: false,
        dots: false,
        rewindNav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1.1
            },
            768: {
                items: 1.5
            },
            980: {
                items: 2
            },
            1260: {
                items: 2.5
            },
            1340: {
                items: 3
            }
        },
        onTranslated: updateProgressBar,
        onInitialized: updateProgressBar
    }
    var owlOptionsViewed = {
        center: false,
        loop: false,
        nav: false,
        dots: false,
        rewindNav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1.1
            },
            768: {
                items: 1.5
            },
            980: {
                items: 2
            },
            1260: {
                items: 2.5
            },
            1340: {
                items: 3
            }
        },
        onTranslated: updateProgressBar,
        onInitialized: updateProgressBar
    }



    var owl1 = $('#carr1').owlCarousel(owlOptions);
    var owl2 = $('#carr2').owlCarousel(owlOptions);
    var owl3 = $('#viewedSlider').owlCarousel(owlOptionsViewed);
    $('#carr1_next').click(function () {
        owl1.trigger('next.owl.carousel');
    });
    $('#carr2_next').click(function () {
        owl2.trigger('next.owl.carousel');
    });
    $('#viewedSlider_next').click(function () {
        owl3.trigger('next.owl.carousel');
    });

    $(window).resize(function () {
        owl1.trigger('refresh.owl.carousel');
        owl2.trigger('refresh.owl.carousel');
        owl3.trigger('refresh.owl.carousel');
    });

    var toggleFilters = document.getElementById('toggleFilters');
    var toggleFilters2 = document.getElementById('toggleFilters2');

    var slider = document.getElementById('slider');
    var sliderMobile = document.getElementById('sliderMobile');
    var budgetInput = document.getElementById('budget').value;
    var budgetArray = budgetInput.split('-');

    var startRange = (typeof budgetArray[0] != 'undefined') ? parseFloat(budgetArray[0]) : 0;
    var endRange = (typeof budgetArray[1] != 'undefined') ? parseFloat(budgetArray[1]) : 0;

    var budg1 = document.getElementById('budg1');
    var budg2 = document.getElementById('budg2');
    var mbudg1 = document.getElementById('mbudg1');
    var mbudg2 = document.getElementById('mbudg2');

    if (toggleFilters) {
        toggleFilters.addEventListener('click', function () {
            toogleFilter();
        });
    }
    if (toggleFilters2) {
        toggleFilters2.addEventListener('click', function () {
            toogleFilter();
        });
    }

    $("#filterForm").on("change", "input.chk_action:checkbox", function () {
        $("#filterForm").submit();
    });
    $("#filterForm").on("change", ".select_actions", function () {
        $("#filterForm").submit();
    });
    

    if (slider) {
        noUiSlider.create(slider, {
            start: [startRange, endRange],
            connect: true,
            step: 500000,
            range: {
                'min': 0,
                'max': 10000000
            }
        });
        slider.noUiSlider.on('update', function (values, handle) {
            budg1.innerHTML = formatNumber(formatToNumber(values[0]));
            budg2.innerHTML = formatNumber(formatToNumber(values[1]));
            budget.value = formatToNumber(values[0]) + "-" + formatToNumber(values[1]);

        });
        slider.noUiSlider.on('end', function (values, handle) {
            $("#filterForm").submit();
        });
    }
    if (sliderMobile) {
        noUiSlider.create(sliderMobile, {
            start: [startRange, endRange],
            connect: true,
            step: 500000,
            range: {
                'min': 0,
                'max': 10000000
            }
        });
        sliderMobile.noUiSlider.on('update', function (values, handle) {
            mbudg1.innerHTML = formatNumber(formatToNumber(values[0]));
            mbudg2.innerHTML = formatNumber(formatToNumber(values[1]));
            budget.value = formatToNumber(values[0]) + "-" + formatToNumber(values[1]);

        });
        sliderMobile.noUiSlider.on('end', function (values, handle) {
            $("#filterForm").submit();
        });
    }
    $("#chk_1").on('change', function () {
        var isChecked = $(this).is(':checked');
        $('input[name="type[]"]').prop('checked', isChecked); 
        $("#filterForm").submit();
    });
    var submitLocation = function (data) {
        $("#location").val(data);
        $("#filterForm").submit();
    }


    function updateProgressBar(event) {
        var pageSize = event.page.size;
        var items = event.item.count + pageSize; // Número total de slides
        var item = event.item.index + 1; // Slide actual (comienza en 0, por lo tanto sumamos 1)
        var progress = (item / items) * 100; // Porcentaje de progreso
        $('#progress-' + event.target.id).css('width', progress + '%'); // Actualizar el ancho de la barra de progreso
    }

    function toogleFilter() {
        var desktoFilter = document.getElementById('filter-desktop');
        var filter = document.getElementById('filter');
        if (filter.classList.contains('d-md-none')) {
            filter.classList.remove('d-md-none');
            desktoFilter.classList.add('d-md-none');
        } else {
            filter.classList.add('d-md-none');
            desktoFilter.classList.remove('d-md-none');
        }
        var wrapper = document.getElementById('contentWrapper');
        if (wrapper.classList.contains('col-md-12')) {
            wrapper.classList.remove('col-md-12');
            wrapper.classList.add('col-md-9');
        } else {
            wrapper.classList.remove('col-md-9');
            wrapper.classList.add('col-md-12');
        }

        var items = document.getElementsByClassName('results-items');
        for (var i = 0; i < items.length; i++) {
            if (items[i].classList.contains('col-md-4')) {
                items[i].classList.remove('col-md-4');
                items[i].classList.add('col-md-6');
            } else {
                items[i].classList.remove('col-md-6');
                items[i].classList.add('col-md-4');
            }
        }
    }

    function formatToNumber(valor) {
        let resultado = valor.replace(/[^0-9.]/g, '');
        return parseInt(resultado);
    }

    function formatNumber(n) {
        return '$ ' + Math.trunc(n).toLocaleString('en-US');
    }

    function formatCurrency(input) {
        var input_val = input.val();
        if (input_val === "") {
            return;
        }
        input_val = formatNumber(input_val);
        input.val(input_val);
    }

    window.submitLocation = submitLocation;
});
