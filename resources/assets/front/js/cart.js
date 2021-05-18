JQuery(document).ready(function(){
    $('.addToCart').on('click', function(e){
        e.preventDefault()
        addToCart()
    })

    function addToCart()
    {
        let id = $('.addToCart').data('id')
        let count = parseInt($('#count-input').val())

        let totalCount = parseInt($('.menu__count').text())
        tolalCount += count
        $('.menu__count').text(totalCount)

        $.ajax({
            url: "{{ route('addToCart') }}",
            type: "POST",
            data: {
                id: id,
                count: count
            },
            headers: {

            },
            success: (data) => {
                console.log(data)
            },
            error: (data) => {
                console.log(data)
            }
        })
    }
})