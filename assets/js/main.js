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