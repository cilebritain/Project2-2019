<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql1='SELECT * FROM carts ORDER BY cartID DESC LIMIT 0,1';
    $row=mysqli_fetch_object($mysqli->query($sql1));
    if($row)$row=$row->cartID;
    else $row=0;
    $sql2='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $result2=$mysqli->query($sql2);
    $uid=mysqli_fetch_object($result2)->userID;
    $test='SELECT * FROM carts WHERE userID='.$uid.' AND artworkID='.$_GET['artworkID'];
    $retest=mysqli_fetch_object($mysqli->query($test));
    if($retest)$retest=$retest->cartID;
    $sql_buy='SELECT * FROM artworks WHERE artworkID='.$_GET["artworkID"];
    $buy=mysqli_fetch_object($mysqli->query($sql_buy))->ownerID;
    if($buy!=0){
        echo 'buyed';
    }else if($retest!=null){
        echo 'existed';       
    }else{
        $sql ='INSERT INTO carts(cartID,artworkID,userID) VALUES("'.($row+1).'","'.$_GET["artworkID"].'","'.$uid.'");';
        $mysqli->query($sql);
    }
?>