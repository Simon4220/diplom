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
$(document).ready(function() {
    $(document).on('click', '#orderShow', function() {
        let numberOrder = $(this).data('order')
        console.log($('body').find('#modalOrder'+numberOrder))
        $('#modalOrder' + numberOrder).css('transition', '300ms')
        $('#modalOrder' + numberOrder).css('visibility', 'visible')
        $('#modalOrder' + numberOrder).css('opacity', '1')

        $('body').css('height', '100vh')
        $('body').css('overflowY', 'hidden')
        $('body').css('paddingRight', '17px')
    })
    $(document).on('click', '.order__content', function(e) {
        e.stopPropagation();
    })
    $(document).on('click', '.modalOrder', function() {
        $('.modalOrder').removeAttr('style')
        $('body').removeAttr('style')
    })
})
document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('openAuth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "visible";
        document.getElementById('modalAuth').style.opacity = "1";
        document.body.style.height = "100vh";
        document.body.style.overflowY = "hidden";
        document.body.style.paddingRight = "17px";
    })
    document.getElementById('modalAuth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "hidden";
        document.getElementById('modalAuth').style.opacity = "0";
        document.body.style.height = "";
        document.body.style.overflowY = "visible";
        document.body.style.paddingRight = "";
    })
    document.getElementById('modal-href-to-auth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "visible";
        document.getElementById('modalAuth').style.opacity = "1";
        document.getElementById('modalReg').style.visibility = "hidden";
        document.getElementById('modalReg').style.opacity = "0";
    })
    document.getElementById('modalAuth__content').addEventListener('click', function(e){
        e.stopPropagation();
    })
    document.getElementById('modalReg__content').addEventListener('click', function(e){
        e.stopPropagation();
    })
    document.getElementById('modal-href-to-register').addEventListener('click', function(){
        document.getElementById('modalReg').style.visibility = "visible";
        document.getElementById('modalReg').style.opacity = "1";
        document.getElementById('modalAuth').style.visibility = "hidden";
        document.getElementById('modalAuth').style.opacity = "0";
    })
    document.getElementById('modalReg').addEventListener('click', function(){
        document.getElementById('modalReg').style.visibility = "hidden";
        document.getElementById('modalReg').style.opacity = "0";
        document.body.style.height = "";
        document.body.style.overflowY = "visible";
        document.body.style.paddingRight = "";
    })

})
$(document).ready(function(){
    $('.content__form').submit(function(event){
        console.log(event)
    })
})
$('input[id="search"]').keydown(function(e) {
    if (e.keyCode === 13) {
        console.log(window.location.pathname)
    }
})

function search(event) {

}