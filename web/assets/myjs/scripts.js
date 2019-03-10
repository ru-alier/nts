// document.oncontextmenu = function() {return false;};
document.oncontextmenu = function(e) {e.preventDefault();};
$(function() {

    function removeMyContextMenu(){
        // Убираем css класс selected-html-element у всех элементов на странице с помощью селектора "*":
        $('*').removeClass('selected-html-element');
        // Удаляем предыдущие вызванное контекстное меню:
        $('.context-menu').remove();
    };

    // Вешаем слушатель события нажатие кнопок мыши для tbody:
    function myMenu(){

    $('tbody tr').contextmenu(function(event) {

        removeMyContextMenu();

        isClickedContext = true;
        
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
    });
    };

    function clickMenu () {
        //выделяем все td кроме первого столбца с div-ом
        var keys = $('tbody tr td:not(td.kv-align-center.kv-align-middle)');
        // Проходим по каждому найденому элементу, ищем ключ у родителя 
        // и добавляем ссылки на обработку нажатия левой кнопкой мыши
        // Также добавляем курсор(pointer) при наведении 
        for (var i=0; i<keys.length; i++){
            keys[i].style.cursor = 'pointer';
            keys[i].onclick = function(){
                if (isClicked||isClickedContext){
                return ;
                } else if (!isClicked) {
                        isClicked = true;
                        $(this).css({
                                    "background-color":"gray",
                                    "font-color":"white"}).animate({
                            opacity: 0.5
                        }, 300,
                        function(){
                            location='/spr-users/view?id='+ this.parentElement.dataset.key;
                        });
                        };
         }
        

        };
    };
    // Защита от многократного клика
    myMenu();
    clickMenu();
    var isClickedContext = false;
    var isClicked = false;
    // закрытие контекстного меню по клику левой кнопкой мыши в body
    $('body').on('click', ()=>{
        if($(".context-menu").length > 0) {
            removeMyContextMenu();
            isClickedContext = false;
          };
    })
    $(document).on('pjax:success', clickMenu);
    $(document).on('pjax:success', myMenu);

});


    