// モーダル部分
$(function () {
    $('.modalopen').each(function () {
        $(this).on('click', function () {
        var target = $(this).data('target');
        console.log(target);
        var modal = document.getElementById(target);
        $(modal).fadeIn();
        return false;
        });
    });
    // $('.modalClose').on('click', function () {
    //     $('.js-modal').fadeOut();
    //     return false;
    // });
});

//ハンバーガーメニュー
$(function () {
    $('.menuname').on('click', function (){
        $('.menu').slideToggle();
    });
});