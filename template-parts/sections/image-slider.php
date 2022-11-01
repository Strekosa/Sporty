
<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.image-slider').slick({
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
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

                {
                    breakpoint: 778,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]

        });
    });
</script>


<?php
$slider = get_sub_field('slider');
?>

<section class="image-slider-section">
    <div class="container-boxed flex column">
        <div class="search-header ">
            <?php echo get_search_form();?>

            <?php
            $text = get_sub_field( 'title' );
            if ( $text ): ?>
            <?php echo $text; ?>
            <?php endif; ?>


        </div>

        <?php

        // check if the nested repeater field has rows of data
        if( have_rows('slider') ):
            echo '<div class="image-slider">';

            // loop through the rows of data
            foreach($slider as $slide){
                echo '<div class="slick-slid flex align-center justify-center"><img src="'.$slide['url'].'" alt="'.$slide['alt'].'"></div>';
            }
            echo '</div>';
            ?>


        <?php endif; ?>


    </div>
</section>