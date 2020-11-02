<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'vc-icon-' . $block['id'];
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


<div id="<?php echo esc_attr($id); ?>" class="vc-icon <?php echo esc_attr($classes); ?>">
<style>
    #<?php echo esc_attr($id); ?>{
    display: block;
    <?php if( get_field('vspace') ): ?>
        margin: <?php echo get_field('vspace'); ?>px auto;
        <?php else : ?>
        margin: 0 auto;
    <?php endif; ?>
    }
    #<?php echo esc_attr($id); ?> svg{
    <?php if( get_field('size') ): ?>
        height: <?php echo get_field('size'); ?>px;
        <?php else : ?>
        height: 32px;
    <?php endif; ?>
    }
    #<?php echo esc_attr($id); ?> svg path{
    <?php if( get_field('icon_color') ): ?>
      fill: <?php echo get_field('icon_color'); ?>;
    <?php endif; ?>
    }
</style>
    <?php the_field('svg_code'); ?>
</div>