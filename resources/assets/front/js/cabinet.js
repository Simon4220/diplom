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