<?php $hover = get_field('hover_color'); ?>
<section class="most-wonted-section">
    <div class="container-boxed flex column">

        <?php
        $text = get_sub_field('title');
        if ($text): ?>
            <h3> <?php echo $text; ?></h3>
        <?php endif; ?>

        <?php
        $i = 1;
        $featured_posts = get_sub_field('wanted');
        if ($featured_posts): ?>
            <div class="wonted-main">
                <?php foreach ($featured_posts as $post):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <div class="wonted-item  pos-rel <?php if ($i > 5) {
                        echo 'hide-on-mobile';
                    } ?>">

                        <div class="product-image flex justify-center align-center">

                            <?php
                            $image = get_field('product_image');
                            if (!empty($image)): ?>
                                <img src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>"/>

                            <?php else : ?>
                                <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>

                            <?php endif; ?>

                        </div>

                        <div class="product-content flex align-center justify-center text-center">

                            <?php
                            $link = get_field('product_link');
                            if (!empty($link)):
                            ?>
                            <a href="<?php echo $link['url'] . '#' . get_post_thumbnail_id() ?>">

                                <?php else : ?>
                                 <a href="<?php the_permalink(); ?>">
                                    <?php endif; ?>

                                    <h5><?php the_title(); ?></h5>

                                    <?php
                                    $type = get_field('product_type');
                                    if (!empty($type)):?>
                                        <p><?php echo $type; ?></p>
                                    <?php endif; ?>

                                    <?php
                                    $price = get_field('product_price');
                                    if (!empty($price)):?>
                                        <h6><?php echo $price; ?></h6>
                                    <?php endif; ?>

                                </a>

                        </div>
                    </div>
                <?php
                    $i++;
                endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>


        <button id="btn-show" class="show-on-mobile">
            Load more
        </button>

    </div>
</section>

<script>

    $(document).ready(function () {
        updateContainer();
        $(window).resize(function () {
            updateContainer();

        });
    });

    function updateContainer() {
        var $containerWidth = $(window).width();
        if ($containerWidth <= 768) {

            $('#btn-show').click((e) => {
                e.preventDefault();
                $('.wonted-item').removeClass('hide-on-mobile');
                $('#btn-show').hide();
            })

        }
    }
</script>