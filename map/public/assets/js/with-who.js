$(document).ready(function () {

    $('.human').click(function () {
        if($(this).hasClass('active')){return;}
        $(this).addClass('active').append('<div class="overlay"></div>');
        return false;
    });
    $('.humans').on('click' , '.overlay, .btn-close',function () {
        $('.overlay').remove();
        $('.human').removeClass('active');
        return false;
    });


});
