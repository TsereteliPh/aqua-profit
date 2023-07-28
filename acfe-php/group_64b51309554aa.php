<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_64b51309554aa',
	'title' => 'Первый экран',
	'fields' => array(
		array(
			'key' => 'field_64b5130a0d961',
			'label' => 'Первый экран',
			'name' => 'welcome',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => 'В блоке присутствует заголовок h1. Не рекомендуется добавлять его в следующих блоках.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'acfe_seamless_style' => 0,
			'acfe_group_modal' => 0,
			'acfe_field_group_condition' => 0,
			'sub_fields' => array(
				array(
					'key' => 'field_64b513360d962',
					'label' => 'Заголовок',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'acfe_field_group_condition' => 0,
				),
				array(
					'key' => 'field_64b513c20d963',
					'label' => 'Текст',
					'name' => 'text',
					'aria-label' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_wysiwyg_height' => 200,
					'acfe_wysiwyg_max_height' => '',
					'acfe_wysiwyg_valid_elements' => '',
					'acfe_wysiwyg_custom_style' => '',
					'acfe_wysiwyg_disable_wp_style' => 0,
					'acfe_wysiwyg_autoresize' => 0,
					'acfe_wysiwyg_disable_resize' => 0,
					'acfe_wysiwyg_remove_path' => 0,
					'acfe_wysiwyg_menubar' => 0,
					'acfe_wysiwyg_transparent' => 0,
					'acfe_wysiwyg_merge_toolbar' => 0,
					'acfe_wysiwyg_custom_toolbar' => 0,
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
					'acfe_field_group_condition' => 0,
					'acfe_wysiwyg_auto_init' => 0,
					'acfe_wysiwyg_min_height' => 300,
					'acfe_wysiwyg_toolbar_buttons' => array(
					),
				),
			),
			'acfe_group_modal_close' => 0,
			'acfe_group_modal_button' => '',
			'acfe_group_modal_size' => 'large',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1689779247,
));

endif;