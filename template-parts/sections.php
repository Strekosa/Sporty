<?php

// Check value exists.
if( have_rows('page_engine') ):

    // Loop through rows.
    while ( have_rows('page_engine') ) : the_row();

        // Case: Side by Side layout.
        if( get_row_layout() == 'side_by_side' ):
            get_template_part('template-parts/sections/side_by_side');

        // Case: Spacer layout.
        elseif( get_row_layout() == 'spacer' ):
            get_template_part('template-parts/sections/spacer');
        // Do something...

        // Case: Hero layout.
        elseif( get_row_layout() == 'hero' ):
            get_template_part('template-parts/sections/hero');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'brand_slider' ):
            get_template_part('template-parts/sections/brand-slider');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'image_slider' ):
            get_template_part('template-parts/sections/image-slider');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'post_slider' ):
            get_template_part('template-parts/sections/post-slider');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'sport_slider' ):
            get_template_part('template-parts/sections/sport_slider');
        // Do something...


        // Case: Contact layout.
        elseif( get_row_layout() == 'features' ):
            get_template_part('template-parts/sections/features');
        // Do something...

        // Case: Contact layout.
        elseif( get_row_layout() == 'most_wanted' ):
            get_template_part('template-parts/sections/most_wanted');
        // Do something...

        // Case: Contact layout.
        elseif( get_row_layout() == 'idols_wear' ):
            get_template_part('template-parts/sections/idols_wear');
        // Do something...

        // Case: Contact layout.
        elseif( get_row_layout() == 'image_gallery' ):
            get_template_part('template-parts/sections/image_gallery');
        // Do something...

        // Case: Half And Half layout.
        elseif( get_row_layout() == 'get_in_touch' ):
            get_template_part('template-parts/sections/get_in_touch');
        // Do something...



        // Case: Text Block layout.
        elseif( get_row_layout() == 'text' ):
            get_template_part('template-parts/sections/text_block');

        endif;

        // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;


