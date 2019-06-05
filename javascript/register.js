function handleregister(){
    var user=document.getElementById('exampleInputUsername1').value;
    var pwd1=document.getElementById('exampleInputPassword1').value;
    var pwd2=document.getElementById('exampleInputPassword2').value;
    var email=document.getElementById('exampleInputEmail1').value;
    var tel=document.getElementById('exampleInputTel1').value;
    var add=document.getElementById('exampleInputAdd1').value;
    if(user.length==0||pwd1.length==0||pwd2.length==0||email.length==0||tel.length==0||add.length==0){
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
    return true;
}

$("#register_a").click(function(){
    Cookies.set('pre_web',location.href);
});

$("#login_a").click(function(){
    Cookies.set('pre_web',location.href);
});

