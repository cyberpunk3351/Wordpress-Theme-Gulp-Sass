<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package breakbeat01
 */

?>

<article>
    <div class="row pt-3">
    <div class="col-md-9">
        <div class="pb-3"><?php get_breadcrumb(); ?></div>
        <?php echo the_post_thumbnail('my-custom-thumb-post', array('class' => 'pb-3')); ?>
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
        <p><small><?php the_time("d M Y"); ?> by <?php the_author() ?></small></p>
        <?php the_content(); ?>
    </div>
    <div class="col-md-3">
        <div class="colorBox2 mb-3"></div>
        <?php get_sidebar();?>
    </div>
    </div>
</article>