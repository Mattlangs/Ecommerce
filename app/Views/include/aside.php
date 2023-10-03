<head>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include FlexSlider CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>
</head>
<body>
<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			  
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href=""><?php include 'category.php'; ?></a></li>
					</ul>
				 </div>
</nav>
		</div>
		
<div class="w3l_banner_nav_right">
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="image1.jpg" alt="Slider 1">
                    <div class="w3l_banner_nav_right_banner">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="image2.jpg" alt="Slider 2">
                    <div class="w3l_banner_nav_right_banner1">
                        <h3>Make your <span>food</span> with Spicy.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="image3.jpg" alt="Slider 3">
                    <div class="w3l_banner_nav_right_banner2">
                        <h3>upto <i>50%</i> off.</h3>
                        <div class="more">
                            <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>


</div>

</body>
<script>
    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide", // Change the animation type as needed
            slideshowSpeed: 5000, // Set the slideshow speed in milliseconds
            controlNav: false, // Hide navigation bullets
            directionNav: true, // Show navigation arrows
        });
    });
</script>