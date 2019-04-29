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
    let parent = $(this).parent().parent().parent().parent()
    // console.log(parent);
    $.ajax({
        url: '/cart/update',
        data: ({qty: oldVal, id: id}),
        type: 'GET',
        success: function (res) {
            $('.menu-quantity').html('('+ res +')');
            let price = parent.find($('.cart_item_price')).html().replace(/\s/g, '').slice(1);
            parent.find($('.cart_item_total')).html('$'+ oldVal*price);
            let total_sum = res.split(', ')[1];
            $(document).find($('.cart_total_sum')).html(total_sum);
            // $(document).find($('.cart_total_sum')).html()
            // console.log($(document).find($('.cart_total_sum')).html(total_sum));
        },
        error: function () {
            alert('Ошибка');
        }
    })
});

$('.cart_item').on('click', '.delete', function () {
    let id = $(this).data('id');
    let parent = $(this).parent().parent();
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            let total_qty = res.split(', ')[0];
            let total_sum = res.split(', ')[1];
            if (total_qty == 0){
                $('.content').html(res);
            } else {
                console.log(parent.remove());
                $('.menu-quantity').html('('+ res +')');
                $(document).find($('.cart_total_sum')).html(total_sum);
            }
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