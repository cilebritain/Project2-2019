$("a").click(function(event){
    Cookies.set('nowproduct',$(event.target).attr("id"));
});