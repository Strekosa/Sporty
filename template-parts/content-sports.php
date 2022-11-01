<?php
$post_id = $post->ID;
// $title = get_field('title_celebrity', $post_id);

$products = get_field('product_celebrity', $post_id);
// print_r($products);
?>
<div class="single-sport-products-column">
    <div class="single-sport-products-star">
        <div class="single-sport-star-image">
            <?php
            // if (has_post_thumbnail()) {
            //     the_post_thumbnail();
            // }
            ?>
            <img src="<?php echo get_field('category_image', $product_id); ?>" alt="">
            <div class="single-sport-page-products">
                <a class="show-more-btn" href="<?php echo get_post_permalink($post_id); ?>">
                    <span><?php _e('shop by ', 'sporty');

                            echo get_the_title(); ?></span>
                    <svg width="87" height="59" viewBox="0 0 87 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M60.7071 30.7071C61.0976 30.3166 61.0976 29.6834 60.7071 29.2929L54.3432 22.9289C53.9526 22.5384 53.3195 22.5384 52.9289 22.9289C52.5384 23.3195 52.5384 23.9526 52.9289 24.3431L58.5858 30L52.9289 35.6569C52.5384 36.0474 52.5384 36.6805 52.9289 37.0711C53.3195 37.4616 53.9526 37.4616 54.3432 37.0711L60.7071 30.7071ZM0 31L60 31V29L0 29L0 31Z" fill="white" />
                        <circle opacity="0.8" cx="57.5" cy="29.5" r="29" stroke="#E1FFB1" />
                        <circle opacity="0.8" cx="58" cy="30" r="22.5" stroke="#E1FFB1" />
                    </svg>

                </a>
            </div>
        </div>
    </div>

    <div class="sports-slider sports-slider">

        <div class="single-sport-products swiper-wrapper">
            <?php
            $i=1;
            foreach ($products as $product) {

                $product_id = $product->ID;

            ?>
                <a href="#" class="single-sport-product swiper-slide">
                    <div class="single-sport-product-image">
                        <?php
                        if (has_post_thumbnail($product_id)) {
                            echo  get_the_post_thumbnail($product_id);
                        }
                        ?>

                    </div>
                    <h4><?php  $title= get_the_title($product_id);
                        $excerpt = substr($title, 0, 20);
                        echo $excerpt;
                        echo "...";
                        ?></h4>
                    <div class="single-sport-product-content">
                        <div class="single-sport-product-info">
                            <!-- <span>Skate Shoes</span>
                                                                        <span>4 Colors</span> -->
                            <span> <?php echo get_field('product_type', $product_id); ?></span>
                        </div>
                        <div class="single-sport-product-price">
                            <!-- <span>$</span> -->
                            <?php echo get_field('product_price', $product_id); ?>
                        </div>
                    </div>
                </a>
            <?php
                $i++;
                if ( $i > 4 ) { break; }
            }


            ?>
        </div>
    </div>
    <a class="show-more-btn mobile" href="<?php echo get_post_permalink($post_id); ?>">
        <span><?php _e('shop by ', 'sporty');
                echo get_the_title(); ?></span>
        <svg width="87" height="59" viewBox="0 0 87 59" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M60.7071 30.7071C61.0976 30.3166 61.0976 29.6834 60.7071 29.2929L54.3432 22.9289C53.9526 22.5384 53.3195 22.5384 52.9289 22.9289C52.5384 23.3195 52.5384 23.9526 52.9289 24.3431L58.5858 30L52.9289 35.6569C52.5384 36.0474 52.5384 36.6805 52.9289 37.0711C53.3195 37.4616 53.9526 37.4616 54.3432 37.0711L60.7071 30.7071ZM0 31L60 31V29L0 29L0 31Z" fill="white" />
            <circle opacity="0.8" cx="57.5" cy="29.5" r="29" stroke="#E1FFB1" />
            <circle opacity="0.8" cx="58" cy="30" r="22.5" stroke="#E1FFB1" />
        </svg>

    </a>
</div>