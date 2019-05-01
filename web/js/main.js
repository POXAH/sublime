// $(document).ready(function()
// {})

function addCart(event){
    event.preventDefault();
    let qty = $('#quantity_input').val();
    let link_name = $('.cart_button').data('name');
    $.ajax({
        url: '/cart/add',
        data: {link_name: link_name, qty: qty},
        type: 'GET',
        success: function (res) {
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
    let parent = $(this).parent().parent().parent().parent();
    let delivery = parseFloat($('.delivery_price').html().slice(1));
    console.log(delivery);
    $.ajax({
        url: '/cart/update',
        data: ({qty: oldVal, id: id}),
        type: 'GET',
        success: function (res) {
            $('.menu-quantity').html('('+ res +')');
            let price = parent.find($('.cart_item_price')).html().replace(/\s/g, '').slice(1);
            parent.find($('.cart_item_total')).html('$'+ (oldVal*price).toFixed(2));
            let total_sum = res.split(', ')[1];
            $('.cart_total_sum').html('$' + total_sum);
            $('.cart_total_subsum').html((total_sum-delivery).toFixed(2));

        },
        error: function () {
            alert('Ошибка');
        }
    })
});


$('.cart_item').on('click', '.delete', function () {
    let id = $(this).data('id');
    let parent = $(this).parent().parent();
    let delivery = parseFloat($('.delivery_price').html().slice(1));
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            let total_qty = res.split(', ')[0];
            let total_sum = res.split(', ')[1];
                if (total_qty == 0){
                    parent.parent().parent().find($('.row')).remove()
                    location.reload();
                }
                parent.remove()
                $('.menu-quantity').html('('+ res +')');
                $('.cart_total_sum').html(total_sum);
                $('.cart_total_subsum').html((total_sum-delivery).toFixed(2));
        },
        error: function () {
            alert('Ошибка');
        }
    })
});

$('.col-lg-4').on('click', '.delivery_radio', function () {
    let price = parseFloat($(this).data('delivery_price'));
    let id = $(this).data('delivery_id');

    $.ajax({
        url: '/cart/delivery',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            let total_sum = res.split(', ')[1];
            $('.cart_total_sum').html('$'+total_sum);
            $('.cart_total_container').find($('.delivery_price')).html('$'+price);

            $('.menu-quantity').html('('+ res +')');
        },
        error: function () {
            alert('Ошибка');
        }
    })
});