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
        $aw_ow=mysqli_fetch_object($mysqli->query('SELECT * FROM artworks WHERE artworkID='.$o["artworkID"]));
        $ppr=$aw_ow->price;
        $aw_ow=$aw_ow->ownerID;
        if($aw_ow==0){
            $sum+=$ppr;
        }else $hav++;
    }

    if($ba>=$sum){
        $ba=$ba-$sum;
        $sql1 ='UPDATE users SET balance='.$ba.' WHERE name="'.$_COOKIE["user"].'"';
        $mysqli->query($sql1);
        
        $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
        $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    
        $sql_or='SELECT * FROM orders ORDER BY orderID DESC LIMIT 0,1';
        $row=mysqli_fetch_object($mysqli->query($sql_or));
        if($row)$row=$row->orderID;
        $sql_nor='INSERT INTO orders(orderID,ownerID,sum,timeCreated) VALUES("'.($row+1).'","'.$uid.'","'.$_GET['sum'].'","'.date('Y-m-d H:i:s').'")';
        $mysqli->query($sql_nor);
    
        $sql_aw='SELECT * FROM carts WHERE userID='.$uid;
        $result_aw=$mysqli->query($sql_aw);
        foreach($result_aw as $o){
            $aw_ow=mysqli_fetch_object($mysqli->query('SELECT * FROM artworks WHERE artworkID='.$o["artworkID"]));
            $aw_op=$aw_ow->postID;
            $aw_pr=$aw_ow->price;
            $aw_ow=$aw_ow->ownerID;
            if($aw_ow==0){
                $aw_id=$o["artworkID"];
                $sql_upo='UPDATE artworks SET ownerID='.$uid.',orderID='.($row+1).' WHERE artworkID='.$aw_id;
                $mysqli->query($sql_upo);
                if($aw_op!=0){
                    $sql_ba='SELECT balance FROM users WHERE userID="'.$aw_op.'"';
                    $result_ba=$mysqli->query($sql_ba);
                    $ba=mysqli_fetch_object($result_ba)->balance;
                    $sql_p='UPDATE users SET balance='.($ba+$aw_pr).' WHERE userID='.$aw_op;
                    $mysqli->query($sql_p);
                }
            }
        }
        $sql_cl='DELETE FROM carts WHERE userID='.$uid;
        $mysqli->query($sql_cl);    
        echo $hav;
    }else{
        echo 'low';
    }
?>