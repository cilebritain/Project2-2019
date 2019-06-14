<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql1='SELECT count(*) FROM carts';
    $result1=$mysqli->query($sql1);
    $rows=mysqli_fetch_row($result1);
    $row=$rows[0];
    $sql2='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $result2=$mysqli->query($sql2);
    $uid=mysqli_fetch_object($result2)->userID;
    $sql ='INSERT INTO carts(cartID,artworkID,userID) VALUES("'.($row+1).'","'.$_GET["artworkID"].'","'.$uid.'");';
    $mysqli->query($sql);
?>