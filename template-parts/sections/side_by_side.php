<?php

$layout = get_sub_field('wrapper_theme');
$image = get_sub_field('image');
$mediaside = get_sub_field('image_side');
?>
<section class="side-by-side wrapper ">
    <div class="flex flex-wrap justify-center container-boxed <?php echo $mediaside; ?>">

    <?php

    // Check value exists.
    if (have_rows('content')):

        // Loop through rows.
        while (have_rows('content')) : the_row();

            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
            ?>
            <div class="content-side w-50 flex column">
                <div class="fuse-block flex column align-start">
                    <?php if (!empty($title)): ?><h3><?php echo $title; ?></h3><?php endif; ?>
                    <div class="description"><?php echo $description; ?></div>
                    <?php if (!empty($button)): ?>
                        <a class="button " href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?>
                            <svg width="115" height="60" viewBox="0 0 115 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M88.7071 31.0562C89.0976 30.6657 89.0976 30.0325 88.7071 29.642L82.3431 23.2781C81.9526 22.8875 81.3195 22.8875 80.9289 23.2781C80.5384 23.6686 80.5384 24.3017 80.9289 24.6923L86.5858 30.3491L80.9289 36.006C80.5384 36.3965 80.5384 37.0297 80.9289 37.4202C81.3195 37.8107 81.9526 37.8107 82.3431 37.4202L88.7071 31.0562ZM0 31.3491H88V29.3491H0V31.3491Z"
                                      fill="white"/>
                                <circle opacity="0.8" cx="85.5" cy="29.8491" r="29" stroke="#B1DAFF"/>
                                <circle opacity="0.8" cx="86" cy="30.3491" r="22.5" stroke="#B1DAFF"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>


        <?php
            // End loop.
        endwhile;
    endif;

    ?>


    <?php
    if (have_rows('media')):
        // Loop through rows.
        while (have_rows('media')) : the_row();
            ?>
            <div class="image-side w-50 pos-rel flex column ">

                <?php

                if (get_row_layout() == 'image'):
                    $image = get_sub_field('image');
                    echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '">';

                elseif (get_row_layout() == 'cpt'):
                    $title = get_sub_field('title');
                    $image = get_sub_field('icon');
                    $button = get_sub_field('button');
                    ?>


                <?php
                elseif (get_row_layout() == 'text'):
                    $title = get_sub_field('title');
                    ?>
                    <div class="image-side__text">
                        <?php
                        if (!empty($title)):?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                    </div>


                <?php
                elseif
                (get_row_layout() == 'form'):
                    $form = get_sub_field('form');

                    if ($form):
                        foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
                            $cf7_id = $p->ID;
                            echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
                        endforeach;
                    endif;

                endif;

                ?>
            </div>
        <?php
            // End loop.
        endwhile;

    endif;


    ?>

    </div>
</section>
