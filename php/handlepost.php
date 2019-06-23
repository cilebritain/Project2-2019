<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $image = file_get_contents($_FILES['aw_file']['tmp_name']); //获取图片
    echo $image;
    /*
    $fileExtension=pathinfo($_FILES['aw_file']['name'])['extension'];
    $destin="C://xampp/htdocs/Project2-2019/resources/img/".$_FILES['aw_file']['name'].'.'.$fileExtension;
    if(move_uploaded_file($_FILES['aw_work'],$destin)){
        echo 'fuck';
    }*/
?>