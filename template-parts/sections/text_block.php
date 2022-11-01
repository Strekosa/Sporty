<?php

$title = get_sub_field('title');
$text = get_sub_field('text');

?>
<section class="text-block wrapper ">
    <div class="text-main container-boxed flex column align-center text-center">

        <?php if (!empty($title)): ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>

        <div class="text-text pos-rel">

            <?php if (!empty($text)): ?>
                <?php echo $text; ?>
            <?php endif; ?>
        </div>

        <button id="btn-show" style="display:none">
            Read more
        </button>
        <button id="btn-minus" style="display:none">
            Read less
        </button>


        <script>

            $(document).ready(function () {
                updateContainer();
                $(window).resize(function() {
                    updateContainer();

                });
            });
            function updateContainer() {
                var $containerWidth = $(window).width();
                if ($containerWidth <= 450) {
                    $("#btn-minus").hide();
                    $('#btn-show').show();
                    $('.text-text').addClass('overlay');
                    $('#btn-show').click((e)=>{
                        e.preventDefault();
                        $('.text-text').removeClass('overlay');
                        $("#btn-minus").show();
                        $('#btn-show').hide();

                    })
                    $("#btn-minus").click((e)=>{
                        e.preventDefault();
                        $('.text-text').addClass('overlay');
                        $("#btn-minus").hide();
                        $('#btn-show').show();
                    })
                }
            }
        </script>

    </div>
</section>
