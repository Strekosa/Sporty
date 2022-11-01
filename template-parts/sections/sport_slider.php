<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.sport-slider').slick({
            dots: false,
            arrows: false,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [

                {
                    breakpoint: 1023,
                    settings: {
                        arrows: true,
                        prevArrow: $('.prev-arrow'),
                        nextArrow: $('.next-arrow'),
                        variableWidth: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },

            ]

        });
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {

        $('.search-field').removeAttr('placeholder');

    });

</script>

<section class="sports-slider-section">
    <div class="container-boxed flex column">

        <div class="search-header ">

            <?php echo get_search_form(); ?>

            <?php
            $text = get_sub_field('title');
            if ($text): ?>
                <?php echo $text; ?>
            <?php endif; ?>

        </div>

        <span class="next-arrow flex align-center justify-center ">
               <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7071 8.70711C20.0976 8.31658 20.0976 7.68342 19.7071 7.29289L13.3431 0.928932C12.9526 0.538408 12.3195 0.538408 11.9289 0.928932C11.5384 1.31946 11.5384 1.95262 11.9289 2.34315L17.5858 8L11.9289 13.6569C11.5384 14.0474 11.5384 14.6805 11.9289 15.0711C12.3195 15.4616 12.9526 15.4616 13.3431 15.0711L19.7071 8.70711ZM1.67803e-09 9L19 9L19 7L-1.67803e-09 7L1.67803e-09 9Z"
                          fill="#32465F"/>
                </svg>
            </span>

        <?php $arg = array(
            'post_type' => 'sports',
            'order' => 'ASC',
            'orderby' => 'date',
            'posts_per_page' => 3,

        );
        $the_query = new WP_Query($arg);
        if ($the_query->have_posts()) : ?>
            <div class="sport-slider">

                <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->
                <div class="sport-item slick-slid flex column pos-rel">

                    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                    <div class="sport-content flex justify-end">
                        <a class="post-link" href="<?php the_permalink(); ?>">
                            <button class="flex justify-end">
                                <?php _e('SEE ALL'); ?>
                                <?php the_title(); ?>
                                <?php _e('HEROES'); ?>
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.7071 8.70711C22.0976 8.31658 22.0976 7.68342 21.7071 7.29289L15.3431 0.928932C14.9526 0.538408 14.3195 0.538408 13.9289 0.928932C13.5384 1.31946 13.5384 1.95262 13.9289 2.34315L19.5858 8L13.9289 13.6569C13.5384 14.0474 13.5384 14.6805 13.9289 15.0711C14.3195 15.4616 14.9526 15.4616 15.3431 15.0711L21.7071 8.70711ZM0 9L21 9V7L0 7L0 9Z"
                                          fill="#32465F"/>
                                </svg>
                            </button>
                        </a>
                    </div>


                </div>
                <?php endwhile; ?><!-- END of Post -->

            </div><!-- END of .post-type -->
        <?php endif;
        wp_reset_query(); ?>

    </div>
</section>