<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package breakbeat01
 */

?>
<article id="post-<?php the_ID(); ?>" class="row">

    <div class="col-md-3 noRight">
        <?php echo the_post_thumbnail('my-custom-thumb'); ?>
    </div>
    <div class="col-md-9">
        <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );?>
        <span class="badge badge-primary cat-link"><?php the_category(', '); ?></span>
        <p><small><?php the_time("d M Y"); ?> by <?php the_author() ?></small></p>
        <p><?php the_excerpt(); ?></p>
        <div class="morelink">
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" >Читать далее…</a>
        </div>

    </div>

    <div class="borderTop mt-3"></div>
</article><!-- #post-<?php the_ID(); ?> -->