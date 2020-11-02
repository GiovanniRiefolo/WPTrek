<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'vc-container-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
    $classes .= sprintf( ' align%s', $block['align'] );
}
 ?>


<div id="<?php echo esc_attr($id); ?>" class="vc-container-block <?php echo esc_attr($classes); ?>"
     <?php if( get_field('bg_color') && get_field('global_bg')): ?>
     data-bg="<?php echo get_field('bg_color'); ?>"
     <?php endif; ?> >

<style>
    #<?php echo esc_attr($id); ?>{
    <?php if( get_field('valign') == 'top' ) : ?>
    align-items: flex-start;
    <?php elseif( get_field('valign') == 'middle' ) : ?>
    align-items: center;
    <?php elseif( get_field('valign') == 'bottom' ) : ?>
    align-items: flex-end;
    <?php endif; ?>
    <?php if( get_field('vheight') == 'fullheight' ) : ?>
        height: 100vh;
    <?php elseif( get_field('vheight') == 'halfheight' ) : ?>
        height: 50vh;
    <?php elseif( get_field('vheight') == 'thirdsheight' ) : ?>
        height: 75vh;
    <?php else : ?>
        height: auto;
    <?php endif; ?>
    <?php if( get_field('bg_color') && get_field('global_bg')): ?>
        background-color: transparent;
        <?php else : ?>
        background-color: <?php echo get_field('bg_color'); ?>;
    <?php endif; ?>
    <?php if( have_rows('margin') ): ?>
    <?php while( have_rows('margin') ): the_row();
        $mtop       = get_sub_field('margin_sup');
        $mbottom    = get_sub_field('margin_inf');
        $msx        = get_sub_field('margin_sx');
        $mdx        = get_sub_field('margin_dx');
        ?>
        margin-top: <?php echo $mtop; ?>px;
        margin-bottom: <?php echo $mbottom; ?>px;
        margin-left: <?php echo $msx; ?>px;
        margin-right: <?php echo $mdx; ?>px;
    <?php endwhile; ?>
    <?php else : ?>
        margin-top: 0;
        margin-bottom: 0;
        margin-left: 0;
        margin-right: 0;
    <?php endif; ?>
    <?php if( have_rows('padding') ): ?>
    <?php while( have_rows('padding') ): the_row();
        $ptop       = get_sub_field('padding_sup');
        $pbottom    = get_sub_field('padding_inf');
        $psx        = get_sub_field('padding_sx');
        $pdx        = get_sub_field('padding_dx');
        ?>
        padding-top: <?php echo $ptop; ?>px;
        padding-bottom: <?php echo $pbottom; ?>px;
        padding-left: <?php echo $psx; ?>px;
        padding-right: <?php echo $pdx; ?>px;
    <?php endwhile; ?>
    <?php else : ?>
        padding-top: 64px;
        padding-bottom: 64px;
        padding-left: 0;
        padding-right: 0;
    <?php endif; ?>
    }
    #<?php echo esc_attr($id); ?> .vc-container-bg{
    <?php if( get_field('bg_opacity') ): ?>
        opacity: <?php echo get_field('bg_opacity'); ?>;
    <?php endif; ?>
    }

   <?php if( get_field('bg_color') && get_field('global_bg')): ?>
        #<?php echo esc_attr($id); ?>{
            background-color: <?php echo get_field('bg_color'); ?>
            transition: background .3s ease-in-out;
        }
     <?php if( get_field('color_scheme') == 'white' ) : ?>
        #<?php echo esc_attr($id); ?>.inview *:not(.wp-block-button__link){
         color: #fff !important;
         border-color: #fff !important important;
        }
        #<?php echo esc_attr($id); ?>.inview svg path{
         fill: #fff !important;
        }
        <?php elseif( get_field('color_scheme') == 'black' ) : ?>
        #<?php echo esc_attr($id); ?>.inview *:not(.wp-block-button__link{
         color: #212121 !important;
         border-color: #212121 !important;
        }
        #<?php echo esc_attr($id); ?>.inview svg path{
         fill: #212121;
        }
     <?php endif; ?>
   <?php endif; ?>
</style>

    <?php if( get_field('bg_image') ): ?>
    <div class="vc-container-bg">
        <figure>
            <?php echo wp_get_attachment_image(get_field('bg_image'), 'full', '', array( 'loading' => 'lazy' )); ?>
        </figure>
    </div>
    <?php endif; ?>
     <?php if(get_field('content_width')) : ?>
     <div class="vc-content" style="max-width: <?php echo get_field('width'); ?>px;">
     <?php else : ?>
     <div class="vc-content">
     <?php endif; ?>
        <InnerBlocks />
    </div>
</div>