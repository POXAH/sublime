$(document).ready(function()
{})

function addCart(event){
    event.preventDefault();
    let qty = $('#quantity_input').val();
    let link_name = $('.cart_button').data('name');
    $.ajax({
        url: '/cart/add',
        data: {link_name: link_name, qty: qty},
        type: 'GET',
        success: function (res) {
            // console.log(res);
            $('.menu-quantity').html('('+ res +')');
        },
        error: function () {
            alert('Ошибка');
        }
    })
}

function clearCart(event){
    event.preventDefault();
    var qwe = confirm('Confirm cleaning?');
    if(qwe) $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            $('.content').html(res);
            $('.menu-quantity').html('(0)');
        },
        error: function () {
            alert('Ошибка');
        }
    })
}

$('.cart_item').on('click', '.quantity_buttons', function () {
    let id = $(this).data('product_id');
    let oldVal = $(this).parent().find($('.quantity_input')).val();
    // console.log(oldVal);
    $.ajax({
        url: '/cart/update',
        data: ({qty: oldVal, id: id}),
        type: 'GET',
        success: function (res) {
            $('.menu-quantity').html('('+ res +')');
            $('.cart_total_value').html('('+ res +')');

            // $('.content').html(res);
            // console.log(res);
        },
        error: function () {
            alert('Ошибка');
        }
    })
});

$('.cart_item').on('click', '.delete', function () {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            $(this).parent().parent().remove();
            $('.menu-quantity').html('('+ res +')');
        },
        error: function () {
            alert('Ошибка');
        }
    })
});
function deleteProduct(id){
    // console.log(id);
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            // $('.content').html(res);
            $('.menu-quantity').html('('+ res +')');
        },
        error: function () {
            alert('Ошибка');
        }
    })
}