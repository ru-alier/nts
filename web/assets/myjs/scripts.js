document.oncontextmenu = function() {return false;};

$(function() {

    // Вешаем слушатель события нажатие кнопок мыши для всего документа:
    function myMenu(){

    $('tbody tr').mousedown(function(event) {
        
        // Убираем css класс selected-html-element у абсолютно всех элементов на странице с помощью селектора "*":
        $('*').removeClass('selected-html-element');
        // Удаляем предыдущие вызванное контекстное меню:
        $('.context-menu').remove();
        
        // Проверяем нажата ли именно правая кнопка мыши:
        if (event.which === 3)  {
            
            // Получаем элемент на котором был совершен клик:
            var target = $(event.target);
            
            // Добавляем класс selected-html-element что бы наглядно показать на чем именно мы кликнули (исключительно для тестирования):
            target.addClass('selected-html-element');

            // Создаем меню:
            $('<div/>', {
                class: 'context-menu' // Присваиваем блоку наш css класс контекстного меню:
            })
            .css({
                left: event.pageX+'px', // Задаем позицию меню на X
                top: event.pageY+'px' // Задаем позицию меню по Y
            })
            .appendTo('body') // Присоединяем наше меню к body документа:
            .append( // Добавляем пункты меню:
                 $('<ul/>').append(
                                '<li><a href="/spr-users/update?id='+this.dataset.key+`">
                                <span>
                                    <i class="material-icons">create</i>
                                </span>
                                <span>Редактировать</span></a></li>`) 
                            .append(
                                '<li><a href="/spr-users/delete?id='+this.dataset.key+`" 
                                title="Удаление пользователя" aria-label="Удалить" data-pjax="0" data-method="post" 
                                data-confirm="Вы действительно хотите данного пользователя?" data-toggle="tooltip">
                                <span>
                                <i class="material-icons">delete</i>
                                </span>
                            <span>Удалить пользователя<span></a></li>`)

                   )
             .show('fast'); // Показываем меню с небольшим стандартным эффектом jQuery. Как раз очень хорошо подходит для меню
         }
    });
    }

    function clickMenu () {
        //выделяем все td кроме первого столбца с div-ом
        var keys = $('tbody tr td:not(td.kv-align-center.kv-align-middle)').css('border', '3px solid blue');
        //  console.log(keys);
        // Проходим по каждому найденому элементу, ищем ключ у родителя 
        // и добавляем ссылки на обработку нажатия левой кнопкой мыши
        for (var i=0; i<keys.length; i++){
            keys[i].onclick = function(){
                window.location.href = '/spr-users/view?id='+ this.parentElement.dataset.key;
            }
            keys[i].style.cursor = 'pointer';
            // console.log(keys[i].parentElement.dataset.key);
         }

        };

    myMenu();
    clickMenu();
    // $('tr td div').off('click').css('border', '3px solid blue');

    $(document).on('pjax:success', clickMenu);
    $(document).on('pjax:success', myMenu)

});


    