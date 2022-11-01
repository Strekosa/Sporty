<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.post-slider').slick({
            dots: true,
            arrows: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },

                {
                    breakpoint: 768,
                    settings: {

                        slidesToScroll: 1,
                        vertical: true,
                        autoplay: false,
                        autoplaySpeed: 2500,
                        infinite: true,
                        speed: 500,
                        dots: false,
                        arrows: false,
                    }
                },

            ]

        });
    });
</script>

<?php $hover = get_field('hover_color'); ?>
<section class="post-slider-section">
    <div class="container-boxed flex column">

        <?php
        $text = get_sub_field('title');
        if ($text): ?>
            <h3> <?php echo $text; ?></h3>
        <?php endif; ?>


        <div class="text-center hide-on-mobile">
            <?php $arg = array(
                'post_type' => 'post',
                'order' => 'ASC',
                'orderby' => 'date',
                'posts_per_page' => 9,

            );
            $the_query = new WP_Query($arg);
            if ($the_query->have_posts()) : ?>
                <div class="post-slider">
                    <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->

                    <div class="post-item slick-slid flex align-center justify-center">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="post-content flex column  <?php echo $hover = get_field('hover_color'); ?>">
                                <div class="post-date"><?php echo get_the_date('d.m.Y'); ?></div>
                                <div class="post-text">
                                    <h6><?php the_title(); ?></h6>
                                    <p> <?php echo wp_trim_words(get_the_content(), 25); ?></p>
                                    <a class="post-link"
                                       href="<?php the_permalink(); ?>">
                                        <?php _e('Read more '); ?>
                                    </a>
                                </div>

                            </div>
                        </a>
                    </div>

                    <?php endwhile; ?><!-- END of Post -->

                </div><!-- END of .post-type -->
            <?php endif;
            wp_reset_query(); ?>

        </div>
        <div class="text-center show-on-mobile">
            <?php $arg = array(
                'post_type' => 'post',
                'order' => 'ASC',
                'orderby' => 'date',
                'posts_per_page' => 3,

            );
            $the_query = new WP_Query($arg);
            if ($the_query->have_posts()) : ?>
                <div class="">
                    <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->

                    <div class="post-item slick-slid flex align-center justify-center">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="post-content flex column justify-between  <?php echo $hover = get_field('hover_color'); ?>">
                                <div class="post-date"><?php echo get_the_date('d.m.Y'); ?></div>
                                <div class="post-text">
                                    <h6><?php the_title(); ?></h6>
                                    <p> <?php echo wp_trim_words(get_the_content(), 12); ?></p>
                                    <a class="post-link"
                                       href="<?php the_permalink(); ?>">
                                        <?php _e('Read more '); ?>
                                    </a>
                                </div>

                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?><!-- END of Post -->

                </div><!-- END of .post-type -->
            <?php endif;
            wp_reset_query(); ?>

        </div>

        <div class="arrows flex align-center">
            <button class="arrow prev flex hide-on-mobile">
                <svg width="115" height="60" viewBox="0 0 115 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M88.7071 31.0562C89.0976 30.6657 89.0976 30.0325 88.7071 29.642L82.3431 23.2781C81.9526 22.8875 81.3195 22.8875 80.9289 23.2781C80.5384 23.6686 80.5384 24.3017 80.9289 24.6923L86.5858 30.3491L80.9289 36.006C80.5384 36.3965 80.5384 37.0297 80.9289 37.4202C81.3195 37.8107 81.9526 37.8107 82.3431 37.4202L88.7071 31.0562ZM0 31.3491H88V29.3491H0V31.3491Z"
                          fill="white"/>
                    <circle opacity="0.8" cx="85.5" cy="29.8491" r="29" stroke="#B1DAFF"/>
                    <circle opacity="0.8" cx="86" cy="30.3491" r="22.5" stroke="#B1DAFF"/>
                </svg>
            </button>
            <?php
            $button = get_sub_field('button');
            if (!empty($button)): ?>
                <a class="view-all " href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
            <?php endif; ?>
            <button class="arrow next flex hide-on-mobile">
                <svg width="115" height="60" viewBox="0 0 115 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M88.7071 31.0562C89.0976 30.6657 89.0976 30.0325 88.7071 29.642L82.3431 23.2781C81.9526 22.8875 81.3195 22.8875 80.9289 23.2781C80.5384 23.6686 80.5384 24.3017 80.9289 24.6923L86.5858 30.3491L80.9289 36.006C80.5384 36.3965 80.5384 37.0297 80.9289 37.4202C81.3195 37.8107 81.9526 37.8107 82.3431 37.4202L88.7071 31.0562ZM0 31.3491H88V29.3491H0V31.3491Z"
                          fill="white"/>
                    <circle opacity="0.8" cx="85.5" cy="29.8491" r="29" stroke="#B1DAFF"/>
                    <circle opacity="0.8" cx="86" cy="30.3491" r="22.5" stroke="#B1DAFF"/>
                </svg>
            </button>
        </div>
    </div>
</section>