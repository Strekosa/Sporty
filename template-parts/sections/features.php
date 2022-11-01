<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.features-slider').slick({
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
                    breakpoint: 971,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

                {
                    breakpoint: 769,
                    settings: {

                        variableWidth: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        variableWidth: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]

        });
    });
</script>
<?php
$slider = get_sub_field('features_list');
?>
<section class="features-section">
    <div class="container-boxed">

        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('features_list')):?>

            <div class="features-main features-slider">
                <?php while (have_rows('features_list')): the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $desc = get_sub_field('description');

                    ?>
                    <div class="features-item slick-slid flex column ">

                        <h2> <?php echo $title; ?></h2>
                        <h6 class="flex align-end"><?php echo $subtitle; ?></h6>
                        <p><?php echo $desc; ?></p>

                    </div>
                <?php endwhile;
                ?>
            </div>

        <?php endif; ?>


    </div>
</section>