<?php
	
function add_submenu() {
		add_submenu_page( 'themes.php', 'Edit The Theme', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'add_submenu' );
	

function settings_init() { 
	register_setting( 'theme_options', 'options_settings' );
	
	add_settings_section(
		'options_page_section', 
		'How this section works', 
		'options_page_section_callback', 
		'theme_options'
	);
	
	function options_page_section_callback() { 
		echo 'This page allows you to customize some parts of the theme.';
	}

	add_settings_field( 
		'text_field', 
		'Featured post id', 
		'text_field_render', 
		'theme_options', 
		'options_page_section' 
	);

	add_settings_field( 
		'checkbox_field', 
		'Check to allow comments', 
		'checkbox_field_render', 
		'theme_options', 
		'options_page_section'  
	);

	add_settings_field( 
		'radio_field', 
		'Choose the product posts to feature', 
		'radio_field_render', 
		'theme_options', 
		'options_page_section'  
	);
	
	
	add_settings_field( 
		'select_field', 
		'Choose post font', 
		'select_field_render', 
		'theme_options', 
		'options_page_section'  
	);

	function text_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="text" name="options_settings[text_field]" value="<?php if (isset($options['text_field'])) echo $options['text_field']; ?>" />
		<?php
	}
	
	function checkbox_field_render() { 
		$options = get_option( 'options_settings' );
	?>
		<input type="checkbox" name="options_settings[checkbox_field]" <?php if (isset($options['checkbox_field'])) checked( 'on', ($options['checkbox_field']) ) ; ?> value="on" />
		<label>Allow for comments</label> 
		<?php	
	}
	
	function radio_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 1 ); ?> value="1" /> <label>Lipsticks</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 2 ); ?> value="2" /> <label>Eyeshadows</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 3 ); ?> value="3" /> <label>Bronzers</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 4 ); ?> value="4" /> <label>Foundations</label>
		<?php
	}

	function select_field_render() { 
		$options = get_option( 'options_settings' );
		?>
		<select name="options_settings[select_field]">
			<option value="1" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>Century Gothic</option>
			<option value="2" <?php if (isset($options['select_field'])) selected( $options['select_field'], 2 ); ?>>Arial</option>
			<option value="3" <?php if (isset($options['select_field'])) selected( $options['select_field'], 3 ); ?>>Verdana</option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Edit the Theme </h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'settings_init' );
