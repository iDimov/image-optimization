<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bestcellphonetrackerapps
 */

get_header();
?>
<section class="top-article-wr">
  <div class="top-article-content">
    <h1>
      FAQ
    </h1>
<?php the_widget( 'Category_Wise_Search_Widget'); ?>
  </div>
</section>

<section class="top-faq-wr">

<div class="item-card">
  <a href="#" >
		<div class="icon-wr">
			<img src="/wp-content/themes/bestcellphonetrackerapps/img/faq/icons/phone.png" alt="">
		</div>
		<p class="h3">
			Phone Tracker
		</p>
	</a>
	</div>
	<div class="item-card">
  <a href="/category/help-center/how-to/" >
		<div class="icon-wr">
			<img src="/wp-content/themes/bestcellphonetrackerapps/img/faq/icons/how.png" alt="">
		</div>
		<p class="h3">
			How to
		</p>
	</a>
	</div>
	<div class="item-card">
  <a href="/category/help-center/social-messengers/" >
		<div class="icon-wr">
			<img src="/wp-content/themes/bestcellphonetrackerapps/img/faq/icons/socials.jpg" alt="">
		</div>
		<p class="h3">
			Social/Messenger
		</p>
	</a>
	</div>
	<div class="item-card">
  <a href="/category/help-center/gps-tracker/" >
		<div class="icon-wr">
			<img src="/wp-content/themes/bestcellphonetrackerapps/img/faq/icons/gps.png" alt="">
		</div>
		<p class="h3">
			GPS Tracker
		</p>
	</a>
	</div>
</section>

	<div id="primary" class="flex-wr single-article">
		<main id="main" class="site-main">
		<div class="h1">Promoted Articles</div>
		<div class="post-links-wr">
			<div class="posts-links">
			<?php
			$args = array(
				'posts_per_page' => 5,
				'orderby' => 'comment_count'
			);
			$q = new WP_Query("cat=28");
			if($q->have_posts()) {
				while($q->have_posts()){ $q->the_post();
					echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
				}
			}
			wp_reset_postdata(); 
			?>
				</div>
			</div>
		</main><!-- #main -->
		<section class="sidebar-right faq-aside">
			<?php 
				// wp_nav_menu( array(
				// 	'menu'           => '29', // Do not fall back to first non-empty menu.
				// 	'fallback_cb'    => false // Do not fall back to wp_page_menu()
				// ) );
			?>
			
		<?php
		 get_sidebar(); 
		?>
	</section>
	</div><!-- #primary -->

<?php
get_footer();
