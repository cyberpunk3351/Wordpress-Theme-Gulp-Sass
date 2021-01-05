<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="favicon.ico">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<div class="container-fluid headColor1 align-self-center">
	<div class="container">
		<div class="row justify-content-between">
			<div><?php the_custom_logo();?></div>
			<div class="align-self-center">
				<?php get_search_form(); ?>
			</div>
		</div>
		
		
		
	</div>

</div>
<div class="container-fluid headColor2 sticky-top">
	<div class="container">
		<!-- ======= Header ======= -->
		<header id="header">
			<div class="container d-flex align-items-center">

				<!-- <h1 class="logo mr-auto"><a href="index.html">Drummer</a></h1> -->
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html" class="logo mr-auto"><picture><source srcset="assets/img/logo.webp" type="image/webp"><img src="assets/img/logo.png" alt="" class="img-fluid"></picture></a>-->

				<nav class="nav-menu d-none d-lg-block">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="#about">Новости</a></li>
						<li><a href="#services">Статьи</a></li>
						<li><a href="#portfolio">Музыка</a></li>
						<li><a href="#team">Team</a></li>
						<li class="drop-down"><a href="">Drop Down</a>
							<ul>
								<li><a href="#">Drop Down 1</a></li>
								<li class="drop-down"><a href="#">Deep Drop Down</a>
									<ul>
										<li><a href="#">Deep Drop Down 1</a></li>
										<li><a href="#">Deep Drop Down 2</a></li>
										<li><a href="#">Deep Drop Down 3</a></li>
										<li><a href="#">Deep Drop Down 4</a></li>
										<li><a href="#">Deep Drop Down 5</a></li>
									</ul>
								</li>
								<li><a href="#">Drop Down 2</a></li>
								<li><a href="#">Drop Down 3</a></li>
								<li><a href="#">Drop Down 4</a></li>
							</ul>
						</li>
						<li><a href="#contact">Contact</a></li>

					</ul>
				</nav><!-- .nav-menu -->
			</div>
		</header><!-- End Header -->
	</div>
</div>
<div id="page" class="site container bc1 mt-3">