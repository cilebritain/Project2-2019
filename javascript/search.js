function search(){
    var p=document.getElementById("search_input").value;
    if(p==""||p==undefined){
        alert("please enter what you want to search!");
        return 0;
    }
    return 1;
}