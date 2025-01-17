<?php

if(!class_exists('ET_Builder_Module_FH_Divi_Post_Carousel')) {
	class ET_Builder_Module_FH_Divi_Post_Carousel extends ET_Builder_Module_Type_PostBased {
		function init() {
			$this->name       = esc_html__( 'Post Carousel', 'et_builder' );
			$this->plural     = esc_html__( 'Post Carousels', 'et_builder' );
			$this->slug       = 'et_pb_fh_post_carousel';
			$this->vb_support = 'on';

			// need to use global settings from the carousel module
			$this->global_settings_slug = 'et_pb_fh_post_carousel';

			$this->main_css_element = '%%order_class%%.et_pb_fh_post_carousel';

			$this->settings_modal_toggles = array(
				'general'  => array(
					'toggles' => array(
						'main_content'   => esc_html__( 'Content', 'et_builder' ),
						'post_background'   => esc_html__( 'Post Background', 'et_builder' ),
						'elements'       => esc_html__( 'Elements', 'et_builder' ),
						'featured_image' => esc_html__( 'Featured Image', 'et_builder' ),
					),
				),
				'advanced' => array(
					'toggles' => array(
						'layout'     => esc_html__( 'Layout', 'et_builder' ),
						'carousel'    => esc_html__( 'Carousel', 'et_builder' ),
						'navigation' => esc_html__( 'Navigation', 'et_builder' ),
						'image' => array(
							'title' => esc_html__( 'Image', 'et_builder' ),
						),
						'text'       => array(
							'title'    => esc_html__( 'Text', 'et_builder' ),
							'priority' => 49,
						),
					),
				),
				'custom_css' => array(
					'toggles' => array(
						'animation' => array(
							'title'    => esc_html__( 'Animation', 'et_builder' ),
							'priority' => 90,
						),
					),
				),
			);

			$this->advanced_fields = array(
				'fonts'                 => array(
					'header' => array(
						'label'    => esc_html__( 'Title', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_title, {$this->main_css_element} .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_title a",
							'important' => array( 'size', 'font-size', 'plugin_all' ),
						),
						'header_level' => array(
							'default' => 'h2',
						),
					),
					'body'   => array(
						'label'    => esc_html__( 'Body', 'et_builder' ),
						'css'      => array(
							'line_height' => "{$this->main_css_element}, {$this->main_css_element} .et_pb_fh_post_carousel_content",
							'main' => "{$this->main_css_element} .et_pb_fh_post_carousel_content, {$this->main_css_element} .et_pb_fh_post_carousel_content div",
							'important' => 'all',
						),
					),
					'meta'   => array(
						'label'    => esc_html__( 'Meta', 'et_builder' ),
						'css'      => array(
							'main' => "{$this->main_css_element} .et_pb_fh_post_carousel_content .post-meta, {$this->main_css_element} .et_pb_fh_post_carousel_content .post-meta a",
							'limited_main' => "{$this->main_css_element} .et_pb_fh_post_carousel_content .post-meta, {$this->main_css_element} .et_pb_fh_post_carousel_content .post-meta a, {$this->main_css_element} .et_pb_fh_post_carousel_content .post-meta span",
							'important' => 'all',
						),
						'line_height' => array(
							'default' => '1em',
						),
						'font_size' => array(
							'default' => '16px',
						),
						'letter_spacing' => array(
							'default' => '0',
						),
					),
				),
				'box_shadow'            => array(
					'default' => array(
						'css' => array(
							'main' => "{$this->main_css_element} .et_pb_fh_carousel_item",
						),
					),
				),
				'button'                => array(
					'button' => array(
						'label' => esc_html__( 'Button', 'et_builder' ),
						'css' => array(
							'main' => "{$this->main_css_element} .et_pb_more_button.et_pb_button",
							'limited_main' => "{$this->main_css_element} .et_pb_more_button.et_pb_button",
							'alignment' => "{$this->main_css_element} .et_pb_button_wrapper",
						),
						'use_alignment' => true,
						'box_shadow'    => array(
							'css' => array(
								'main' => '%%order_class%% .et_pb_button',
							),
						),
					),
				),
				'background'            => array(
					'css'     => array(
						'main' => "{$this->main_css_element}, {$this->main_css_element}.et_pb_bg_layout_dark",
					),
					'options' => array(
						'parallax_method' => array(
							'default' => 'off',
						),
						'background_color' => array(
							'default'          => '',
						),
					),
				),
				'borders'               => array(
					'default' => array(
						'css' => array(
							'main' => array(
								'border_radii'  => "{$this->main_css_element} .et_pb_fh_carousel_item",
								'border_styles'  => "{$this->main_css_element} .et_pb_fh_carousel_item"
							),
						),
						'defaults' => array(
							'border_radii' => array(),
							'border_styles' => array(
								'width' => '0',
								'color' => '',
								'style' => 'solid'
							)
						)
					),
				),
				'margin_padding' => array(
					'css' => array(
						'main' => '%%order_class%%',
						'padding' => '%%order_class%% .et_pb_fh_post_carousel_description, .et_pb_fh_post_carousel_fullwidth_off%%order_class%% .et_pb_fh_post_carousel_description',
						'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling
					),
				),
				'text'                  => array(
					'use_background_layout' => true,
					'css'   => array(
						'main'             => implode( ', ', array(
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_title',
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_title a',
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_content',
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_content .post-meta',
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_content .post-meta a',
							'%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_content .et_pb_button',
						) ),
						'text_orientation' => '%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description',
						'text_shadow'      => '%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_description',
					),
					'options' => array(
						'text_orientation'  => array(
							'default_on_front' => 'center',
						),
						'background_layout' => array(
							'default_on_front' => 'light',
							'hover' => 'tabs',
						),
					),
				),
				'filters'               => false,
				'animation'               => false,
				'image'                 => array(
					'css' => array(
						'main' => '%%order_class%% .et_pb_fh_post_carousel_image',
					),
				),
			);

			$this->custom_css_fields = array(
				'slide_description' => array(
					'label'    => esc_html__( 'Slide Description', 'et_builder' ),
					'selector' => '.et_pb_fh_post_carousel_description',
				),
				'slide_title' => array(
					'label'    => esc_html__( 'Slide Title', 'et_builder' ),
					'selector' => '.et_pb_fh_post_carousel_description .et_pb_fh_post_carousel_title',
				),
				'slide_meta' => array(
					'label'    => esc_html__( 'Slide Meta', 'et_builder' ),
					'selector' => '.et_pb_fh_post_carousel_content .post-meta',
				),
				'slide_button' => array(
					'label'    => esc_html__( 'Slide Button', 'et_builder' ),
					'selector' => '.et_pb_fh_post_carousel a.et_pb_more_button.et_pb_button',
					'no_space_before_selector' => true,
				),
				'slide_controllers' => array(
					'label'    => esc_html__( 'Slide Controllers', 'et_builder' ),
					'selector' => '.et-pb-controllers',
				),
				'slide_active_controller' => array(
					'label'    => esc_html__( 'Slide Active Controller', 'et_builder' ),
					'selector' => '.et-pb-controllers .et-pb-active-control',
				),
				'slide_image' => array(
					'label'    => esc_html__( 'Slide Image', 'et_builder' ),
					'selector' => '.et_pb_fh_post_carousel_image',
				),
			);
		}

		function get_fields() {
			$post_types = get_post_types( array('public' => true) );
			$post_types = array_map('ucfirst', $post_types);
			$post_typesarr = get_post_types( array('public' => true) );
			$post_types = array_map('ucfirst', $post_types);
			$taxonomyfields = array();
			if($post_types) {
				$cats = array();
				foreach($post_typesarr as $type) {
					$taxonomies = get_object_taxonomies( array( 'post_type' => $type ) );
					$taxoArr = array();
					if($taxonomies && count($taxonomies)) {
						$termsArr = array();
						foreach($taxonomies as $tax) {
							$taxonomy_details = get_taxonomy( $tax );
							$taxoArr[$tax] = $taxonomy_details->label;
							$termsData = get_terms(
								array(
									'taxonomy' => $tax,
									'hide_empty' => true
								)
							);
							if($termsData && count($termsData)) {
								foreach($termsData as $td) {
									$termsArr[$td->slug] = $td->name;
								}
							}
						}
						$taxonomyfields['include_taxonomy_'.$type] = array(
							'label'             => esc_html__( 'Select Taxonomy', 'et_builder' ),
							'type'            => 'select',
							'option_category' => 'basic_option',
							'options'         => $taxoArr,
							'toggle_slug'       => 'main_content',
							'show_if'         => array(
								'selected_post_type' => array( $type ),
							),
						);
						foreach($taxonomies as $tax) {
							$taxonomyfields['include_cat_'.$tax] = array(
								'label'             => esc_html__( 'Select Category', 'et_builder' ),
								'type'              => 'categories',
								'option_category'   => 'basic_option',
								'description'       => esc_html__( 'Choose post type you would like to display in the carousel.', 'et_builder' ),
								'toggle_slug'       => 'main_content',
								'show_if'         => array(
									'selected_post_type' => array( $type ),
								),
								'taxonomy_name'     => $tax,
								'toggle_slug'       => 'main_content',
								'show_if'           => array(
									'include_taxonomy_'.$type => array( $tax ),
									'selected_post_type' => array( $type ),
								),
							);
						}
					}
				}
			}
			$fields = array(
				'selected_post_type' => array(
					'label'             => esc_html__( 'Select Post Type', 'et_builder' ),
					'type'              => 'select',
					'options'           => $post_types,
					'description'       => esc_html__( 'Choose post type you would like to display in the carousel.', 'et_builder' ),
					'toggle_slug'       => 'main_content',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'posts_number' => array(
					'label'            => esc_html__( 'Number of posts to show', 'et_builder' ),
					'type'             => 'text',
					'option_category'  => 'basic_option',
					'renderer_options' => array(
						'use_terms' => false,
					),
					'description'      => esc_html__( 'Enter number of posts to show', 'et_builder' ),
					'toggle_slug'      => 'main_content',
					'default'          => 10,
					'computed_affects' => array(
						'__fhcallback',
					),
				),
			
			);

			foreach($taxonomyfields as $key => $tax) {
				$fields[$key] = $tax;
			}

			$fieldPart2 = array(
				'orderby' => array(
					'label'             => esc_html__( 'Order By', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'date_desc'  => esc_html__( 'Date: new to old', 'et_builder' ),
						'date_asc'   => esc_html__( 'Date: old to new', 'et_builder' ),
						'title_asc'  => esc_html__( 'Title: a-z', 'et_builder' ),
						'title_desc' => esc_html__( 'Title: z-a', 'et_builder' ),
						'rand'       => esc_html__( 'Random', 'et_builder' ),
					),
					'toggle_slug'       => 'main_content',
					'description'       => esc_html__( 'Here you can adjust the order in which posts are displayed.', 'et_builder' ),
					'computed_affects'  => array(
						'__fhcallback',
					),
					'default_on_front'  => 'date_desc',
				),
				'post_bg' => array(
					'label'            => esc_html__( 'Post Item Background Color', 'et_builder' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'toggle_slug'      => 'post_background',
					'default'          => '#fff',
					'description'     => esc_html__( 'This setting will apply background color to post item ignored if featured image placement was set to background.', 'et_builder' ),
				),
				'show_arrows'         => array(
					'label'           => esc_html__( 'Show Arrows', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front'  => 'on',
					'toggle_slug'     => 'elements',
					'description'     => esc_html__( 'This setting will turn on and off the navigation arrows.', 'et_builder' ),
				),
				'show_pagination' => array(
					'label'             => esc_html__( 'Show Controls', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'configuration',
					'options'           => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front'  => 'on',
					'toggle_slug'       => 'elements',
					'description'       => esc_html__( 'This setting will turn on and off the circle buttons at the bottom of the carousel.', 'et_builder' ),
				),
				'show_more_button' => array(
					'label'             => esc_html__( 'Show Read More Button', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'configuration',
					'options'           => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front'  => 'on',
					'affects' => array(
						'more_text',
					),
					'toggle_slug'       => 'elements',
					'description'       => esc_html__( 'This setting will turn on and off the read more button.', 'et_builder' ),
				),
				'more_text' => array(
					'label'             => esc_html__( 'Button Text', 'et_builder' ),
					'type'              => 'text',
					'option_category'   => 'configuration',
					'default_on_front'  => esc_html__( 'Read More', 'et_builder' ),
					'depends_show_if'   => 'on',
					'toggle_slug'       => 'main_content',
					'dynamic_content'   => 'text',
					'description'       => esc_html__( 'Define the text which will be displayed on "Read More" button. leave blank for default ( Read More )', 'et_builder' ),
				),
				'content_source' => array(
					'label'             => esc_html__( 'Content Display', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'off' => esc_html__( 'Show Excerpt', 'et_builder' ),
						'on'  => esc_html__( 'Show Content', 'et_builder' ),
					),
					'default'           => 'off',
					'affects' => array(
						'use_manual_excerpt',
						'excerpt_length',
					),
					'description'       => esc_html__( 'Showing the full content will not truncate your posts in the carousel. Showing the excerpt will only display excerpt text.', 'et_builder' ),
					'toggle_slug'       => 'main_content',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'use_manual_excerpt' => array(
					'label'             => esc_html__( 'Use Post Excerpt if Defined', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'configuration',
					'options'           => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default'           => 'on',
					'depends_show_if'   => 'off',
					'description'       => esc_html__( 'Disable this option if you want to ignore manually defined excerpts and always generate it automatically.', 'et_builder' ),
					'toggle_slug'       => 'main_content',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'excerpt_length' => array(
					'label'             => esc_html__( 'Automatic Excerpt Length', 'et_builder' ),
					'type'              => 'text',
					'default'           => '270',
					'option_category'   => 'configuration',
					'depends_show_if'   => 'off',
					'description'       => esc_html__( 'Define the length of automatically generated excerpts. Leave blank for default ( 270 ) ', 'et_builder' ),
					'toggle_slug'       => 'main_content',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'show_meta' => array(
					'label'           => esc_html__( 'Show Post Meta', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'on',
					'toggle_slug'     => 'elements',
					'description'     => esc_html__( 'This setting will turn on and off the meta section.', 'et_builder' ),
				),
				'show_image' => array(
					'label'             => esc_html__( 'Show Featured Image', 'et_builder' ),
					'type'              => 'yes_no_button',
					'option_category'   => 'configuration',
					'options'           => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front'  => 'on',
					'affects'           => array(
						'image_placement',
					),
					'toggle_slug'       => 'featured_image',
					'description'       => esc_html__( 'This setting will turn on and off the featured image in the carousel.', 'et_builder' ),
				),
				'image_placement' => array(
					'label'             => esc_html__( 'Image Placement', 'et_builder' ),
					'type'              => 'select',
					'option_category'   => 'configuration',
					'options'           => array(
						'background' => esc_html__( 'Background', 'et_builder' ),
						'left'       => esc_html__( 'Left', 'et_builder' ),
						'right'      => esc_html__( 'Right', 'et_builder' ),
						'top'        => esc_html__( 'Top', 'et_builder' ),
						'bottom'     => esc_html__( 'Bottom', 'et_builder' ),
					),
					'default_on_front'  => 'top',
					'depends_show_if'   => 'on',
					'toggle_slug'       => 'featured_image',
					'description'       => esc_html__( 'Select how you would like to display the featured image in slides', 'et_builder' ),
				),
				'autoplay'      => array(
					'label'           => esc_html__( 'Autoplay Carousel', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'on',
					'affects'         => array(
						'autoplay_time',
						'autoplay_hoverpause'
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, carousel will start rotating automatically.', 'et_builder' ),
				),
				'autoplay_time' => array(
					'label'             => esc_html__( 'Autoplay Time', 'et_builder' ),
					'type'              => 'range',
					'range_settings'    =>  array(
						'min' => '1000',
						'max' => '10000',
						'step' => '500'
					),
					'default' => '5000',
					'validate_unit' => true,
					'option_category'   => 'configuration',
					'description'       => esc_html__( 'Define the autoplay time for carousel.', 'et_builder' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'       => 'carousel',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'autoplay_hoverpause'      => array(
					'label'           => esc_html__( 'Autoplay Hover Pause', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'off',
					'affects'         => array(
						'autoplay_time',
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, carousel will stop moving once mouse enters to carousel items.', 'et_builder' ),
				),
				'carousel_items' => array(
					'label'             => esc_html__( 'Items to show', 'et_builder' ),
					'type'              => 'text',
					'default' => '3',
					'option_category'   => 'configuration',
					'description'       => esc_html__( 'Define the carousel items to show carousel.', 'et_builder' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'       => 'carousel',
					'computed_affects'  => array(
						'__fhcallback',
					),
					'mobile_options'  => true,
					'responsive'      => true,
				),
				'loop'      => array(
					'label'           => esc_html__( 'Loop Items', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a carousel will rotate infintely.', 'et_builder' ),
				),
				'item_margin' => array(
					'label'             => esc_html__( 'Margin between items', 'et_builder' ),
					'type'              => 'range',
					'range_settings'    =>  array(
						'min' => '0',
						'max' => '30',
						'step' => '10'
					),
					'default' => '0',
					'validate_unit' => true,
					'option_category'   => 'configuration',
					'description'       => esc_html__( 'Define the carousel items to show carousel.', 'et_builder' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'       => 'carousel',
					'computed_affects'  => array(
						'__fhcallback',
					),
				),
				'mouse_drag'      => array(
					'label'           => esc_html__( 'Mouse Drag', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a you can drag the carousel using mouse.', 'et_builder' ),
				),
				'touch_drag'      => array(
					'label'           => esc_html__( 'Touch Drag', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a you can drag the carousel using touch on touch devices.', 'et_builder' ),
				),
				/*'auto_width'      => array(
					'label'           => esc_html__( 'Auto Width', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a carousel items will be in dynamic width.', 'et_builder' ),
				),*/
				'rewind'      => array(
					'label'           => esc_html__( 'Rewind', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a carousel will rewind to start once reached to end items.', 'et_builder' ),
				),
				'slide_by'      => array(
					'label'           => esc_html__( 'Slide By', 'et_builder' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'default_on_front' => '1',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'Enter number of items you want to slide at once.', 'et_builder' ),
				),
				'dots_each'      => array(
					'label'           => esc_html__( 'Dots Each', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a carousel will show single-single dots for carousel item.', 'et_builder' ),
				),
				'lazy_load'      => array(
					'label'           => esc_html__( 'Lazy Load', 'et_builder' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'et_builder' ),
						'off' => esc_html__( 'No', 'et_builder' ),
					),
					'default_on_front' => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'carousel',
					'description'     => esc_html__( 'When enabled, a carousel images will be lazy loaded.', 'et_builder' ),
				),
				'arrows_custom_color' => array(
					'label'        => esc_html__( 'Arrows Custom Color', 'et_builder' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'navigation',
				),
				'dot_nav_custom_color' => array(
					'label'        => esc_html__( 'Dot Nav Custom Color', 'et_builder' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'navigation',
				),
				'__fhcallback' => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'ET_Builder_Module_FH_Divi_Post_Carousel', 'get_blog_posts' ),
					'computed_depends_on' => array(
						'tax_query',
						'orderby',
						'content_source',
						'use_manual_excerpt',
						'excerpt_length',
					),
				),
			);

			foreach($fieldPart2 as $key => $tax) {
				$fields[$key] = $tax;
			}

			return $fields;
		}

		public function get_transition_fields_css_props() {
			$fields = parent::get_transition_fields_css_props();
			$fields['background_layout'] = array(
				'background-color' => '%%order_class%% .et_pb_fh_post_carousel_overlay_container, %%order_class%% .et_pb_text_overlay_wrapper',
				'color' => self::$_->array_get( $this->advanced_fields, 'text.css.main', '%%order_class%%' ),
			);

			$fields['bg_overlay_color'] = array(
				'background-color' => '%%order_class%% .et_pb_fh_post_carousel .et_pb_fh_post_carousel_overlay_container',
			);

			$fields['text_overlay_color'] = array(
				'background-color' => '%%order_class%% .et_pb_fh_post_carousel .et_pb_text_overlay_wrapper',
			);

			return $fields;
		}

		static function get_blog_posts( $args = array(), $conditional_tags = array(), $current_page = array(), $is_ajax_request = true ) {
			global $wp_query;

			$defaults = array(
				'post_type'          => 'post',
				'posts_number'       => '',
				'orderby'            => '',
				'content_source'     => '',
				'use_manual_excerpt' => '',
				'excerpt_length'     => '',
			);

			$args = wp_parse_args( $args, $defaults );			

			$query_args = array(
				'posts_per_page' => (int) $args['posts_number'],
				'post_status'    => 'publish',
			);

			if ( '' !== $args['post_type'] ) {
				$query_args['post_type'] = $args['post_type'];
			}

			if ( '' !== $args['tax_query'] ) {
				$query_args['tax_query'] = $args['tax_query'];
			}

			if ( 'date_desc' !== $args['orderby'] ) {
				switch ( $args['orderby'] ) {
					case 'date_asc':
						$query_args['orderby'] = 'date';
						$query_args['order'] = 'ASC';
						break;
					case 'title_asc':
						$query_args['orderby'] = 'title';
						$query_args['order'] = 'ASC';
						break;
					case 'title_desc':
						$query_args['orderby'] = 'title';
						$query_args['order'] = 'DESC';
						break;
					case 'rand':
						$query_args['orderby'] = 'rand';
						break;
				}
			}

			$query = new WP_Query( $query_args );

			// Keep page's $wp_query global
			$wp_query_page = $wp_query;

			// Turn page's $wp_query into this module's query
			$wp_query = $query; //phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited

			if ( $query->have_posts() ) {
				$post_index = 0;
				while ( $query->have_posts() ) {
					$query->the_post();

					$post_author_id = $query->posts[ $post_index ]->post_author;

					$categories = array();

					$categories_object = get_the_terms( get_the_ID(), 'category' );

					if ( ! empty( $categories_object ) ) {
						foreach ( $categories_object as $category ) {
							$categories[] = array(
								'id' => $category->term_id,
								'label' => $category->name,
								'permalink' => get_term_link( $category ),
							);
						}
					}

					$query->posts[ $post_index ]->post_featured_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) );
					$query->posts[ $post_index ]->has_post_thumbnail  = has_post_thumbnail();
					$query->posts[ $post_index ]->post_permalink      = get_the_permalink();
					$query->posts[ $post_index ]->post_author_url     = get_author_posts_url( $post_author_id );
					$query->posts[ $post_index ]->post_author_name    = get_the_author_meta( 'display_name', $post_author_id );
					$query->posts[ $post_index ]->post_date_readable  = get_the_date();
					$query->posts[ $post_index ]->categories          = $categories;
					$query->posts[ $post_index ]->post_comment_popup  = et_core_maybe_convert_to_utf_8( sprintf( esc_html( _nx( '%s Comment', '%s Comments', get_comments_number(), 'number of comments', 'et_builder' ) ), number_format_i18n( get_comments_number() ) ) );

					$post_content = et_strip_shortcodes( get_the_content(), true );

					global $et_fb_processing_shortcode_object, $et_pb_rendering_column_content;

					$global_processing_original_value = $et_fb_processing_shortcode_object;

					// reset the fb processing flag
					$et_fb_processing_shortcode_object = false;
					// set the flag to indicate that we're processing internal content
					$et_pb_rendering_column_content = true;

					if ( $is_ajax_request ) {
						// reset all the attributes required to properly generate the internal styles
						ET_Builder_Element::clean_internal_modules_styles();
					}

					if ( 'on' === $args['content_source'] ) {
						global $more;

						// page builder doesn't support more tag, so display the_content() in case of post made with page builder
						if ( et_pb_is_pagebuilder_used( get_the_ID() ) ) {
							$more = 1; // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited

							// do_shortcode for Divi Plugin instead of applying `the_content` filter to avoid conflicts with 3rd party themes
							$builder_post_content = et_is_builder_plugin_active() ? do_shortcode( $post_content ) : apply_filters( 'the_content', $post_content );

							// Overwrite default content, in case the content is protected
							$query->posts[ $post_index ]->post_content = $builder_post_content;
						} else {
							$more = null; // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited

							// Overwrite default content, in case the content is protected
							$query->posts[ $post_index ]->post_content = et_is_builder_plugin_active() ? do_shortcode( get_the_content( '' ) ) : apply_filters( 'the_content', get_the_content( '' ) );
						}
					} else {
						if ( has_excerpt() && 'off' !== $args['use_manual_excerpt'] ) {
							$query->posts[ $post_index ]->post_content =  et_is_builder_plugin_active() ? do_shortcode( et_strip_shortcodes( get_the_excerpt(), true ) ) : apply_filters( 'the_content', et_strip_shortcodes( get_the_excerpt(), true ) );
						} else {
							$query->posts[ $post_index ]->post_content = strip_shortcodes( truncate_post( intval( $args['excerpt_length'] ), false, '', true ) );
						}
					}

					$et_fb_processing_shortcode_object = $global_processing_original_value;

					if ( $is_ajax_request ) {
						// retrieve the styles for the modules inside Blog content
						$internal_style = ET_Builder_Element::get_style( true );

						// reset all the attributes after we retrieved styles
						ET_Builder_Element::clean_internal_modules_styles( false );

						$query->posts[ $post_index ]->internal_styles = $internal_style;
					}

					$et_pb_rendering_column_content = false;

					$post_index++;
				} // end while
				wp_reset_query();
			} else if ( wp_doing_ajax() || et_core_is_fb_enabled() ) {
				// This is for the VB
				$query  = '<div class="et_pb_no_results">';
				$query .= self::get_no_results_template();
				$query .= '</div>';

				$query = array( 'posts' => $query );
			}

			wp_reset_postdata();

			// Reset $wp_query to its origin
			$wp_query = $wp_query_page; // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited

			return $query;
		}

		function render( $attrs, $content = null, $render_slug ) {
			$selected_post_type              = $this->props['selected_post_type'];
			$autoplay                        = $this->props['autoplay'];
			$autoplay_time                   = $this->props['autoplay_time'];
			$autoplay_hoverpause             = $this->props['autoplay_hoverpause'];
			$carousel_items                  = $this->props['carousel_items'];
			$carousel_items_tablet           = $this->props['carousel_items_tablet'];
			$carousel_items_phone            = $this->props['carousel_items_phone'];
			$carousel_items_last_edited      = $this->props['carousel_items_last_edited'];
			$loop                            = $this->props['loop'];
			$post_bg                         = $this->props['post_bg'];
			$item_margin                     = $this->props['item_margin'];
			$mouse_drag                      = $this->props['mouse_drag'];
			$touch_drag                      = $this->props['touch_drag'];
			/*$auto_width                      = $this->props['auto_width'];*/
			$rewind                          = $this->props['rewind'];
			$slide_by                        = $this->props['slide_by'];
			$dots_each                       = $this->props['dots_each'];
			$lazy_load                       = $this->props['lazy_load'];
			$show_arrows                     = $this->props['show_arrows'];
			$show_pagination                 = $this->props['show_pagination'];
			$parallax                        = $this->props['parallax'];
			$parallax_method                 = $this->props['parallax_method'];
			$body_font_size                  = $this->props['body_font_size'];
			$background_position             = $this->props['background_position'];
			$background_size                 = $this->props['background_size'];
			$background_repeat               = $this->props['background_repeat'];
			$background_blend                = $this->props['background_blend'];
			$posts_number                    = $this->props['posts_number'];
			$selected_tax                    = $this->props['include_taxonomy_'.$selected_post_type];
			$include_categories              = $this->props['include_cat_'.$selected_tax];
			$show_more_button                = $this->props['show_more_button'];
			$more_text                       = $this->props['more_text'];
			$content_source                  = $this->props['content_source'];
			$background_color                = $this->props['background_color'];
			$show_image                      = $this->props['show_image'];
			$image_placement                 = $this->props['image_placement'];
			$background_image                = $this->props['background_image'];
			$background_layout               = $this->props['background_layout'];
			$background_layout_hover         = et_pb_hover_options()->get_value( 'background_layout', $this->props, 'light' );
			$background_layout_hover_enabled = et_pb_hover_options()->is_enabled( 'background_layout', $this->props );
			$orderby                         = $this->props['orderby'];
			$show_meta                       = $this->props['show_meta'];
			$button_custom                   = $this->props['custom_button'];
			$custom_icon                     = $this->props['button_icon'];
			$use_manual_excerpt              = $this->props['use_manual_excerpt'];
			$excerpt_length                  = $this->props['excerpt_length'];
			$dot_nav_custom_color            = $this->props['dot_nav_custom_color'];
			$arrows_custom_color             = $this->props['arrows_custom_color'];
			$button_rel                      = $this->props['button_rel'];
			$header_level                    = $this->props['header_level'];

			$post_index                      = 0;
			$hide_on_mobile_class            = '';//self::HIDE_ON_MOBILE;

			//print_r($include_categories); die;

			// Applying backround-related style to slide item since advanced_option only targets module wrapper
			if ( 'on' === $this->props['show_image'] && 'background' === $this->props['image_placement'] && 'off' === $parallax ) {
				if ('' !== $background_color) {
					ET_Builder_Module::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .et_pb_fh_post_carousel:not(.et_pb_fh_post_carousel_with_no_image)',
						'declaration' => sprintf(
							'background-color: %1$s;',
							esc_html( $background_color )
						),
					) );
				}

				if ( '' !== $background_size && 'default' !== $background_size ) {
					ET_Builder_Module::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .et_pb_fh_post_carousel',
						'declaration' => sprintf(
							'-moz-background-size: %1$s;
							-webkit-background-size: %1$s;
							background-size: %1$s;',
							esc_html( $background_size )
						),
					) );

					if ( 'initial' === $background_size ) {
						ET_Builder_Module::set_style( $render_slug, array(
							'selector'    => 'body.ie %%order_class%% .et_pb_fh_post_carousel',
							'declaration' => '-moz-background-size: auto; -webkit-background-size: auto; background-size: auto;',
						) );
					}
				}

				if ( '' !== $background_position && 'default' !== $background_position ) {
					$processed_position = str_replace( '_', ' ', $background_position );

					ET_Builder_Module::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .et_pb_fh_post_carousel',
						'declaration' => sprintf(
							'background-position: %1$s;',
							esc_html( $processed_position )
						),
					) );
				}

				if ( '' !== $background_repeat ) {
					ET_Builder_Module::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .et_pb_fh_post_carousel',
						'declaration' => sprintf(
							'background-repeat: %1$s;',
							esc_html( $background_repeat )
						),
					) );
				}

				if ( '' !== $background_blend ) {
					ET_Builder_Module::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .et_pb_fh_post_carousel',
						'declaration' => sprintf(
							'background-blend-mode: %1$s;',
							esc_html( $background_blend )
						),
					) );
				}
			}
			else {
				if(empty($post_bg)) {
					$post_bg = '#fff';
				}
				if(!empty($post_bg)) {
					echo '<style>.et_pb_fh_post_carousel .owl-carousel .et_pb_fh_carousel_item { background-color:'.$post_bg.' } </style>';	
				}
			}

			$fullwidth = 'et_pb_fullwidth_carousel' === $render_slug ? 'on' : 'off';

			if($data_dot_nav_custom_color = '' !== $dot_nav_custom_color) {
				echo '<style>.et_pb_fh_post_carousel .owl-carousel .owl-dots button { background-color:'.$dot_nav_custom_color.' } </style>';	
			}

			if($data_arrows_custom_color = '' !== $arrows_custom_color) {
				echo '<style>.et_pb_fh_post_carousel .owl-carousel .owl-nav button { color:'.$arrows_custom_color.' } </style>';
			}

			$video_background = $this->video_background();
			$parallax_image_background = $this->get_parallax_image_background();

			$tax_query = array();

			if(!empty($include_categories) && !empty($selected_tax)) {
				$include_categories = explode(',',$include_categories);
				$tax_query = array(
					array(
						'taxonomy' => $selected_tax,
						'field' => 'term_id',
						'terms' => $include_categories
					)
				);				
			}

			ob_start();

			// Re-used self::get_blog_posts() for builder output
			$query = self::get_blog_posts(array(
				'post_type'          => $selected_post_type,
				'posts_number'       => $posts_number,
				'tax_query'          => $tax_query,
				'orderby'            => $orderby,
				'content_source'     => $content_source,
				'use_manual_excerpt' => $use_manual_excerpt,
				'excerpt_length'     => $excerpt_length,
			), array(), array(), false );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					$slide_class = 'off' !== $show_image && in_array( $image_placement, array( 'left', 'right' ) ) && has_post_thumbnail() ? ' et_pb_fh_post_carousel_with_image' : '';
					$slide_class .= 'off' !== $show_image && ! has_post_thumbnail() ? ' et_pb_fh_post_carousel_with_no_image' : '';
					$slide_class .= " et_pb_bg_layout_{$background_layout}";
				?>
				<div class="et_pb_fh_carousel_item et_pb_media_alignment_center<?php echo esc_attr( $slide_class ); ?>" <?php if ( 'on' !== $parallax && 'off' !== $show_image && 'background' === $image_placement ) { printf( 'style="background-image:url(%1$s)"', esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ) );  } ?><?php echo et_core_esc_previously( $data_dot_nav_custom_color ); echo et_core_esc_previously( $data_arrows_custom_color ); ?>>
					<?php if ( 'on' === $parallax && 'off' !== $show_image && 'background' === $image_placement ) { ?>
						<div class="et_parallax_bg<?php if ( 'off' === $parallax_method ) { echo ' et_pb_parallax_css'; } ?>" style="background-image: url(<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>);"></div>
					<?php } ?>
					<div class="et_pb_container clearfix">
						<div class="et_pb_fh_post_carousel_container_inner">
							<?php if ( 'off' !== $show_image && has_post_thumbnail() && ! in_array( $image_placement, array( 'background', 'bottom' ) ) ) { ?>
								<div class="et_pb_fh_post_carousel_image">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
							<div class="et_pb_fh_post_carousel_description">
									<<?php echo et_pb_process_header_level( $header_level, 'h2' ) ?> class="et_pb_fh_post_carousel_title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></<?php echo et_pb_process_header_level( $header_level, 'h2' ) ?>>
									<div class="et_pb_fh_post_carousel_content <?php if ( 'on' !== $show_content_on_mobile ) { echo esc_attr( $hide_on_mobile_class ); } ?>">
										<?php
										if ( 'off' !== $show_meta ) {
											printf(
												'<p class="post-meta">%1$s | %2$s | %3$s | %4$s</p>',
												et_get_safe_localization( sprintf( __( 'by %s', 'et_builder' ), '<span class="author vcard">' .  et_pb_get_the_author_posts_link() . '</span>' ) ),
												et_get_safe_localization( sprintf( __( '%s', 'et_builder' ), '<span class="published">' . esc_html( get_the_date() ) . '</span>' ) ),
												get_the_category_list(', '),
												esc_html(
													sprintf(
														_nx(
															'%s Comment',
															'%s Comments',
															get_comments_number(),
															'number of comments',
															'et_builder'
														),
														number_format_i18n( get_comments_number() )
													)
												)
											);
										}
										?>
										<?php
											echo et_core_intentionally_unescaped( $query->posts[ $post_index ]->post_content, 'html' );
										?>
									</div>
								<?php
									// Render button
									$button_classname = array( 'et_pb_more_button' );

									echo et_core_esc_previously( $this->render_button( array(
										'button_classname' => $button_classname,
										'button_custom'    => $button_custom,
										'button_rel'       => $button_rel,
										'button_text'      => $more_text,
										'button_url'       => get_permalink(),
										'custom_icon'      => $custom_icon,
										'display_button'   => ( 'off' !== $show_more_button && '' !== $more_text ),
									) ) );
								?>
							</div> <!-- .et_pb_fh_post_carousel_description -->
							<?php if ( 'off' !== $show_image && has_post_thumbnail() && 'bottom' === $image_placement ) { ?>
								<div class="et_pb_fh_post_carousel_image">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } ?>
						</div>
					</div> <!-- .et_pb_container -->
				</div> <!-- .et_pb_fh_post_carousel -->
			<?php
				$post_index++;

				} // end while
			} // end if

			wp_reset_query();

			if ( ! $content = ob_get_clean() ) {
				$content  = '<div class="et_pb_no_results">';
				$content .= self::get_no_results_template();
				$content .= '</div>';
			}

			// Images: Add CSS Filters and Mix Blend Mode rules (if set)
			if ( array_key_exists( 'image', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image'] ) ) {
				$this->add_classname( $this->generate_css_filters(
					$render_slug,
					'child_',
					self::$data_utils->array_get( $this->advanced_fields['image']['css'], 'main', '%%order_class%%' )
				) );
			}

			// Module classnames
			$this->add_classname( array(
				'et_pb_fh_post_carousel',
				"et_pb_fh_post_carousel_image_{$image_placement}",
			) );

			if ( 'off' === $fullwidth ) {
				$this->add_classname( 'et_pb_fh_post_carousel_fullwidth_off' );
			}

			if ( 'off' === $show_arrows ) {
				$this->add_classname( 'et_pb_fh_post_carousel_no_arrows' );
			}

			if ( 'off' === $show_pagination ) {
				$this->add_classname( 'et_pb_fh_post_carousel_no_pagination' );
			}

			if ( 'on' === $parallax ) {
				$this->add_classname( 'et_pb_fh_post_carousel_parallax' );
			}

			$data_background_layout       = '';
			$data_background_layout_hover = '';
			if ( $background_layout_hover_enabled ) {
				$data_background_layout = sprintf(
					' data-background-layout="%1$s"',
					esc_attr( $background_layout )
				);
				$data_background_layout_hover = sprintf(
					' data-background-layout-hover="%1$s"',
					esc_attr( $background_layout_hover )
				);
			}

			//data-auto-width="'.$auto_width.'"

			$output = sprintf(
				'<div%3$s class="%1$s"%7$s%8$s>
					%5$s
					%4$s
					<div class="et_pb_fh_post_carousels owl-carousel" data-autoplay="'.$autoplay.'" data-autoplaytimeout="'.$autoplay_time.'" data-hoverpause="'.$autoplay_hoverpause.'" data-items="'.$carousel_items.'" data-items-tablet="'.$carousel_items_tablet.'" data-items-phone="'.$carousel_items_phone.'" data-loop="'.$loop.'" data-margin="'.$item_margin.'" data-mouse-drag="'.$mouse_drag.'" data-touch-drag="'.$touch_drag.'" data-rewind="'.$rewind.'" data-slide-by="'.$slide_by.'" data-dots-each="'.$dots_each.'" data-lazy-load="'.$lazy_load.'">
						%2$s
					</div> <!-- .et_pb_fh_post_carousels -->
					%6$s
				</div> <!-- .et_pb_fh_post_carousel -->
				',
				$this->module_classname( $render_slug ),
				$content,
				$this->module_id(),
				$video_background,
				$parallax_image_background, // #5
				$this->inner_shadow_back_compatibility( $render_slug ),
				et_core_esc_previously( $data_background_layout ),
				et_core_esc_previously( $data_background_layout_hover )
			);

			return $output;
		}

		private function inner_shadow_back_compatibility( $functions_name ) {
			$utils = ET_Core_Data_Utils::instance();
			$atts  = $this->props;
			$style = '';

			if (
				version_compare( $utils->array_get( $atts, '_builder_version', '3.0.93' ), '3.0.99', 'lt' )
			) {
				$class = self::get_module_order_class( $functions_name );
				$style = sprintf(
					'<style>%1$s</style>',
					sprintf(
						'.%1$s.et_pb_fh_post_carousel .et_pb_fh_post_carousel {'
						. '-webkit-box-shadow: none; '
						. '-moz-box-shadow: none; '
						. 'box-shadow: none; '
						.'}',
						esc_attr( $class )
					)
				);

				if ( 'off' !== $utils->array_get( $atts, 'show_inner_shadow' ) ) {
					$style .= sprintf(
						'<style>%1$s</style>',
						sprintf(
							'.%1$s > .box-shadow-overlay { '
							. '-webkit-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. '-moz-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. 'box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. '}',
							esc_attr( $class )
						)
					);
				}
			}

			return $style;
		}
	}

	new ET_Builder_Module_FH_Divi_Post_Carousel;
}