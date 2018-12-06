$("document").ready(function () {
// Выбор мест в зале
    $(".column").click(function () {
        if($(this).css('border-color')==='rgb(255, 0, 0)'){
            $(this).css('border-color','#6c757d');
        }
        else if($(this).css('border-color')==='rgb(108, 117, 125)'){
            $(this).css('border-color','red');
        }
        else if($(this).css('border-color')==='rgb(52, 144, 220)'){
            $(this).css('border-color','#3490dc');
        }

    })

//Организация бронирования
    $(".buyBtn").click(function ()
    {
        var col = 0,
            row = 0,
            price = 0,
            dateS = '',
            timeS = '',
            sum = 0,
            strData = '';
    // Заполнение формы
        $(".column").each(function() {
            if($(this).css('border-color')==='rgb(255, 0, 0)'){
                col = $(this).data('col');
                row = $(this).data('row');
                price = $(this).data('price');
                dateS = $(this).data('date');
                timeS = $(this).data('time');
                strData += 'Дата: '+dateS+' Время: '+timeS+' Ряд: '+row+' Место: '+col+' Цена: '+price +';\n';
                sum += price;
            }
        })
        $('#inputData').val(strData+'Сумма к оплате:'+sum);
        $('#buy').modal();
    })

// Отмена обработки зала
    $(".close").click(function () {
        $(".column").each(function () {
            if($(this).css('border-color')==='rgb(255, 0, 0)'){
                $(this).css('border-color','#6c757d');
            }
        })
    })

//Вывод постера
    $("#Img").change(function(){
        loadImg(this);
    })

//Загрузка постера в img
    function loadImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#poster').attr('src', e.target.result);
                $('#poster').attr('title',input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});