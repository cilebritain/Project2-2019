function handleregister(){
    var user=document.getElementById('exampleInputUsername1').value;
    var pwd1=document.getElementById('exampleInputPassword1').value;
    var pwd2=document.getElementById('exampleInputPassword2').value;
    var email=document.getElementById('exampleInputEmail1').value;
    var tel=document.getElementById('exampleInputTel1').value;
    var add=document.getElementById('exampleInputAdd1').value;
    var ver=document.getElementById('vertification_input').value.toLowerCase();
    var ver_t=document.getElementById('vertification_code').innerHTML.toLowerCase();
    if(user.length==0||pwd1.length==0||pwd2.length==0||email.length==0||tel.length==0||add.length==0||ver.length==0){
        alert('all the input could not be empty!');
        return false;
    }
    if(pwd1!=pwd2){
        alert('The passwords do not equal in your two inputs');
        return false;
    }
    var exp=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    if(!exp.test(email)){
        alert('please enter email address in correct format');
        return false;
    }
    var pat=/^[0-9]{1,20}$/;
    if(pwd1.length<6||pat.test(pwd1)){
        alert('the password should have a length larger than 5 and could not be a full-digital string');
        return false;
    }
    if(ver!=ver_t){
        alert("vertification code error!");
        change_ver();
        return false;
    }
    return true;
}

$("#register_a").click(function(){
    Cookies.set('pre_web',location.href);
});

$("#login_a").click(function(){
    Cookies.set('pre_web',location.href);
});

function generate_code(){
    var a="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    var b="";
    for(var i=1;i<=4;i++){
        var ind=Math.floor(Math.random()*62);
        b+=a.charAt(ind);
    }
    return b;
}

function change_ver(){
    code=generate_code();
    document.getElementById('vertification_code').innerHTML=code;
}

