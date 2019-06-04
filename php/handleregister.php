<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $user=$_POST['username'];
    $pwd=$_POST['userpwd1'];
    $email=$_POST['useremail1'];
    $tel=$_POST['usertel1'];
    $add=$_POST['useradd1'];

    $sql='SELECT * FROM users WHERE name="'.$user.'"';
    $result=$mysqli->query($sql);

    if($result->fetch_object()){
        echo '<script>alert("this username have already existed");</script>';
    }else{
        $sql1='SELECT count(*) FROM users';
        $result1=$mysqli->query($sql1);
        $rows=mysqli_fetch_row($result1);
        $row=$rows[0];
        $sql2='INSERT INTO users (userID,name,email,password,tel,address,balance)
            VALUES('.($row+1).',"'.$user.'","'.$email.'","'.$pwd.'","'.$tel.'","'.$add.'",'.'0)';
        $mysqli->query($sql2);
        echo '<script>alert("you have successfully registered!");window.location.href="homepage.php";</script>';
    }

?>