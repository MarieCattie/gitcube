$('#enter-btn').on('click', function() {
    toggleForm($('#register'), $('#enter'))
    toggleForm($('#enter-question'), $('#register-question'))
})

$('#register-btn').on('click', function() {
    toggleForm($('#enter'), $('#register'))
    toggleForm($('#register-question'), $('#enter-question'))
})

function toggleForm(hiddenForm, shownForm) {
    hiddenForm.fadeOut(1000)
    setTimeout(function() {
        shownForm.fadeIn(300)
    }, 1000)
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


//Паралакс
$(document).on('mousemove', e => {
    $('body').css('background-position', `${e.clientX * 0.05}px ${e.clientY * 0.05}px`)
})