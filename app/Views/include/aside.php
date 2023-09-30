
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
<!-- existing HTML code for navigation -->
<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
    <ul class="nav navbar-nav nav_1">
        <!-- Replace this part with the PHP code -->
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="<?= base_url('products?category=' . $category['name']) ?>">
                        <?= $category['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div><!-- /.navbar-collapse -->
<!-- /.navbar-collapse -->
			</nav>
		</div>
</body>
</html>