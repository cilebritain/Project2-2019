$('.product_title a').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});

$(document).on('click','.product_title a',function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});

$('.avds_link a').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});

$('.home_button a').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});

$('.cart_item_name a').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});

$('#product_link').click(function(){
    Cookies.set('nowproduct',6);
});

$('.modify_product').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});