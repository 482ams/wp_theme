<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="site-footer__inner">
			<div id="site-footer-to_top" class="site-footer-to_top">
				<a class="site-footer-to_top-btn" href="#">サイト上部に移動</a>
			</div>
			<div class="site-footer-info">
				<h1 class="site-footer-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . "/img/logo_2.png" ?>" alt="◯◯◯◯◯◯株式会社"></a></h1>
				<div class="site-footer-company_info">
					<p class="site-footer-company_info__addr">秋田県秋田市八橋南二丁目10-34</p>
					<?php if( wp_is_mobile() ): ?>
						<p class="site-footer--company_info_tel"><a href="tel:018-823-7477">Tel:018-823-7477</a></p>
					<?php else: ?>
						<p class="site-footer--company_info_tel">Tel:018-823-7477</p>
					<?php endif; ?>
					<p class="site-footer--company_info__fax">Fax:018-824-2864</p>
				</div>
			</div>
			<p class="site-footer--copyright">COPYRIGHT © AKITA KYODO PRINTING K.K.<span class="u-inline-block">ALL RIGHTS RESERVED.</span></p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
