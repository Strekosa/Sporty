<?php
function digatalart_tag_rel_post()
{
    global $post;
    $tags = wp_get_post_tags($post->ID);
    echo '<div  class="hide-large-down">';
    if ($tags) {
        $tag_ids = array();
        foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'showposts' => 4,
            'caller_get_posts' => 1
        );
        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {
            echo '<div id="relPost" class="related-posts flex justify-center ">';
            while ($my_query->have_posts()) {
                $my_query->the_post();
                ?>
                <div class="post-item  flex align-center justify-center <?php echo $styles = get_field('styles'); ?>">

                    <div class="post-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </a>
                    </div>


                    <a href="<?php the_permalink(); ?>"
                       class="post-content flex column  <?php echo $hover = get_field('hover_color'); ?>">

                        <div class="post-date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <div class="post-text flex column">
                            <h6><?php the_title(); ?></h6>
                            <div class="flex column">
                                <p> <?php echo wp_trim_words($subtitle = get_field('subtitle'), 19); ?></p>
                                <span class="post-link">

                                <?php _e('Read more '); ?>
                            </span>
                            </div>
                        </div>


                    </a>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>There are no other related posts.</p>';
        }
        wp_reset_postdata();
    }
    echo '</div>';

    echo '<div  class="show-large-down">';
    if ($tags) {
        $tag_ids = array();
        foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'showposts' => 3,
            'caller_get_posts' => 1
        );
        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {
            echo '<div id="relPost" class="related-posts flex justify-center">';
            while ($my_query->have_posts()) {
                $my_query->the_post();
                ?>
                <div class="post-item  flex align-center justify-center <?php echo $styles = get_field('styles'); ?>">

                    <div class="post-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </a>
                    </div>


                    <a href="<?php the_permalink(); ?>"
                       class="post-content flex column <?php echo $hover = get_field('hover_color'); ?>">

                        <div class="post-date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <div class="post-text flex column">
                            <h6><?php the_title(); ?></h6>
                            <div class="flex column">
                                <p> <?php echo wp_trim_words($subtitle = get_field('subtitle'), 13); ?></p>
                                <span class="post-link">

                                <?php _e('Read more '); ?>
                            </span>
                            </div>
                        </div>


                    </a>
                </div>

                <?php
            }
            echo '</div>';
        } else {
            echo '<p>There are no other related posts.</p>';
        }
        wp_reset_postdata();
    }
    echo '</div>';
}
