$('#enter-btn').on('click', function() {
    toggleForm($('#register'), $('#enter'))
    toggleForm($('#enter-question'), $('#register-question'))
})

$('#register-btn').on('click', function() {
    toggleForm($('#enter'), $('#register'))
    toggleForm($('#register-question'), $('#enter-question'))
})

function toggleForm(hiddenForm, shownForm) {
    hiddenForm.fadeOut(200)
    setTimeout(function() {
        shownForm.fadeIn(200)
    }, 201)
}
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
//$(document).on('mousemove', e => {
//    $('body').css('background-position', `${e.clientX * 0.05}px ${e.clientY * 0.05}px`)
//})

//Смена названия шорткода

window.onclick = function(e) {
    if(!$('.shortcode__title').length && !$('a').length && !$('button').length && !$('input').length && !('textarea').length) {
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
    $('.show-more .show-more__popup')
        .fadeIn(200);
})


function copyText(text) {
    let tempArea = document.createElement('textarea');

    tempArea.style.fontSize = '12pt';
    tempArea.style.border = '0';
    tempArea.style.padding = '0';
    tempArea.style.margin = '0';
    tempArea.style.position = 'absolute';
    tempArea.style.left = '-9999px';
    tempArea.setAttribute('readonly', '');
    tempArea.value = text;

    document.querySelector('body').append(tempArea);
    tempArea.select();
    document.execCommand("copy");
    tempArea.parentNode.removeChild(tempArea);
}

$('.shortcode__title').on('click', function() {
    copyText(window.location.href);
    new Msg('ссылка скопирована');
})

$('.shortcode-cdn').on('click', function(e) {
    e.stopPropagation()
    copyText($(this).attr('data-cdn'));
    new Msg('ссылка скопирована');
    $('.show-more .show-more__popup').fadeOut(200)
})
