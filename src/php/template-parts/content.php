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
    <div class="row">
        <div class="col-md-3 noRight">
            <?php echo the_post_thumbnail('my-custom-thumb'); ?>
        </div>
        <div class="col-md-9">
            <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );?>
            <p><small><?php the_time("d M Y"); ?> by <?php the_author() ?></small></p>
            <p><?php the_excerpt(); ?></p>

        </div>
    </div>
    <div class="borderTop mt-3"></div>
</article><!-- #post-<?php the_ID(); ?> -->