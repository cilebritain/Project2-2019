function handlelogin(){
    alert('fuck');
    var user=document.getElementById('exampleInputUsername1').value;
    var pwd=document.getElementById('exampleInputPassword1').value;
    if(user.length==0||RegExp.test(user)){
        alert('用户名格式不对');
        return false;
    }
    if(pwd.length==0||RegExp.test(pwd)){
        alert('密码格式不对')；
        return false;
    }
}