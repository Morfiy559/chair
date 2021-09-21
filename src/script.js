

document.addEventListener('DOMContentLoaded', function() {

    let modalButtons = document.querySelectorAll('.js-open-modal'),
        overlay      = document.querySelector('#overlay-modal'),
        closeButtons = document.querySelectorAll('.js-modal-close');


    modalButtons.forEach(function(item){

        item.addEventListener('click', function(e) {

            e.preventDefault();

            let modalId = this.getAttribute('data-modal'),
                modalElem = document.querySelector('.modal'),
                productName = document.querySelector('#productName'),
                modalTitle = document.querySelector('#modal__title');
                productName.value = modalTitle.textContent =`Кресло ${modalId}`;
            modalElem.classList.add('active');
            overlay.classList.add('active');

        }); // end click
    }); // end foreach
    closeButtons.forEach(function(item) {

        item.addEventListener('click', function(e) {
            item.addEventListener('click', function(e) {
                let parentModal = this.closest('.modal');

                parentModal.classList.remove('active');
                overlay.classList.remove('active');
            });
        });

    });

    document.body.addEventListener('keyup', function (e) {
        let key = e.code;

        if (key == 'Escape') {
            document.querySelector('.modal.active').classList.remove('active');
            document.querySelector('.overlay.active').classList.remove('active');
        };
    }, false);

    overlay.addEventListener('click', function() {
        document.querySelector('.modal.active').classList.remove('active');
        this.classList.remove('active');
    });
    //Отправка почты без перезагрузки страницы
    $("#form").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        let form_data = $(this).serialize(); // Собираем все данные из формы

        document.querySelector('.modal.active').classList.remove('active');
        document.querySelector('.overlay.active').classList.remove('active');
        $.ajax({
            type: "POST", // Метод отправки
            url: "mail.php", // Путь до php файла отправителя
            data: form_data,
            success: function () {
                alert("Ваше сообщение отправлено!");
            },
            error: function(){
            alert('error!');
        }
        });
        let inputs = document.querySelectorAll('#form input');
        for(let input of inputs){
            if(input.id !='submit') {input.value = ''}else {continue;}
        }
    });
}); // end ready