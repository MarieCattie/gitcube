$(document).ready(function() {
    $('.admin-answer').on('click', function() {
        if($(this).closest('.support-admin__comment').find('.support-admin__container').length == 0) {
            $(this).closest('.support-admin__comment').find('.support-admin__main').after('<div class="support-admin__container container-column"><textarea placeholder="Ответьте на вопрос" class="support-admin__field form__field" rows="20" cols="3"></textarea><br><a class="btn admin-answer__send">Отправить</a></div>')
        }
    })
})