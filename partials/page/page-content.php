<?php
/**
  * Template part for displaying posts
  */

?>


<main>

    <?php if (have_posts()) :?>
    <?php while (have_posts()) : the_post();?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>

</main>