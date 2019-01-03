<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bestcellphonetrackerapps
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( is_singular() ) {
	 if(function_exists('bcn_display') && !is_front_page() && !is_category()){ ?>
		 <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
	<?php } 	} ?>
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php bestcellphonetrackerapps_post_thumbnail(); ?>
		 

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				__( 'Continue reading', 'bestcellphonetrackerapps' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bestcellphonetrackerapps' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<footer class="entry-footer">
		<div class="entry-meta">
				<?php
				bestcellphonetrackerapps_posted_by(); 
				?>
				 
				<?php 
				bestcellphonetrackerapps_posted_on();
				?>
			</div>
	</footer>

</article>
