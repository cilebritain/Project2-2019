<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    //$sql_user='DELETE FROM users';
    $sql_order='DELETE FROM orders';
    $sql_cart='DELETE FROM carts';
    $sql_aw='UPDATE artworks SET ownerID=0,orderID=0,postID=0';
    //$mysqli->query($sql_user);
    $mysqli->query($sql_order);
    $mysqli->query($sql_cart);
    $mysqli->query($sql_aw);
?>