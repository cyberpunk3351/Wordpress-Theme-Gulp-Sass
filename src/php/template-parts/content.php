<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package breakbeat01
 */

?>

<article id="post-<?php the_ID(); ?>">
	<div class="row pt-3 bottomBorder pb-3">
		<div class="col-md-2 pr-0 pb-3">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
		<div class="col-md-10 align-self-center pb-3">
			<header class="entry-header">
				<?php
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<small><?php the_time("d M Y"); ?>,</small>
						<small>by <?php the_author() ?></small>
						<?php
						// breakbeat01_posted_on();
						// breakbeat01_posted_on();
						// breakbeat01_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'breakbeat01' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'breakbeat01' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php breakbeat01_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
