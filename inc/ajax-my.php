<?php


function loadmore_get_posts()
{
    $arg = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'posts_per_page' => 7,
    );

    if (isset($_POST['page'])) {
        $arg['paged'] = $_POST['page'];
    }
    if ($_POST['post_per_page'] !== 'mobile' && isset($_POST['post_per_page'])) {
        $arg['posts_per_page'] = $_POST['post_per_page'];
    }elseif ($_POST['post_per_page'] == 'mobile' && isset($_POST['post_per_page'])){
        $arg['posts_per_page'] = -1;
        $arg['paged'] = 1;
        $arg['offset'] = 5;
    }

    $the_query = new WP_Query($arg);
    if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) :
            $the_query->the_post(); ?>
            <div class="post-item  flex align-center justify-center <?php echo $styles = get_field('styles'); ?>">

                <div class="post-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                    </a>
                </div>


                <a href="<?php the_permalink(); ?>">
                    <div class="post-content flex column justify-between  <?php echo $hover = get_field('hover_color'); ?>">
                        <div class="post-date"><?php echo get_the_date('d.m.Y'); ?></div>
                        <div class="post-text">
                            <h6><?php the_title(); ?></h6>
                            <p> <?php echo wp_trim_words($subtitle = get_field('subtitle'), 19); ?></p>
                            <a class="post-link"
                               href="<?php the_permalink(); ?>">
                                <?php _e('Read more '); ?>
                            </a>
                        </div>

                    </div>
                </a>
            </div>

        <?php endwhile; ?>

    <?php endif;

    die();
}

add_action('wp_ajax_loadmore', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_get_posts');


