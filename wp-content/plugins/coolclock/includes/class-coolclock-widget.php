<?php

/**
 * CoolClock Widget Class
 */

class CoolClock_Widget extends WP_Widget {

	/** PHP5+ constructor */
	public function __construct() {
		parent::__construct(
				'coolclock-widget',
				__('Analog Clock', 'coolclock'),
				array(
					'classname' => 'coolclock',
					'description' => __('Add an analog clock to your sidebar.', 'coolclock')
					),
				array(
					'width' => 300,
					'id_base' => 'coolclock-widget'
					)
				);
	}

	/** @see WP_Widget::widget -- do not rename this */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = !empty($instance['title']) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$number = $this->number;

		// Print output
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		// set skin
		$skin = ( isset( $instance['skin'] ) )
			? $instance['skin'] : CoolClock::$defaults['skin'];

		// add custom skin parameters to the plugin skins array
		if ( 'custom_'.$number == $skin )
			CoolClock::$advanced_skins_config[$skin] = wp_strip_all_tags( $instance['custom_skin'], true );

		// set footer script flags
		CoolClock::$add_script = true;

		if ( in_array( $skin, CoolClock::$more_skins ) )
			CoolClock::$add_moreskins = true;

		$output = CoolClock::canvas( array(
					'skin' => $skin,
					'radius' => !empty($instance['radius']) && is_numeric($instance['radius']) ? (int) $instance['radius'] : 100,
					'noseconds' => !empty($instance['radius']) ? $instance['noseconds'] : '',
					'gmtoffset' => !empty($instance['gmtoffset']) ? $instance['gmtoffset'] : '',
					'showdigital' => !empty($instance['showdigital']) ? $instance['showdigital'] : '',
					'digitalcolor' => !empty($instance['digitalcolor']) ? $instance['digitalcolor'] : '',
					'scale' => !empty($instance['scale']) ? $instance['scale'] : 'linear',
					'align' => !empty($instance['align']) ? $instance['align'] : 'center',
					'subtext' => !empty($instance['subtext']) ? apply_filters('widget_text', $instance['subtext'], $instance) : ''
					) );

		echo apply_filters( 'coolclock_widget_advanced', $output, $args, $instance );

