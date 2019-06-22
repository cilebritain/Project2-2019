<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql='SELECT balance FROM users WHERE name="'.$_COOKIE["user"].'"';
    $result=$mysqli->query($sql);
    $ba=mysqli_fetch_object($result)->balance;
    $ba=$ba+$_GET['amount'];
    $sql1 ='UPDATE users SET balance=100 WHERE name="'.$_COOKIE["user"].'"';
    $mysqli->query($sql1);
    echo '<script>document.location.href="profile.php";</script>';
?>