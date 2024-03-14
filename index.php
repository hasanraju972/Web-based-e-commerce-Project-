<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>SatheAchi.com</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/slider1.png);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slider2.png);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	</div><!-- /.owl-carousel -->
</div>
			
<!-- ========================================= SECTION – HERO : END ========================================= -->	
				<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
						     <i class="icon fa fa-dollar"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>	
					<h6 class="text">30 Day Money Back Guarantee.</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-truck"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading orange">free shipping</h4>
						</div>
					</div>
					<h6 class="text">free ship-on oder over Tk. 600.00</h6>	
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-gift"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading red">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">All items-sale up to 20% off </h6>	
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->
	
</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->		
			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->

		<!-- ============================================== SCROLL TABS ============================================== -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Featured Products</h3>
				<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
					<li class="active"><a href="#all" data-toggle="tab">All</a></li>
					<li><a href="#books" data-toggle="tab">Books</a></li>
					<li><a href="#furniture" data-toggle="tab">Furniture</a></li>
				</ul><!-- /.nav-tabs -->
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
<?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div><!-- /.image -->			

			                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Tk.<?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Tk.<?php echo htmlentities($row['productPriceBeforeDiscount']);?>	</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
		<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	<?php } ?>

			</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div>




	<div class="tab-pane" id="books">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=3");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div><!-- /.image -->			

			                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Tk. <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Tk.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	<?php } ?>
	
		
								</div><!-- /.home-owl-carousel -->
					</div><!-- /.product-slider -->
				</div>






		<div class="tab-pane" id="furniture">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=5");
while ($row=mysqli_fetch_array($ret)) 
{
?>

						    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div>		

			                        		   
		</div>
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Tk.<?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Tk.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div>
			
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div>
      
			</div>
		</div>
	<?php } ?>
	
		
								</div>
					</div>
				</div>
			</div>
		</div>
		    

         <!-- ============================================== TABS ============================================== -->
			<div class="sections prod-slider-small outer-top-small">
				<div class="row">
					<div class="col-md-6">
	                   <section class="section">
	                   	<h3 class="section-title">Smart Phones</h3>
	                   	<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
	   
<?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=4");
while ($row=mysqli_fetch_array($ret)) 
{
?>



		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300"></a>
			</div><!-- /.image -->			                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Tk. <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Tk.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div>
			
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div>
			</div>
		</div>
<?php }?>

	
			                   	</div>
	                   </section>
					</div>
					<div class="col-md-6">
						<section class="section">
							<h3 class="section-title">Laptops</h3>
		                   	<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
	<?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=6");
while ($row=mysqli_fetch_array($ret)) 
{
?>



		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="300" height="300"></a>
			</div><!-- /.image -->			                        		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Tk .<?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Tk.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div>
			
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
			</div>
			</div>
		</div>
<?php }?>

		
	
				                   	</div>
	                   </section>

					</div>
				</div>
			</div>
		<!-- ============================================== TABS : END ============================================== -->

		

	<section class="section featured-product inner-xs wow fadeInUp">
		<h3 class="section-title">Fashion</h3>
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
			<?php
$ret=mysqli_query($con,"select * from products where category=6");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>
				<div class="item">
					<div class="products">




												<div class="product">
							<div class="product-micro">
								<div class="row product-micro-row">
									<div class="col col-xs-6">
										<div class="product-image">
											<div class="image">
												<a href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>">
													<img data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="170" height="174" alt="">
													<div class="zoom-overlay"></div>
												</a>					
											</div><!-- /.image -->

										</div><!-- /.product-image -->
									</div><!-- /.col -->
									<div class="col col-xs-6">
										<div class="product-info">
											<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
											<div class="rating rateit-small"></div>
											<div class="product-price">	
												<span class="price">
													Tk. <?php echo htmlentities($row['productPrice']);?>
												</span>

											</div><!-- /.product-price -->
										<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
										</div>
									</div><!-- /.col -->
								</div><!-- /.product-micro-row -->
							</div><!-- /.product-micro -->
						</div>


											</div>
				</div><?php } ?>
							</div>
		</section>
