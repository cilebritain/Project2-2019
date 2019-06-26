<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    $sql='DELETE FROM artworks WHERE artworkID='.$_GET['artworkID'];
    $mysqli->query($sql);
?>