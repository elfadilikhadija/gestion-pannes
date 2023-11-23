$('.button').on('click', function () {
    $('.login').addClass('loading').delay(2200).queue(function () {
        $(this).addClass('active')
    });
});