<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.brand-slider').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 1500,
            infinite: true,
            centerMode: true,
            cssEase: 'linear',
            easing: 'easy',
            centerPadding: '60px',
            variableWidth: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [

                {
                    breakpoint: 778,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        centerPadding: false,
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        centerPadding: false,
                    }
                },

            ]

        });
    });
</script>


<?php
$slider = get_sub_field('slider');
?>

<section class="brand-slider-section">
    <div class="container">
        <?php

        // check if the nested repeater field has rows of data
        if (have_rows('slider')):
            echo '<div class="brand-slider">';

            // loop through the rows of data
            foreach ($slider as $slide) {
                echo '<div class="slick-slid flex align-center justify-center"><img src="' . $slide['url'] . '" alt="' . $slide['alt'] . '"></div>';
            }
            echo '</div>';
            ?>


        <?php endif; ?>


    </div>
</section>