<?php include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>SatheAchi.com Chatbot | Order Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        /* CSS Styles Here */
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f5f5f5; /* Light grey background */
        }

        .chatbot-toggler {
            position: fixed;
            bottom: 30px;
            right: 35px;
            outline: none;
            border: none;
            height: 60px;
            width: 60px;
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #6c5ce7; /* Purple button background */
            transition: all 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        body.show-chatbot .chatbot-toggler {
            transform: rotate(90deg);
        }

        .chatbot-toggler span {
            color: #fff; /* White icon color */
            position: absolute;
            font-size: 24px; /* Icon size */
        }

        .chatbot-toggler span:last-child,
        body.show-chatbot .chatbot-toggler span:first-child {
            opacity: 0;
        }

        body.show-chatbot .chatbot-toggler span:last-child {
            opacity: 1;
        }

        .chatbot {
            position: fixed;
            right: 35px;
            bottom: 90px;
            width: 420px;
            background: #fff; /* White chatbot background */
            border-radius: 25px;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transform: scale(0.5);
            transform-origin: bottom right;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Light shadow */
            transition: all 0.2s ease;
        }

        body.show-chatbot .chatbot {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1);
        }

        .chatbot header {
            padding: 20px 0;
            position: relative;
            text-align: center;
            color: #fff;
            background: #6c5ce7; /* Purple header background */
            border-radius: 25px 25px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        .chatbot header h1 {
            font-size: 1.9rem;
        }

        .chatbot header p {
            font-size: 1.5rem;
        }

        .chatbox {
            overflow-y: auto;
            max-height: 400px;
            padding: 20px;
        }

        .chatbox .chat {
            display: flex;
            list-style: none;
        }

        .chatbox .outgoing p {
            background: #6c5ce7; /* Purple outgoing message background */
            color: #fff; /* White text color */
            border-radius: 15px;
            padding: 12px 16px; /* Padding */
            max-width: 70%; /* Maximum width */
            font-size: 1.2rem; /* Font size */
            margin-bottom: 8px; /* Margin bottom */
        }

        .chatbox .incoming p {
            background: #fff; /* White incoming message background */
            color: #333; /* Dark text color */
            border-radius: 15px;
            padding: 12px 16px; /* Padding */
            max-width: 70%; /* Maximum width */
            font-size: 1.2rem; /* Font size */
            margin-bottom: 8px; /* Margin bottom */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        .chatbot .chat-input {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            background: #fff; /* White background */
            border-radius: 0 0 25px 25px; /* Rounded bottom corners */
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        .chat-input textarea {
            flex: 1;
            height: 45px;
            border: none;
            outline: none;
            resize: none;
            font-size: 1.2rem;
            border-radius: 25px;
            padding: 12px 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chat-input button {
            outline: none;
            border: none;
            background: #6c5ce7; /* Purple send button background */
            color: #fff; /* White text color */
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .chat-input button:hover {
            background: #563d7c; /* Darker purple on hover */
        }
    </style>
</head>

<body>

    <!-- Chatbot Toggle Button -->
    <button class="chatbot-toggler" onclick="toggleChatbot()">
        <span>+</span>
        <span>&times;</span>
    </button>

    <!-- Chatbot Container -->
    <div class="chatbot">
        <!-- Chatbot Header -->
        <header>
            <h1>SatheAchi.com</h1>
            <p>Welcome to SatheAchi.com! How can we assist you today?</p>
        </header>
        <!-- Chatbox -->
        <div class="chatbox">
            <!-- Chat Messages Will Be Displayed Here -->
        </div>
        <!-- Chat Input -->
        <div class="chat-input">
            <textarea id="user-input" placeholder="Type a message..."></textarea>
            <button onclick="sendMessage()">Send</button>
        </div>
        <!-- Order Summary and Print Button -->
        <div id="order-summary" style="display: none;">
            <h2>Your order is confirmed. Thank you!</h2>
            <p>Order Summary:</p>
            <p id="order-details"></p>
            <button onclick="printOrderSummary()">Print</button>
        </div>
    </div>

    <script>
        // JavaScript Code Here
        var orderDetails = {};
        // Global variable to store the order number
        var orderNumber = 1001;
        // Function to toggle chatbot visibility
        function toggleChatbot() {
            document.body.classList.toggle("show-chatbot");
        }
        // Function to send user message
        function sendMessage() {
            var userInput = document.getElementById("user-input").value;
            if (userInput.trim() === "") return;
            var chatbox = document.querySelector(".chatbox");
            var outgoingMessage = `<li class="chat outgoing"><p>${userInput}</p></li>`;
            chatbox.insertAdjacentHTML("beforeend", outgoingMessage);
            document.getElementById("user-input").value = "";
            chatbox.scrollTop = chatbox.scrollHeight;
            // Predefined dataset of questions and answers
            var predefinedDataset = {
                "hi": "Hello! How can I assist you today?",
                "how are you": "I'm doing well, thank you for asking!",
                "bye": "Goodbye! Have a great day!",
                "products offered": "We offer a wide range of products including electronics, clothing, home appliances, and more.",
                "free shipping": "Yes, we offer free shipping on orders over Tk.2000.",
                "track my order": "You can easily track your order by visiting the 'Order Tracking' section on our website.",
                "payment methods": "We accept various payment methods including credit/debit cards, PayPal, and online banking.",
                "return policy": "Yes, we have a hassle-free return policy. You can return items within 30 days for a full refund.",
                "contact customer support": "You can contact our customer support team by phone at 1-800-123-4567 or by email at support@example.com.",
                "product authenticity": "Yes, we only sell authentic products sourced directly from reputable manufacturers and suppliers.",
                "discounts or promotions": "Yes, we frequently offer discounts and promotions on select products.",
                "create an account": "You can easily create an account on our website by clicking on the 'Sign Up' or 'Create Account' button.",
                "store hours": "Our online store is open 24/7, and our customer support team is available 24/7 as well."
            };
            // Check if user's input matches any predefined question
            var response = predefinedDataset[userInput.toLowerCase()];
            if (response) {
                var incomingMessage = `<li class="chat incoming"><p>${response}</p></li>`;
                setTimeout(function () {
                    chatbox.insertAdjacentHTML("beforeend", incomingMessage);
                    chatbox.scrollTop = chatbox.scrollHeight;
                }, 500); // Simulate delay for the chatbot response
            } else {
                // Check if user's input is related to order confirmation
                if (userInput.toLowerCase().includes("order")) {
                    // Start the order confirmation process
                    orderDetails = {};
                    askNextQuestion(chatbox, "Please provide your name:");
                } else {
                    // If no predefined response found and not order-related, display default message
                    handleOrderInput(userInput);
                }
            }
        }
        // Function to handle order input and show the print button after completing the order confirmation
        function handleOrderInput(input) {
            var chatbox = document.querySelector(".chatbox");
            switch (Object.keys(orderDetails).length) {
                case 0:
                    orderDetails.name = input;
                    askNextQuestion(chatbox, "Please provide your contact number:");
                    break;
                case 1:
                    orderDetails.contactNumber = input;
                    askNextQuestion(chatbox, "Please provide your email:");
                    break;
                case 2:
                    orderDetails.email = input;
                    askNextQuestion(chatbox, "Please select the product category:");
                    break;
                case 3:
                    orderDetails.productCategory = input;
                    askNextQuestion(chatbox, "Please provide the size of the product:");
                    break;
                case 4:
                    orderDetails.productSize = input;
                    askNextQuestion(chatbox, "Please provide the shipping address:");
                    break;
                case 5:
                    orderDetails.shippingAddress = input;
                    askNextQuestion(chatbox, "Please select the delivery type:");
                    break;
                case 6:
                    orderDetails.deliveryType = input;
                    // Order confirmation complete, display confirmation message and order summary
                    var confirmationMessage = "Your order is confirmed. Thank you!";
                    var orderSummary = generateOrderSummary();
                    var incomingMessage = `<li class="chat incoming"><p>${confirmationMessage}</p></li>`;
                    chatbox.insertAdjacentHTML("beforeend", incomingMessage);
                    document.getElementById("order-details").innerHTML = orderSummary;
                    document.getElementById("order-summary").style.display = "block";
                    chatbox.scrollTop = chatbox.scrollHeight;
                    break;
                default:
                    break;
            }
        }
        // Function to generate order summary
        function generateOrderSummary() {
            var orderSummary = "";
            orderSummary += "<p>Order Number: " + orderNumber + "</p>";
            orderSummary += "<p>Name: " + orderDetails.name + "</p>";
            orderSummary += "<p>Contact Number: " + orderDetails.contactNumber + "</p>";
            orderSummary += "<p>Email: " + orderDetails.email + "</p>";
            orderSummary += "<p>Shipping Address: " + orderDetails.shippingAddress + "</p>";
            orderSummary += "<p>Delivery Type: " + orderDetails.deliveryType + "</p>";
            return orderSummary;
        }
        // Function to ask next question in the order process
        function askNextQuestion(chatbox, question) {
            var incomingMessage = `<li class="chat incoming"><p>${question}</p></li>`;
            chatbox.insertAdjacentHTML("beforeend", incomingMessage);
            chatbox.scrollTop = chatbox.scrollHeight;
        }
        // Function to print order summary as PDF
        function printOrderSummary() {
            var printContent = document.getElementById("order-summary").innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>
</body>

</html>



</body>
</html>
