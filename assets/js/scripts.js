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

//Смена названия шорткода
$('.shortcode').on('click', '.shortcode__title', function(e) {
    e.stopPropagation()
    let name = $(this).text()
    $('#postitle-container').before(`<div class="container-flex shortcode__form"><input type="text" class="shortcode__field" value="${name}"><a href='' class="btn shortcode__btn">Сохранить</a</div>`)
    $(this).remove()
})
window.onclick = function(e) {
    if(!$('.shortcode__title').length && e.target.tagName !== 'button' && e.target.tagName !== 'a' && e.target.tagName !== 'input') {
        e.preventDefault()
        console.log(e.target.tagName)
        $('#postitle-container').before(`<h1 class="title-1 shortcode__title">`+$('.shortcode__field').val()+`</h1>`)    
        $('.shortcode__form').remove()
    }
    $('.show-more .show-more__popup').fadeOut()


}
//Действие по кнопке Сохранить при смене названия
$('.shortcode').on('click', '.shortcode__field', function(e) {
    e.stopPropagation()
})
$('.shortcode').on('click', '.shortcode__btn', function(e) {
    e.stopPropagation()
})
//При клике вне модального окна, оно скрывается
$('.show-more').on('click', function(e) {
    e.stopPropagation()
    $('.show-more .show-more__popup').css("display", "flex")
    .fadeIn();
})