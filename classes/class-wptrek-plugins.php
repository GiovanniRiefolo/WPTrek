<?php 
// Include the TGM_Plugin_Activation class.
 require_once get_template_directory() . '/classes/class-tgm-plugin-activation.php';

function wptrek_plugins() {
	 // Array of plugin arrays. Required keys are name and slug.
	 // If the source is NOT from the .org repo, then source is also required.
	$plugins = array(
        array(
            'name'               => 'WebP Express',
            'slug'               => 'wep-express',
            'source'             =>  get_template_directory_uri() . '/lib/plugins/webp-ex.zip',
            'required'           => false,
            'version'            => '0.18.2',
            'force_activation'   => false,
        ),
        array(
            'name'               => 'EditorsKit',
            'slug'               => 'block-options',
            'source'             =>  get_template_directory_uri() . '/lib/plugins/block-options.zip',
            'required'           => false,
            'version'            => '1.29.3',
            'force_activation'   => false,
        ),

	);

	$config = array(
        'id'           => 'wptrek',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => true,                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.	);
	);
	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'wptrek_plugins' );