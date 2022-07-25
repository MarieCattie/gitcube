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