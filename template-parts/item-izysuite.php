<div class="item-izysuite">
    <div class="logo-container">
        <?php
        $image = get_field('image');
        if($image){
            echo wp_get_attachment_image($image, 'medium');
        }
        ?>
    </div>
    <p class="mt-4"><?= get_field('description'); ?></p>
    <a class="btn-secondary mt-4" href="<?php the_permalink() ?>"><?php _e('Découvrir', 'acsep'); ?></a>
</div>