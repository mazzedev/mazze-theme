<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
	<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class('min-h-screen flex flex-col h-full justify-between'); ?> style="font-family: 'Poppins', sans-serif;">

	<a class="screen-reader-text" href="#content">Skip to content</a>

	<header class="w-full h-full bg-black top-0" x-data="{ open: false }">
		<div class="container mx-auto">
			<nav>
				<div class="relative container mx-auto flex justify-between items-center">
					<!-- Primary Navigation Menu -->
					<div class="hidden w-full sm:flex items-center justify-between px-4 py-3 bg-gray-90">
						<div>
							<a href="/">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logobranca.svg" alt="" class="w-4/12 mr-40">
							</a>
						</div>
						<div class="inline-flex">
							<ul class="flex flex-row list-none text-white text-3xl">
								<?php echo mazze_header_menu(); ?>
							</ul>
						</div>
					</div>
					<!-- Responsive Navigation Menu -->
					<div class="sm:hidden flex items-center justify-between p-3 w-full">
						<a href="/">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logobranca.svg" alt="" class="w-4/12 mr-40">
						</a>
						<div class="block sm:hidden">
							<button x-on:click="open = true" class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-white hover:border-white">
								<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<title>Menu</title>
									<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
								</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="container mx-auto rounded z-10 sm:hidden" id="mobile_menu" x-show.transition="open" x-cloak x-on:click.away="open = false">
					<ul class="flex flex-col list-none block text-purple-mazze w-full text-center bg-white round">
						<?php echo mazze_header_menu(); ?>
					</ul>
				</div>

			</nav>
		</div>
	</header>

	<div id="content" class="flex flex-grow md:px-0 md:py-0 py-4 px-2">
