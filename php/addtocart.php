<?php
    echo '<script>alert(fuck);</script>';
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql1='SELECT count(*) FROM carts';
    $result1=$mysqli->query($sql1);
    $rows=mysqli_fetch_row($result1);
    $row=$rows[0];
    $sql ='INSERT INTO carts(cartID,artworkID,userID) VALUES('.($row+1).','.$_GET["artworkID"].','.$_COOKIE["user"].')';
    $mysqli->query($sql);
?>