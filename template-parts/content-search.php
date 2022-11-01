<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>

<article id="post-<?php the_ID(); ?>" class="flex column align-center" <?php post_class(); ?>>
    <div class="entry-post flex column align-center">
        <header class="entry-header">

            <?php the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php
                    example_theme_posted_on();
                    example_theme_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
        <div class="entry-post-img">
            <?php example_theme_post_thumbnail(); ?>
        </div>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    </div>
    <!--	<footer class="entry-footer">-->
    <!--		--><?php //example_theme_entry_footer(); ?>
    <!--	</footer>-->
</article><!-- #post-<?php the_ID(); ?> -->
