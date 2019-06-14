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
