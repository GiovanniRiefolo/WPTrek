<!-- Here a tipical website main header.
     It gets either custom logo or blog info
     based on what you set in the WP options -->
<header>

    <!-- the custom wp logo -->
    <?php if (get_custom_logo() == true) : ?>
        <?php the_custom_logo(); ?>
    <?php else : ?>
        <a href="<?php home_url(); ?>">
            <hgroup>
                <h1><?php bloginfo('name'); ?></h1>
                <h2><?php bloginfo('description'); ?></h2>
            </hgroup>
        </a>
    <?php endif; ?>

</header>