		echo $after_widget;
	}

	/** @see WP_Widget::update -- do not rename this */
	public function update( $new_instance, $old_instance ) {
		$instance['title'] = !empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['skin'] = !empty($new_instance['skin']) ? strip_tags( $new_instance['skin'] ) : '';
		$instance['custom_skin'] = !empty($new_instance['custom_skin']) ? strip_tags( $new_instance['custom_skin'] ) : '';
		$instance['radius'] = ( empty($new_instance['radius']) || (int) $new_instance['radius'] < 5 ) ? 5 : (int) $new_instance['radius'];
		$instance['noseconds'] = !empty($new_instance['noseconds']) ? '1' : '';
		$instance['gmtoffset'] = !empty($new_instance['gmtoffset']) ? (float) $new_instance['gmtoffset'] : '';
		$instance['showdigital'] = !empty($new_instance['showdigital']) ? strip_tags( $new_instance['showdigital'] ) : '';
		$instance['digitalcolor'] = !empty($new_instance['digitalcolor']) ? CoolClock::colorval( $new_instance['digitalcolor'] ) : '';
		$instance['scale'] = !empty($new_instance['scale']) ? strip_tags( $new_instance['scale'] ) : '';
		$instance['align'] = !empty($new_instance['align']) ? strip_tags( $new_instance['align'] ) : '';

		if ( current_user_can('unfiltered_html') )
			$instance['subtext'] =  $new_instance['subtext'];
		else
			// wp_filter_post_kses() expects slashed
			$instance['subtext'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['subtext']) ) );

    	return apply_filters( 'coolclock_widget_update_advanced', $instance, $new_instance );
	}

	/** @see WP_Widget::form -- do not rename this */
	public function form( $instance ) {
		// Print output
		//echo CoolClock::form( $this, $instance );
		$defaults = array_merge( array('title'=>'','custom_skin'=>''), CoolClock::$defaults, CoolClock::$advanced_defaults );

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr( $instance['title'] );
		$subtext = esc_attr( $instance['subtext'] );
		$custom_skin = esc_attr( $instance['custom_skin'] );

		// Translatable skin names go here
		$skin_names = array (
    		'swissRail' => __('Swiss Rail','coolclock'),
    		'chunkySwiss' => __('Chunky Swiss','coolclock'),
    		'chunkySwissOnBlack' => __('Chunky Swiss White','coolclock'),
    		'fancy' => __('Fancy','coolclock'),
    		'machine' => __('Machine','coolclock'),
    		'simonbaird_com' => __('SimonBaird.com','coolclock'),
    		'classic' => __('Classic by Bonstio','coolclock'),
    		'modern' => __('Modern by Bonstio','coolclock'),
    		'simple' => __('Simple by Bonstio','coolclock'),
    		'securephp' => __('SecurePHP','coolclock'),
    		'Tes2' => __('Tes2','coolclock'),
    		'Lev' => __('Lev','coolclock'),
    		'Sand' => __('Sand','coolclock'),
    		'Sun' => __('Sun','coolclock'),
    		'Tor' => __('Tor','coolclock'),
    		'Cold' => __('Cold','coolclock'),
    		'Babosa' => __('Babosa','coolclock'),
    		'Tumb' => __('Tumb','coolclock'),
    		'Stone' => __('Stone','coolclock'),
    		'Disc' => __('Disc','coolclock'),
    		'watermelon' => __('Watermelon by Yoo Nhe','coolclock'),
    		'mister' => __('Mister by Carl Lister','coolclock'),
    		'minimal' => __('Minimal','coolclock')
    	);

	    $skins = array_merge( CoolClock::$default_skins, CoolClock::$more_skins, CoolClock::$advanced_skins );

		// Translatable type names go here
		$type_names = array (
    		'linear' => __('Linear','coolclock'),
    		'logClock' => __('Logarithmic','coolclock'),
    		'logClockRev' => __('Logarithmic reversed','coolclock')
    	);

		// Translatable show digital options go here
		$showdigital_names = array (
			'' => __('none','coolclock'),
    		'digital12' => __('time (am/pm)','coolclock'),
    		'digital24' => __('time (24h)','coolclock'),
    		'date' => __('date','coolclock')
		);

		// Misc translations
		$stray = array(
			'extra_settings' => __('Extra settings for the CoolClock widget.', 'coolclock')
		);

		// Title
		$output = '<style type="text/css">#available-widgets [class*=clock] .widget-title:before{content:"\f469"}</style>
		<p><label for="' . $this->get_field_id('title') . '">' . __('Title:') . '</label> ';
		$output .= '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';

		// Clock settings
		$output .= '<p><strong>' . __('Clock', 'coolclock') . '</strong></p>';
		$output .= '<p><label for="' . $this->get_field_id('skin') . '">' . __('Skin:', 'coolclock') . '</label> ';
		$output .= '<select class="select" id="' . $this->get_field_id('skin') . '" name="' . $this->get_field_name('skin') . '">';
		foreach ($skins as $value) {
			$output .= '<option value="' . $value . '"';
			$output .= ( $value == $instance['skin'] ) ? ' selected="selected">' : '>';
			$output .= ( isset($skin_names[$value]) ) ? $skin_names[$value] : $value;
			$output .= '</option>';
		} unset($value);
		$output .= '<option value="custom_' . $this->number . '"';
		$output .= ( 'custom_'.$this->number == $instance['skin'] ) ? ' selected="selected">' : '>';
		$output .= __('Custom (define below)', 'coolclock') . '</option></select></p>';

		// Custom skin field
		$output .= '<p><label for="' . $this->get_field_id('custom_skin') . '">' . __('Custom skin parameters:', 'coolclock') . '</label> ';
		$output .= '<textarea class="widefat" id="' . $this->get_field_id('custom_skin') . '" name="' . $this->get_field_name('custom_skin') . '">' . $custom_skin . '</textarea> <em>' .  __('(set Skin to Custom above)', 'coolclock') . '</em></p>';

		// Radius
		$output .= '<p><label for="' . $this->get_field_id('radius') . '">' . __('Radius:', 'coolclock') . '</label> ';
		$output .= '<input class="small-text" id="' . $this->get_field_id('radius') . '" name="' . $this->get_field_name('radius') . '" type="number" min="10" value="' . $instance['radius'] . '" /></p>';

		// Second hand
		$output .= '<p><input id="' . $this->get_field_id('noseconds') . '" name="' . $this->get_field_name('noseconds') . '" type="checkbox" value=';
		$output .= ( $instance['noseconds'] ) ? '"true" checked="checked" />' : '"false" />';
		$output .= ' <label for="' . $this->get_field_id('noseconds') . '">' .  __('Hide second hand', 'coolclock') . '</label></p>';

		// Scale
		$output .= '<p><label for="' . $this->get_field_id('scale') . '">' . __('Scale:', 'coolclock') . '</label> ';
		$output .= '<select class="select" id="' . $this->get_field_id('scale') . '" name="' . $this->get_field_name('scale') . '">';
		foreach ( CoolClock::$clock_types as $key => $value ) {
			$output .= '<option value="' . $key . '"';
			$output .= ( $key == $instance['scale'] ) ? ' selected="selected">' : '>';
			$output .= ( isset($type_names[$key]) ) ? $type_names[$key] : $value;
			$output .= '</option>';
		}
		$output .= '</select></p>';

		// Align
		$output .= '<p><label for="' . $this->get_field_id('align') . '">' . __('Align:', 'coolclock') . '</label> ';
		$output .= '<select class="select" id="' . $this->get_field_id('align') . '" name="' . $this->get_field_name('align') . '">';
		$output .= '<option value=""';
		$output .= ( $instance['align'] == '' ) ? ' selected="selected">' : '>';
		$output .= __('none', 'coolclock') . '</option>';
		$output .= '<option value="left"';
		$output .= ( $instance['align'] == 'left' ) ? ' selected="selected">' : '>';
		$output .= __('left', 'coolclock') . '</option>';
		$output .= '<option value="right"';
		$output .= ( $instance['align'] == 'right' ) ? ' selected="selected">' : '>';
		$output .= __('right', 'coolclock') . '</option>';
		$output .= '<option value="center"';
		$output .= ( $instance['align'] == 'center' ) ? ' selected="selected">' : '>';
		$output .= __('center', 'coolclock') . '</option>';
		$output .= '</select></p>';

		// Subtext
		$output .= '<p><label for="' . $this->get_field_id('subtext') . '">' . __('Subtext:', 'coolclock') . '</label> ';
		$output .= '<input class="widefat" id="' . $this->get_field_id('subtext') . '" name="' . $this->get_field_name('subtext') . '" type="text" value="' . $subtext . '" /> <em>' . __('(basic HTML allowed)', 'coolclock') . '</em></p>';

		// Use GMT offset
		$output .= '<p><label for="' . $this->get_field_id('gmtoffset') . '">' . __('GMT offset:', 'coolclock') . '</label> ';
		$output .= '<input class="small-text" id="' . $this->get_field_id('gmtoffset') . '" name="' . $this->get_field_name('gmtoffset') . '" type="number" step="0.5" value="' . $instance['gmtoffset'] . '" /> <em>' . __('(leave blank for visitor local time)', 'coolclock') . '</em></p>';

		// Show digital
		if ( $instance['showdigital'] == 'true' || $instance['showdigital'] == '1' )
			$instance['showdigital'] = 'digital12'; // backward compat

		$output .= '<p><label for="' . $this->get_field_id('showdigital') . '">' . __('Show digital:', 'coolclock') . '</label> ';
		$output .= '<select class="select" id="' . $this->get_field_id('showdigital') . '" name="' . $this->get_field_name('showdigital') . '">';
		foreach ( CoolClock::$showdigital_options as $key => $value ) {
			$output .= '<option value="' . $key . '"';
			$output .= ( $key == $instance['showdigital'] ) ? ' selected="selected">' : '>';
			$output .= ( isset($showdigital_names[$key]) ) ? $showdigital_names[$key] : $value;
			$output .= '</option>';
		}
		$output .= '</select></p>';

		$advanced = '<p><label for="' . $this->get_field_id('digitalcolor') . '">' . __('Digital color:', 'coolclock') . '</label> ';
		$advanced .= '<input id="' . $this->get_field_id('digitalcolor') . '" name="' . $this->get_field_name('digitalcolor') . '" type="text" value="' . $instance['digitalcolor'] . '" /> <em>' . __('(use a valid HTML color code or name)', 'coolclock') . '</em></p>';

	  $advanced .= '<p><a href="http://premium.status301.net/downloads/coolclock-advanced/">' . __('More digital font options &raquo;', 'coolclock') . '</a></p>
		<p><strong>' . __('Background') . '</strong></p><p><a href="http://premium.status301.net/downloads/coolclock-advanced/">' . __('Available in the Advanced extension &raquo;', 'coolclock') . '</a></p>';

		// Advanced filter
		$output .= apply_filters( 'coolclock_widget_form_advanced', $advanced, $this, $instance, $defaults );

		if ( class_exists( 'CoolClockAdvanced' ) && isset(CoolClockAdvanced::$plugin_version) && version_compare( CoolClockAdvanced::$plugin_version, '7.1', '<' )  ) { // add an upgrade notice
			$output .= '<div class="update-nag"><strong>' . __('Please upgrade the CoolClock - Advanced extension.', 'coolclock') . '</strong> '. ' <a href="http://premium.status301.net/account/" target="_blank">' . __('Please log in with your account credentials here.', 'coolclock') . '</a>' . __('You can download the new version using the link in the downloads list.', 'coolclock') . '</div>';
		}

		echo $output;

	}
}
