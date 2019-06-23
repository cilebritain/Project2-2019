<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    $sql1='SELECT * FROM artworks ORDER BY artworkID DESC LIMIT 0,1';
    $row=mysqli_fetch_object($mysqli->query($sql1))->artworkID;
    move_uploaded_file($_FILES["file"]["tmp_name"],'../resources/img/'.($row+1).'.jpg');
    $date=date('Y-m-d H:i:s');
    $sql='INSERT INTO artworks(artworkID,artist,imageFileName,title,description,yearOfWork,genre,width,height,price,view,ownerID,orderID,timeReleased,postID)
    VALUES("'.($row+1).'","'.$_POST["author"].'","'.($row+1).'.jpg","'.$_POST["name"].'","'.$_POST["description"].'","'.$_POST["year"].'","'.$_POST["genre"].'","'.$_POST["width"].'","'.$_POST["height"].'","'.$_POST["price"].'","0","0","0","'.$date.'","'.$uid.'")';
    if($mysqli->query($sql)){
        echo '<script>alert("you have already post the artwork!");window.location.href="profile.php";</script>';
    }else{
        echo 'fuck';
    }
?>