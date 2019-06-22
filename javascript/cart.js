function add_cart(){
    if(Cookies.get('user')==undefined){
        alert('please login or register first!');
        return false;
    }
    var artworkID=Cookies.get('nowproduct');
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            if(xmlhttp.responseText=='existed'){
                alert('you can not add one good to the cart twice');
                document.location.href="../php/detail.php";
            }
        }
    }
    xmlhttp.open("GET","../php/addtocart.php?artworkID="+artworkID,true);
    xmlhttp.send();
    return true;
}

function clear_cart(){
    var message=confirm('Are you sure clear all the goods in the cart?');
    if(message==true){
        var xmlhttp;
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        } else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET","../php/clear_cart.php",true);
        xmlhttp.send();
        window.location.reload();            
    }else{
        
    }
}

$('#delete_cart').click(function(){
    var p=$(this).parent().prev().children().attr('id');
    var message=confirm('Are you sure delete this good?');
    if(message==true){
        var xmlhttp;
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        } else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET","../php/delete_cart.php?artworkID="+p,true);
        xmlhttp.send();
        window.location.reload();            
    }else{
        
    }
});
