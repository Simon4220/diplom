$(document).ready(function () {
    $('.tabs-headers').children(':first-child').addClass('header-active')
    $('.tabs-content').children(':first-child').addClass('content-active')

    $('.child-button').on('click', function () {
        let categoryId = $(this).attr('data-category');
        $('.button-hor[data-category=' + categoryId + ']').toggleClass('button-hor-activ');
        $('.button-ver[data-category=' + categoryId + ']').toggleClass('button-ver-activ');

        let count = $('.childs_category[data-category=' + categoryId + ']').find(".child_elem").length;
        let heightElem = count * 60;
        if ($('.childs_category[data-category=' + categoryId + ']').css('height') == '0px') {
            $('.childs_category[data-category=' + categoryId + ']').css('height', heightElem + 'px')
        } else {
            $('.childs_category[data-category=' + categoryId + ']').css('height', '0px')
        }
    });
    $('.child-button-active').on('click', function () {
        $(this).toggleClass('child-button-activ').toggleClass('child-button');
        $('.button-hor').toggleClass('button-hor-activ')
        $('.button-ver').toggleClass('button-ver-activ')
    });

    $('#spec-btn').on('click', function () {
        $('.specification').addClass('header-active')
        $('.description').removeClass('header-active')
        $('.application').removeClass('header-active')
        $('.specification-content').addClass('content-active')
        $('.description-content').removeClass('content-active')
        $('.application-content').removeClass('content-active')

    });
    $('#desc-btn').on('click', function () {
        $('.description').addClass('header-active')
        $('.specification').removeClass('header-active')
        $('.application').removeClass('header-active')
        $('.description-content').addClass('content-active')
        $('.specification-content').removeClass('content-active')
        $('.application-content').removeClass('content-active')
    });
    $('#app-btn').on('click', function () {
        $('.application').addClass('header-active')
        $('.specification').removeClass('header-active')
        $('.description').removeClass('header-active')
        $('.application-content').addClass('content-active')
        $('.specification-content').removeClass('content-active')
        $('.description-content').removeClass('content-active')
    });

    $('#count-input').bind("change keyup input click", function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    })
    initCount()
    function initCount() {
        if ($('.option-count').length) {
            let input = $('#count-input');
            let incButton = $('#up');
            let decButton = $('#down');
            let beforeValue;
            let afterValue;
            incButton.on('click', function () {
                beforeValue = input.val()
                afterValue = parseFloat(beforeValue) + 1;
                input.val(afterValue);
            });

            decButton.on('click', function () {
                beforeValue = input.val()
                if (beforeValue > 1) {
                    afterValue = parseFloat(beforeValue) - 1;
                    input.val(afterValue);
                }
            });

        }
    }
})