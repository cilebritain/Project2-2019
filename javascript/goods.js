$('a').click(function(){
    Cookies.set('nowproduct',$(this).attr('id'));
});