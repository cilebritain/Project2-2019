function add_cart(){
    if(Cookies.get('user')==undefined){
        alert('please login or register first!');
        return false;
    }
    return true;
}