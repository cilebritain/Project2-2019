<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql_ba='SELECT balance FROM users WHERE name="'.$_COOKIE["user"].'"';
    $result_ba=$mysqli->query($sql_ba);
    $ba=mysqli_fetch_object($result_ba)->balance;
    if($ba>=$_GET['sum']){
        $ba=$ba-$_GET['sum'];
        $sql1 ='UPDATE users SET balance='.$ba.' WHERE name="'.$_COOKIE["user"].'"';
        $mysqli->query($sql1);
        
        $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
        $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    
        $sql_or='SELECT * FROM orders ORDER BY orderID DESC LIMIT 0,1';
        $row=mysqli_fetch_object($mysqli->query($sql_or))->orderID;
        $sql_nor='INSERT INTO orders(orderID,ownerID,sum,timeCreated) VALUES("'.($row+1).'","'.$uid.'","'.$_GET['sum'].'","'.date('Y-m-d H:i:s').'")';
        $mysqli->query($sql_nor);
    
        $sql_aw='SELECT * FROM carts WHERE userID='.$uid;
        $result_aw=mysqli_fetch_all($mysqli->query($sql_aw));
        foreach($result_aw as $o){
            $aw_id=mysqli_fetch_object($o)->artworkID;
            $sql_upo='UPDATE artworks SET ownerID='.$uid.' orderID='.($row+1).' WHERE artworkID='.$aw_id;
            $mysqli->query($sql_upo);
        }

        $sql_cl='DELETE FROM carts WHERE userID='.$uid;
        $mysqli->query($sql_cl);    
    }else{
        echo 'Your balance is not enough';
    }
?>