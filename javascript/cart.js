function add_cart(){
    if(Cookies.get('user')==undefined){
        alert('please login or register first!');
        return false;
    }
    var artworkID=Cookies.get('nowproduct');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            // document.getElementById("").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","../php/test.php",true);
    //xmlhttp.open("GET","../php/addtocart.php?artworkID="+artworkID,true);
    xmlhttp.send();
    return true;
}
