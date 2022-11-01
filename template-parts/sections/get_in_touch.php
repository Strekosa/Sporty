<section class="get-in-touch wrapper flex column">
    <div class="get-in-touch-main flex flex-wrap justify-between container-boxed ">

        <?php

        $title = get_sub_field('title');
        $subtitle = get_sub_field('subtitle');
        $form = get_sub_field('form');
        ?>
        <div class="get-in-touch-text flex column">
            <?php if (!empty($subtitle)): ?>
                <p class="subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>
            <?php if (!empty($title)): ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

        </div>
        <div class="get-in-touch-form flex ">
            <?php if ($form):
                foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
                    $cf7_id = $p->ID;
                    echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
                endforeach;
            endif; ?>
        </div>
    </div>
    <div class="container-boxed hide-on-mobile">
        <?php
        $button = get_sub_field('button');
        if (!empty($button)): ?>
            <a class="" href="<?php echo $button['url']; ?>">
                <?php echo $button['title']; ?>
                <svg width="30" height="25" viewBox="0 0 30 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5267 19.3269L14.3885 20.3911C13.6416 21.0949 12.8932 21.7987 12.1506 22.5025C11.9981 22.6639 11.8127 22.7914 11.6067 22.8766C11.4007 22.9618 11.1787 23.0027 10.9555 22.9966C10.9982 22.3477 11.038 21.7185 11.0835 21.0907C11.1917 19.5929 11.2941 18.0966 11.4207 16.6003C11.4465 16.4108 11.5375 16.2359 11.6782 16.1048C15.6874 12.5389 19.7004 8.97569 23.7172 5.41534C23.8595 5.29006 24.0501 5.01558 24.0018 4.92408C23.8595 4.67071 23.5749 4.7622 23.3715 4.87341C22.7512 5.21687 22.1451 5.57722 21.5433 5.95446C16.9906 8.76314 12.438 11.5714 7.88527 14.3791C7.74703 14.4563 7.5844 14.4789 7.43 14.4424C5.25609 13.7855 3.08503 13.1202 0.91682 12.4464C0.507078 12.324 0.0631918 12.1396 0.000592404 11.6511C-0.062007 11.1627 0.342044 10.8811 0.730444 10.7052C1.51436 10.3533 2.31819 10.0366 3.13056 9.73112C7.01931 8.25499 10.9123 6.78308 14.8096 5.3154L24.7942 1.54578C25.6009 1.24174 26.4076 0.933466 27.2128 0.632234C28.3197 0.218392 29.1662 0.789888 29.142 1.95962C29.1192 2.39222 29.0544 2.82165 28.9485 3.24197C28.1698 6.86426 27.3873 10.4847 26.6011 14.1032C25.9722 17.0123 25.3429 19.9214 24.7131 22.8305C24.652 23.1167 24.5639 23.3966 24.4499 23.6666C24.1312 24.407 23.4825 24.6942 22.7427 24.3634C22.2653 24.1336 21.8129 23.8563 21.3925 23.5357C19.5302 22.2027 17.6792 20.8612 15.8226 19.5127C15.7301 19.4536 15.6391 19.4001 15.5267 19.3269Z" fill="#B1DAFF"/>
                </svg>
            </a>

        <?php endif; ?>
    </div>
</section>

<script>
    let icon = ' <svg width="115" height="60" viewBox="0 0 115 60" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                                <path d="M88.7071 31.0562C89.0976 30.6657 89.0976 30.0325 88.7071 29.642L82.3431 23.2781C81.9526 22.8875 81.3195 22.8875 80.9289 23.2781C80.5384 23.6686 80.5384 24.3017 80.9289 24.6923L86.5858 30.3491L80.9289 36.006C80.5384 36.3965 80.5384 37.0297 80.9289 37.4202C81.3195 37.8107 81.9526 37.8107 82.3431 37.4202L88.7071 31.0562ZM0 31.3491H88V29.3491H0V31.3491Z"\n' +
        '                                      fill="white"/>\n' +
        '                                <circle opacity="0.8" cx="85.5" cy="29.8491" r="29" stroke="#B1DAFF"/>\n' +
        '                                <circle opacity="0.8" cx="86" cy="30.3491" r="22.5" stroke="#B1DAFF"/>\n' +
        '                            </svg>';

       $('.button-submit').append(icon);

</script>