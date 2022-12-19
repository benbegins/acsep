<article class="py-6 border-b border-gray lg:flex lg:items-center">
    <div class="lg:w-2/3">
        <?php 
        $labels = get_the_terms( $post->ID, 'jobs_types' ); 
        if($labels):
        ?>
        <div class="mb-6 mt-1">
            <?php 
            // var_dump($labels);
            foreach($labels as $label){
                echo '<span class="inline-block text-sm border border-pink px-2 py-1 mr-3 rounded-md">' . $label->name . '</span>';
            }
            ?>
        </div>
        <?php endif; ?>

        <h3 class="font-extrabold text-lg sm:text-xl"><a href="<?php the_permalink(); ?>" class="hover:text-pink"><?php the_title(); ?></a></h3>
        <p class="mt-6">
            <?php 
            if(get_field('resume')){
                the_field('resume');
            } else {
                the_excerpt();
            }
            ?>
        </p>
    </div>
    <div class="mt-6 mb-2 lg:text-right lg:w-1/3 lg:m-0">
        <a href="<?php the_permalink(); ?>" class="inline-block text-pink border-2 border-pink py-3 px-6 rounded-lg hover:bg-pink hover:text-light"><?php _e('Voir l\'offre', 'acsep'); ?></a>
    </div>
</article>