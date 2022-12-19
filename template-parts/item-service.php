<div class="item-service">
    <a href="<?php the_permalink() ?>">
        <div class="img img-transition">
        <?php
        $image = get_field('image');
        if($image){
            echo wp_get_attachment_image($image, 'medium_large');
        }
        ?>
        </div>
    </a>
    <h3 class="text-lg font-extrabold mt-6 mb-4"><?= get_the_title(); ?></h3>
    <p><?= get_field('description'); ?></p>
    <a class="btn-secondary mt-4" href="<?php the_permalink() ?>"><?php _e('Découvrir', 'acsep'); ?></a>
</div>