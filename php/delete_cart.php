<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    echo '<script>alert("'.$_GET['artworkID'].'");</script>';
    $sql='DELETE FROM carts WHERE artworkID='.$_GET['artworkID'].' AND userID='.$uid;
    $mysqli->query($sql);
?>