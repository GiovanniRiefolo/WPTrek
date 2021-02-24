<?php
// Adding support to custom editor color palette update the following WordPress base colors with your own.
// This palette is available here @link https://make.wordpress.org/design/handbook/design-guide/foundations/colors/

add_theme_support('editor-color-palette', array(

  array(
    'name'  => esc_html__('WordPress Blue', 'wptrek'),
    'slug'  => 'blue',
    'color' =>  '#0073AA',
  ),
  array(
    'name'  => esc_html__('Medium Blue', 'wptrek'),
    'slug'  => 'medium-blue',
    'color' =>  '#00A0D2',
  ),
  array(
    'name'  => esc_html__('Ultra Dark Gray', 'wptrek'),
    'slug'  => 'ultra-dark-gray',
    'color' =>  '#191E23',
  ),
  array(
    'name'  => esc_html__('Dark Gray', 'wptrek'),
    'slug'  => 'dark-gray',
    'color' =>  '#23282D',
  ),
  array(
    'name'  => esc_html__('Base Gray', 'wptrek'),
    'slug'  => 'base-gray',
    'color' =>  '#32373C',
  ),
  array(
    'name'  => esc_html__('Dark Silver Gray', 'wptrek'),
    'slug'  => 'dark-silver-gray',
    'color' =>  '#82878C',
  ),
  array(
    'name'  => esc_html__('Silver Gray', 'wptrek'),
    'slug'  => 'silver-gray',
    'color' =>  '#A0A5AA',
  ),
  array(
    'name'  => esc_html__('Light Silver Gray', 'wptrek'),
    'slug'  => 'light-silver-gray',
    'color' =>  '#B4B9BE',
  ),

));

// Update custom pallet for color pickers
// @link https://www.advancedcustomfields.com/resources/javascript-api/#filters-color_picker_args
// --- this scripts rely on Iris by Automattic
function wptrek_color_picker_palette_primary()
{
?>
    <script type="text/javascript">
        (function($) {
            acf.add_filter('color_picker_args', function(args, color_primary) {
                // change the official WordPress color palette with your own
                // this palette will be shown in the color pickers
                // @link https://make.wordpress.org/design/handbook/design-guide/foundations/colors/
                args.palettes = [
                    '#0073AA', '#00A0D2', '#191E23', '#23282D',
                    '#32373C', '#82878C', '#A0A5AA', '#B4B9BE'
                ];
                args.options = [
                    width = '100'
                ];
                // return
                return args;
            });

        })(jQuery);
    </script>
<?php
}
add_action('acf/input/admin_footer', 'wptrek_color_picker_palette_primary');

