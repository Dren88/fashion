$(document).ready(function(){
    $('.custom-form__select').change(function () {
        var $this = $(this),
            order = $('.custom-form__select[name=order]').find('option:selected').val(),
            category = $('.custom-form__select[name=category]').find('option:selected').val();
            $.ajax({
                url: path,
                type: 'POST',
                data: {order: order, category: category, sort: 'sort'},
                success: function (res) {
                    $('.shop__list').html(res);
                }
            })
    })
})
