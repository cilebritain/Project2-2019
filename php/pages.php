<?php
    $mysqli=new mysqli('localhost','root','r00t','db_project2');
    session_start();
    $sql=$_SESSION["search_sql"];
    $result=$mysqli->query($sql);
    $rows=$result->num_rows;
    $pages=($rows-1)/9+1;
    if(isset($_GET["index"])&&$_GET["index"]!="")$current=$_GET["index"];
    else $current=1;
    $pre=$current==1?1:$current-1;
    $next=$current==$pages?$pages:$current+1;
    $sql.=' LIMIT '.(($current-1)*8).',8';
    $result1=$mysqli->query($sql);

    echo '<div class="row"><div class="col"><div class="product_grid">';
    if($result1){
        for($n=1;$n<=8;$n++)
        {
            $p=$result1->fetch_assoc();
            if($p){
                echo '<div class="product">';
                echo '<div class="product_image"><img src="../resources/img/'.$p["imageFileName"].'" alt=""></div>';
                echo '<div class="product_extra product_new"><a href="#">New</a></div>';
                echo '<div class="product_content">';
                echo '<div class="product_title"><a href="detail.php" id="'.$p["artworkID"].'">'.$p["title"].'</a></div>';
                echo '<div class="product_price">$'.$p["price"].'</div>';
                echo '</div></div>';
            }
        }
    }
    echo '</div></div></div>';

    echo '<div class="row"><div class="col-md-12">';
    echo '<ul class="pagination">';
    echo '<li class="page-item"><a class="page-link" onclick="changePage('.$pre.')">Previous</a></li>'; 
    for($n = 1; $n <= $pages; $n++){
        if($n==$current)echo '<li class="page-item active"><a class="page-link" onclick="changePage(this.innerText)">'.$n.'</a></li>';
        else echo '<li class="page-item"><a class="page-link" onclick="changePage(this.innerText)">'.$n.'</a></li>';
    };
    echo '<li class="page-item"><a class="page-link" onclick="changePage('.$next.')">Next</a></li></ul>';
    echo '</div></div></div>';

?>