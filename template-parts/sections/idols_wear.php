<section class="idols-wear-section">

    <div class="idols-wear-img pos-rel">
        <div class="container-boxed column">
            <?php
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');

            if (!empty($subtitle)):?>
                <h5 class="subtitle show-large-down"><?php echo $subtitle; ?></h5>
            <?php endif;

            if (!empty($title)):?>
                <h3 class="title show-large-down"><?php echo $title; ?></h3>
            <?php endif; ?>
        </div>
        <div class="image-bg">
            <?php
            $image = get_sub_field('background_image');
            if (!empty($image)): ?>

                <img src="<?php echo esc_url($image['url']); ?>"
                     alt="<?php echo esc_attr($image['alt']); ?>"/>

            <?php endif; ?>


            <?php
            $button = get_sub_field('button');
            if (!empty($button)): ?>
                <a class="btn show-large-down" href="<?php echo $button['url']; ?>">
                    <div><span> <?php echo $button['title']; ?></div>
                    </span>
                </a>
            <?php endif; ?>
        </div>

        <?php
        $button = get_sub_field('button');
        if (!empty($button)): ?>
            <a class="btn hide-large-down" href="<?php echo $button['url']; ?>">
                <div><span> <?php echo $button['title']; ?></div>
                </span>
            </a>
        <?php endif; ?>


        <div class="content">
            <div class="content-title">
                <?php

                if (!empty($subtitle)):?>
                    <h5 class="subtitle hide-large-down"><?php echo $subtitle; ?></h5>
                <?php endif;

                if (!empty($title)):?>
                    <h3 class="title hide-large-down"><?php echo $title; ?></h3>
                <?php endif; ?>
            </div>

            <div class="idols-wear-products ">
                <div class="idols-wear-product">

                    <?php
                    $i = 1;
                    $featured_posts = get_sub_field('products');
                    if ($featured_posts): ?>
                        <div class="products flex ">
                            <?php foreach ($featured_posts as $post):
                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata($post); ?>
                                <?php
                                $link = get_field('product_link');
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                        <div class="product flex column">

                                            <div class="product-image flex justify-center align-center">
                                                <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>
                                            </div>

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

                                        </div>
                                    </a>
                                <?php else: ?>
                            <div class="product flex column">

                                <div class="product-image flex justify-center align-center">
                                    <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>
                                </div>

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

                            </div>
                            <?php  endif; ?>
                            <?php
                                $i++;
                                if ( $i > 3 ) { break; }
                            endforeach; ?>
                        </div>
                        <?php
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>


            </div>

        </div>
    </div>

</section>
