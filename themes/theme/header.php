<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme' ); ?></a>
		<header id="masthead" class="site-header">
			<div class="site-header__inner">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . "/img/logo.png" ?>" alt="◯◯◯◯◯◯株式会社"></a></h1>
				</div>
				<!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle hamburger" aria-controls="primary-menu" aria-expanded="false"><span class="hamburger_top"></span><span class="hamburger_middle"></span><span class="hamburger_bottom"></span></button>
					<div id="primary-menu" class="menu">
						<ul aria-expanded="true" class="nav-menu">
							<li><div class="js-scroll-area-togled" data-area="#works"><a class="works" href="">作品紹介<small>works</small></a></div></li>
							<li><div class="js-scroll-area-togled" data-area="#about"><a class="about" href="">会社案内<small>company</small></a></div></li>
							<li><div class="js-scroll-area-togled" data-area="#contact"><a class="contact" href="">お問い合わせ<small>contact</small></a></div></li>
							<li class="m_display_none">
								<?php if( wp_is_mobile() ): ?>
									<a class="phone no-caption" href="tel:000-000-0000">000-000-0000</a>
								<?php else: ?>
									<span class="phone no-caption">000-000-0000</span>
								<?php endif; ?>
							</li>
						</ul>
					</div>
				</nav>
				<!-- #site-navigation -->
			</div>
		</header>
		<!-- #masthead -->
<div id="content" class="site-content">
