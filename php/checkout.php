<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql_ba='SELECT balance FROM users WHERE name="'.$_COOKIE["user"].'"';
    $result_ba=$mysqli->query($sql_ba);
    $ba=mysqli_fetch_object($result_ba)->balance;

    $sum=0;$hav=0;
    $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    $sql_aw='SELECT * FROM carts WHERE userID='.$uid;
    $result_aw=$mysqli->query($sql_aw);
    foreach($result_aw as $o){
            $aw_ow=mysqli_fetch_object($mysqli->query('SELECT * FROM artworks WHERE artworkID='.$o["artworkID"]))->ownerID;
            if($aw_id==0){
                $sum+=$o["price"];
            }else $hav++;
        }
    }

    if($ba>=$sum){
        $ba=$ba-$sum;
        $sql1 ='UPDATE users SET balance='.$ba.' WHERE name="'.$_COOKIE["user"].'"';
        $mysqli->query($sql1);
        
        $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
        $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    
        $sql_or='SELECT * FROM orders ORDER BY orderID DESC LIMIT 0,1';
        $row=mysqli_fetch_object($mysqli->query($sql_or))->orderID;
        $sql_nor='INSERT INTO orders(orderID,ownerID,sum,timeCreated) VALUES("'.($row+1).'","'.$uid.'","'.$_GET['sum'].'","'.date('Y-m-d H:i:s').'")';
        $mysqli->query($sql_nor);
    
        $sql_aw='SELECT * FROM carts WHERE userID='.$uid;
        $result_aw=$mysqli->query($sql_aw);
        foreach($result_aw as $o){
            $aw_ow=mysqli_fetch_object($mysqli->query('SELECT * FROM artworks WHERE artworkID='.$o["artworkID"]))->ownerID;
            if($aw_id==0){
                $aw_id=$o["artworkID"];
                $sql_upo='UPDATE artworks SET ownerID='.$uid.',orderID='.($row+1).' WHERE artworkID='.$aw_id;
                $mysqli->query($sql_upo);
            }
        }
        $sql_cl='DELETE FROM carts WHERE userID='.$uid;
        $mysqli->query($sql_cl);    
        echo $hav;
    }else{
        echo 'low';
    }
?>