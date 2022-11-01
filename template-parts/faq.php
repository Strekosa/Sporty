<div class="faq-section">
    <?php if ($field = get_field('faq_title')): ?>
        <h3><?php echo $field; ?></h3>
    <?php endif; ?>
    <?php if (have_rows('faq')): ?>
    <div class="flex flex-wrap justify-between">


        <ul class="accordion-list  w-50">

            <?php $count = count(get_field('faq'));
            $count = intdiv($count,2);
            $i = 0;
            ?>

            <?php while (have_rows('faq')): the_row();

                $title = get_sub_field('question');
                $text = get_sub_field('answer');
                if($count == $i ){
                    echo '</ul> <ul class="accordion-list w-50">';
                }
                ?>

                <li class="">

                    <div class="question flex align-center justify-between">
                        <div class="div">
                            <svg class="marker" width="11" height="11" viewBox="0 0 11 11" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5.5" cy="5.5" r="5.5" fill="#A61010"/>
                            </svg>
                            <?php echo $title; ?>
                        </div>
                        <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29289 8.70711C7.68342 9.09763 8.31658 9.09763 8.70711 8.70711L15.0711 2.34315C15.4616 1.95262 15.4616 1.31946 15.0711 0.928935C14.6805 0.53841 14.0474 0.53841 13.6569 0.928934L8 6.58579L2.34315 0.92893C1.95262 0.538406 1.31946 0.538405 0.928934 0.92893C0.53841 1.31945 0.53841 1.95262 0.928934 2.34314L7.29289 8.70711ZM7 7L7 8L9 8L9 7L7 7Z"
                                  fill="white"/>
                        </svg>
                    </div>
                    <div class=" answer">
                        <?php echo $text; ?>
                    </div>
                </li>
            <?php
            $i++;
            endwhile; ?>
        </ul>
    </div>
    <?php endif; ?>

</div>
<!--breadcrumbs-->