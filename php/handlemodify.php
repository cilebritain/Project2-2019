<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $get_u='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
    $uid=mysqli_fetch_object($mysqli->query($get_u))->userID;
    $row=$_POST["ID"];
    move_uploaded_file($_FILES["file"]["tmp_name"],'../resources/img/'.$row.'.jpg');
    $date=date('Y-m-d H:i:s');
    $sql='UPDATE artworks SET title="'.$_POST["name"].'",artist="'.$_POST["author"].'",description="'.$_POST["description"].'",yearOfWork="'.$_POST["year"].'",genre="'.$_POST["genre"].'",width='.$_POST["width"].',height='.$_POST["height"].',price='.$_POST["price"].' WHERE artworkID='.$row;
    if($mysqli->query($sql)){
        echo '<script>alert("you have already modify the infomation of the artwork!");window.location.href="profile.php";</script>';
    }else{
        echo 'fuck';
    }
?>