function handlepost(){
    var name=document.getElementById('aw_name').value;
    var author=document.getElementById('aw_author').value;
    var description=document.getElementById('aw_description').value;
    var year=document.getElementById('aw_year').value;
    var genre=document.getElementById('aw_genre').value;
    var height=document.getElementById('aw_height').value;
    var width=document.getElementById('aw_width').value;
    var price=document.getElementById('aw_price').value;
    var file=document.getElementById('aw_file').files;
    if(name.length==0||author.length==0||description.length==0||year.length==0||genre.length==0||height.length==0||width.length==0||price.length==0||file[0]==undefined){
        alert('please enter the infomation completely');
        return false;
    }
    if(!isInteger(year)){
        alert('please enter the correct format of year!');
        return false;
    }
    if(width<=0||height<=0){
        alert('please enter the correct width and height!');
        return false;
    }
    if(!isInteger(price)||price<=0){
        alert('the price must be a positive integer');
        return false;
    }
    return true;
}

function isInteger(x){
    if(x%1===0)return true;
    return false;
}

function imgpreview(){
    let uploadElement = document.getElementById("aw_file");
    let previewImage = document.getElementById("preview");
    previewImage.src = window.URL.createObjectURL(uploadElement.files[0]);
}