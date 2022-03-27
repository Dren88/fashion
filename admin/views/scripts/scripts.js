$('.product-item__delete').click(function () {
    // var id = $(this).data('id'),
    //     parent = $(this).closest('tr'),
    //     url = $(this).parents('.zebra').data('table');
    // deleteRow(id, parent, url);
    var id = $(this).data('id'),
        parent = $(this).closest('.page-products__item'),
        url = $(this).parents('.page-products__list').data('table'),
        path_full = path + 'product/' + url;
        var res = confirm('Подтвердите удаление');
        if (!res) return false;
        $.ajax({
            url: path + 'product/' + url,
            type: 'GET',
            data: {id: id},
            success: function(res){
                var answer;
                console.log(res)
                if (res == 'OK'){
                    answer = "Удалено";
                    $(parent).remove()
                }else{
                    answer = "Ошибка удаления";
                }

                // $('#mes-edit .responce').text(answer);
                // $('#mes-edit').delay(500).fadeIn(1000, function(){
                //     if(res == 'OK') parent.hide();
                // });

            },
            error: function(){
                alert('Ошибка!');
            },
            // complete: function(){
            //     $('#loader').delay(500).fadeOut();
            // }
        });
})