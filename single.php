<?php
/**
  * This template display all posts and attachments
  */

 get_header(); ?>

 <section class="content">

    <div class="grid-container">

        <div class="grid-x">

            <main class="content-main small-12 medium-8 large-8 cell" role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part( 'parts/loop', 'single' ); ?>

                <?php endwhile; else : ?>

                    <?php get_template_part( 'parts/content', 'missing' ); ?>

                <?php endif; ?>

            </main> <!-- end main.content-main -->

        </div> <!-- end div.grid-container -->

    </div> <!-- end section.content -->

 </section>

 <?php get_footer(); ?>