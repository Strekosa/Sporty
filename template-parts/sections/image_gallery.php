<section class="image-gallery-section">
    <div class="container-boxed flex ">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php if ( $images = get_sub_field( 'gallery' ) ): ?>
            <div class="gallery">
                <?php
                $i = 1;
                ?>
                <?php foreach ( $images as $image ):
                    ?>

                    <div class="gallery-item">
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                    </div>

                <?php
                $i++;
                if ( $i > 6 ) { break; }
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>