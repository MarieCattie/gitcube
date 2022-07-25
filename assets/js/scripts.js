// Показать больше
$('.friends__showall').on('mouseenter', function() {
    $('.friends__showall .after').css({"animation-name": "rotate", "animation-duration": "1.3s", "animation-iteration-count": "infinite", "animation-timing-function": "ease-in-out", "animation-direction": "alternate"});
})
$('.friends__showall').on('mouseleave', function() {
    $('.friends__showall .after').css({"animation": "none"});
})

//Раскрывающееся меню
$('.user__arrow').on('click', function() {
    $('.submenu').slideToggle(500);
})
$('.show-more__popup__item-select').on('mouseover', function () {
    $('.show-more__popup-select').fadeIn()
})
$('.show-more__popup__item-select').on('mouseleave', function () {
    $('.show-more__popup-select').fadeOut()
})
//Публичный/приватный репозиторий
$('.show-more__popup-select-item').on('click', function() {
    $('.show-more__item-active').attr('data-type', $(this).attr('data-type'))
    $('.show-more__item-active').text($(this).text())
})
//Паралакс
// $(document).on('mousemove', e => {
//     $('body').css('background-position', `${e.clientX * 0.05}px ${e.clientY * 0.05}px`)
// })
//Поиск языка
$('.search-lang__input').on('input', function() {
    $(this).addClass('opened')
    $('.search-lang__result').show();
})
$('.search-lang__input').on('change', function() {
    if($('.search-lang__input').hasClass('opened')) {
        $(document).on('click', function(e) {
            if(!($(e.target).hasClass('choose-lang'))) {
                hideSearchResult() 
            }
        })
    }
})
$(document).on('click', '.choose-lang', function() {
    $('.search-lang__input').val($(this).text())
    hideSearchResult() 
})
function hideSearchResult() {
    $('.search-lang__result').hide();
}