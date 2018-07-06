<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme
 */

get_header();
?>
  <!-- ヒーローエリア -->
  <div id="hero" class="hero js-scroll-togled" data-toggled-delay= "200">
    <div class="hero__back">
      <div class="swiper-container">
        <ul class="swiper-wrapper hero-bg-slide">
          <li class="swiper-slide no_swipe"><div class="cover_img"><img src="<?php echo get_template_directory_uri() . '/img/demo/demo_img_1024_768_1.jpg' ?>" alt=""></div></li>
          <li class="swiper-slide no_swipe"><div class="cover_img"><img src="<?php echo get_template_directory_uri() . '/img/demo/demo_img_1024_768_2.jpg' ?>" alt=""></div></li>
          <li class="swiper-slide no_swipe"><div class="cover_img"><img src="<?php echo get_template_directory_uri() . '/img/demo/demo_img_1024_768_3.jpg' ?>" alt=""></div></li>
        </ul>
      </div>
    </div>
    <div class="hero__front">
      <div class="hero__front__inner">
        <h1>タイトルが入ります</h1>
      </div>
    </div>
  </div>
  <!-- ヒーローエリアここまで -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
    <!-- トップ固定ページページ投稿の上 -->

    <!-- トップ固定ページページ投稿の上終わり -->
  	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        	<div class="entry-content">
        		<?php the_content(); ?>
        	</div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
      <?php endwhile; ?>
		<?php endif; ?>
    <!-- トップ固定ページページ投稿の下 -->

    <!-- トップ固定ページページ投稿の下終わり -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
 //get_sidebar();
get_footer();
