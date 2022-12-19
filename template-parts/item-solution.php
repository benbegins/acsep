<div>
    <h3 class="text-xl font-extrabold mt-6 mb-4"><?= get_the_title(); ?></h3>
    <p><?= get_field('description'); ?></p>
    <a class="btn-secondary mt-4" href="<?php the_permalink() ?>"><?php _e('Découvrir', 'acsep'); ?></a>
</div>