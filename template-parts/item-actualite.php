<article class="item-actualite">
    <a href="<?php the_permalink() ?>">
        <div class="img img-transition">
            <?php
            if(has_post_thumbnail()) {
                the_post_thumbnail( 'medium_large');
            } else {
                echo '<img src="' . get_template_directory_uri() . '/src/img/illus/visuel-actualite.png" alt=""/>';
            }
            ?>
        </div>
    </a>
    <div class="mt-6 mb-2">
        <?php 
        $categories = get_the_terms($post->ID, 'types_actualites');

        $cat_name = __('Actualités', 'acsep');
        $cat_link = get_post_type_archive_link( 'actualites' );

        if($categories){
            $cat_name = $categories[0]->name;
            $cat_link = get_term_link( $categories[0]->term_id); 
        }        
        ?>
        <a class="text-sm text-beige bg-light-beige px-2 py-1 rounded-md hover:text-dark" href="<?= $cat_link; ?>"><?= $cat_name; ?></a>
    </div>
    <h3 class="text-base">
        <a href="<?php the_permalink() ?>" class="inline-block hover:text-pink"><?= get_the_title(); ?></a>
    </h3>
</article>