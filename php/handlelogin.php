<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $user=$_POST['username'];
    $pwd=$_POST['userpwd'];
    $sql='SELECT password FROM users WHERE name='."'".$user."'";
    $result=$mysqli->query($sql);
    $p=$result->fetch_assoc()["password"];
    if(!$result){
        echo '<script>alert("invalid username or password");</script>';
        echo 'window.location.href="login.php";';        
    }
    else if($p!=$pwd){
        echo '<script>alert("invalid username or password");';
        echo 'window.location.href="login.php";</script>';        
    }
    else{
        echo '<script type="text/javascript" src="../javascript/js.cookie.js"></script>';
        echo "<script>Cookies.set('user','".$user."');";
        echo 'alert("you have successfully login!");';
        echo 'window.location.href="'.$_COOKIE['pre_web'].'";</script>';        
    }
?>