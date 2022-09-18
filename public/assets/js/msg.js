class Msg {
    constructor(text = 'вы создали сообщение без текста', error = false, seconds = 5) {
        // if(!type)
        // {
        //     type = 'defaultMsg';
        // }else{
        //     type = 'errorMsg';
        // }

        let msgsDiv = $('.msgs');

        let msg = document.createElement('div');
        msg.style.transition = 'all 300ms ease';

        error ? msg.classList.add('errorMsg') : msg.classList.add('defaultMsg');
        // msg.classList.add(type);
        msg.innerHTML = text;

        msgsDiv.append(msg);

        setTimeout( function(){

            msg.style.opacity = '1';

            setTimeout( function() {

                msg.style.opacity = '0';

                setTimeout( function() {

                    msg.remove();

                }, 400 )

            }, seconds * 1000 )

        }, 100 )
    }
}

window.onerror = function(msg, url, line) {

    new Msg('Произошла ошибка! Зайдите в консоль для подробностей', true);

}
