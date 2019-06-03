<?php
    var_dump($_COOKIE['user']);
    var_dump($_COOKIE['user']==$_COOKIE["user"]);
    $_COOKIE["user"]='';
    echo '<script>window.location.href="homepage.php"</script>';
?>