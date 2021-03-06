<?php
    $mysqli = new mysqli('localhost', 'root', 'r00t', 'db_project2');
    $sql='SELECT * FROM artworks ORDER BY view DESC LIMIT 0,3';
    $sql1='SELECT * FROM artworks ORDER BY timeReleased DESC LIMIT 0,8';
    $result=$mysqli->query($sql);
	$result1=$mysqli->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
    	<title>Homepage</title>
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
    	<div class="super_container">
      	<!-- Header -->
      		<header class="header">
				<div class="header_container">
	  				<div class="container">
	    				<div class="row">
	      					<div class="col">
								<div class="header_content d-flex flex-row align-items-center justify-content-start">
		  							<div class="logo"><a href="#">Art Store</a></div>
		  							<nav class="main_nav">
		    							<ul>
											<li class="active"><a href="homepage.php">Home</a></li>
											<li><a href="detail.php" id="product_link">Product</a></li>
											<?php
												if(empty($_COOKIE['user'])||$_COOKIE['user']==''){
													echo '<li><a href="login.php" id="login_a">Login</a></li>';
													echo '<li><a href="register.php" id="register_a">Register</a></li>';
												}
												else{
													echo '<li><a href="profile.php" style="color:red;">'.$_COOKIE['user'].'</a></li>';
													echo '<li><a href="#" onclick="logout()">Logout</a></li>';
												}
											?>
		    							</ul>
		  							</nav>
		  							<div class="header_extra ml-auto">
		    							<div class="shopping_cart">
		      								<a href="cart.php">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
			  										<g>
			    										<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
				     									c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
				     									C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
				     									H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
				     									c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
			  										</g>
												</svg>                                        
												<div>
													Cart 
													<span>
														<?php
															if(empty($_COOKIE['user'])||$_COOKIE["user"]==''){
																$result_cart=0;
															}else{
																$mysqli_cart=new mysqli('localhost','root','r00t','db_project2');
																$get_u_cart='SELECT userID FROM users WHERE name="'.$_COOKIE["user"].'"';
																$uid_cart=mysqli_fetch_object($mysqli_cart->query($get_u_cart))->userID;
																$sql_cart='SELECT count(*) FROM carts WHERE userID='.$uid_cart;
																$result_cart=mysqli_fetch_row($mysqli_cart->query($sql_cart))[0];
															}
															echo '('.$result_cart.')';
															?> 
													</span>
												</div>
		      								</a>
		    							</div>
										<div class="search">
											<div class="search_icon">
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;" xml:space="preserve">
													<g>
														<path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
														c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
														C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
														c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
														c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
														c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
														c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
														M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
														c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
														c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z"/>
													</g>
												</svg>
											</div>
										</div>
										<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
				<!-- Search Panel -->
				<div class="search_panel trans_300">
	  				<div class="container">
	    				<div class="row">
	      					<div class="col">
								<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
		  							<form method="POST" action="search.php">
		    							<input type="text" class="search_input" placeholder="Search" required="required" name="keyword" id="search_input">
		  							</form>
								</div>
	      					</div>
	    				</div>
	  				</div>
				</div>

      		</header>
            <div class="home">
                <div class="home_slider_container"> 
                    <div class="owl-carousel owl-theme home_slider"> 
                    <!-- Slider Item -->
                    <?php
                        foreach($result as $p)
                        {
                            echo '<div class="owl-item home_slider_item">';
                            echo '<div class="home_slider_background" style="background-image:url(../resources/img/'.$p["imageFileName"].')"></div>';
                            echo '<div class="home_slider_content_container">';
                            echo '<div class="container">';
                            echo '<div class="row">';
                            echo '<div class="col">';
                            echo '<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">';
                            echo '<div class="home_slider_title">'.$p["title"].'</div>';
                            echo '<div class="home_slider_subtitle">'.substr($p["description"],0,400).'</div>';
                            echo '<div class="button button_light home_button"><a href="detail.php" id="'.$p["artworkID"].'">Shop Now</a></div>';
                            echo '</div></div></div></div></div></div>';
                        }
                    ?>
                </div>

                <!-- Home Slider Dots -->
        
                <div class="home_slider_dots_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_dots">
                                    <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                        <li class="home_slider_custom_dot active">01.</li>
                                        <li class="home_slider_custom_dot">02.</li>
                                        <li class="home_slider_custom_dot">03.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
	        </div>
        </div>

        <!-- Ads -->

        <div class="avds">
	        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
	            <div class="avds_small">
	                <div class="avds_background" style="background-image:url(../resources/img/47.jpg)"></div>
	                <div class="avds_small_inner">
	                    <div class="avds_discount_container">
		                    <img src="../resources/icon/discount.png" alt="">
		                    <div>
		                        <div class="avds_discount">
		                            <div>20<span>%</span></div>
		                            <div>Discount</div>
		                        </div>
		                    </div>
	                    </div>
	                    <div class="avds_small_content">
		                    <div class="avds_title">Art Works</div>
		                    <div class="avds_link"><a href="detail.php" id="47">See More</a></div>
	                    </div>
	                </div>
	            </div>
	            <div class="avds_large">
	                <div class="avds_background" style="background-image:url(../resources//img/58.jpg)"></div>
	                <div class="avds_large_container">
	                    <div class="avds_large_content">
		                    <div class="avds_title">Professional Art works</div>
		                    <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viver ra velit venenatis fermentum luctus.</div>
		                    <div class="avds_link avds_link_large"><a href="detail.php" id="58">See More</a></div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Products -->

        <div class="products">
	        <div class="container">
	            <div class="row">
	                <div class="col">
	                    <div class="product_grid">

                            <?php
                                foreach($result1 as $p)
                                {
                                    echo '<div class="product">';
                                    echo '<div class="product_image"><img src="../resources/img/'.$p["imageFileName"].'" alt=""></div>';
                                    echo '<div class="product_extra product_new"><a href="#">New</a></div>';
                                    echo '<div class="product_content">';
    		                        echo '<div class="product_title"><a href="detail.php" id="'.$p["artworkID"].'">'.$p["title"].'</a></div>';
                                    echo '<div class="product_price">$'.$p["price"].'</div>';
                                    echo '</div></div>';
                                }
                            ?>
                            
                        </div>
	                </div>
	            </div>
	        </div>
        </div>

    <div class="footer_overlay"></div>
        <footer class="footer">
	        <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
	        <div class="container">
	            <div class="row">
	                <div class="col">
	                    <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
		                    <div class="footer_logo"><a href="#">Art Store</a></div>
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
    </div>

    <script src="../javascript/jquery-3.2.1.min.js"></script>
    <script src="../javascript/js.cookie.js"></script>
	<script src="../javascript/goods.js"></script>
	<script src="../javascript/login.js"></script>
	<script src="../javascript/register.js"></script>
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
