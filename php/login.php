<!DOCTYPE html>
<html lang="en">
  	<head>
    	<title>Login</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">
    	<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    	<link rel="stylesheet" type="text/css" href="../css/homepage.css">
    	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
  	</head>
	<body>
    <div class="super_container"  style="height:700px;">
        <div class="row align-items-center" style="margin-top:200px;">
            <div class="col"></div>
            <div class="col">
                <form method="post" onsubmit="return handlelogin()" action="handlelogin.php">
                    <div class="form-group">
                        <label for="exampleInputUsername1"><h3>User Name</h3></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="User name" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><h3>Password</h3></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="userpwd">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>    
                </form>
                <script type="text/javascript">
                    function handlelogin(){
                        alert('fuck');
                        var user=document.getElementById('exampleInputUsername1').value;
                        var pwd=document.getElementById('exampleInputPassword1').value;
                        if(user.length==0||RegExp.test(user)){
                            alert('用户名格式不对');
                            return false;
                        }
                        if(pwd.length==0||RegExp.test(pwd)){
                            alert('密码格式不对')；
                            return false;
                        }
                    }
                </script>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                        <div class="footer_logo"><a href="homepage.php">Art Store</a></div>
                        <div class="copyright ml-auto mr-auto">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="footer_social ml-lg-auto">
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../javascript/node_modules/canvas-nest.js/dist/canvas-nest.js"></script>
    <script src="../javascript/jquery-3.2.1.min.js"></script>
    <script src="../javascript/js.cookie.js"></script>
    <script src="../javascript/goods.js"></script>
    <script src="../css/bootstrap/js/popper.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/greensock/TweenMax.min.js"></script>
    <script src="../plugins/greensock/TimelineMax.min.js"></script>
    <script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="../plugins/greensock/animation.gsap.min.js"></script>
    <script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="../plugins/easing/easing.js"></script>
    <script src="../plugins/parallax-js-master/parallax.min.js"></script>
    <script src="../javascript/custom.js"></script>
</body>
</html>
