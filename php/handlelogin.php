<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $user=$_POST['username'];
    $pwd=$_POST['userpwd'];
    $sql='SELECT password FROM users WHERE name='."'".$user."'";
    $result=$mysqli->query($sql);
    $p=$result->fetch_assoc()["password"];
    if(!$result){
        echo 'invalid username or password';
    }
    else if($p!=$pwd){
        echo 'invalid username or password';
    }
    else{
        echo 'successful login';
    }
?>