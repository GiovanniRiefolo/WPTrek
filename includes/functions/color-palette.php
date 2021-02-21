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
