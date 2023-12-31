<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_64bfcfb94a071',
	'title' => 'Block:services',
	'fields' => array(
		array(
			'key' => 'field_64bfcfb97d009',
			'label' => 'Заголовок',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'acfe_seamless_style' => 0,
			'acfe_group_modal' => 0,
			'acfe_field_group_condition' => 0,
			'acfe_group_modal_close' => 0,
			'acfe_group_modal_button' => '',
			'acfe_group_modal_size' => 'large',
			'sub_fields' => array(
				array(
					'key' => 'field_64bfcfb9b9ae0',
					'label' => 'Текст',
					'name' => 'text',
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
					'key' => 'field_64bfcfb9bd4a2',
					'label' => 'Тип',
					'name' => 'type',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '30',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
					),
					'default_value' => false,
					'return_format' => 'value',
					'multiple' => 0,
					'max' => '',
					'prepend' => '',
					'append' => '',
					'allow_null' => 0,
					'ui' => 0,
					'acfe_field_group_condition' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'allow_custom' => 0,
					'search_placeholder' => '',
					'min' => '',
				),
			),
		),
		array(
			'key' => 'field_64bfcfcca4880',
			'label' => 'Услуги',
			'name' => 'services',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 0,
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Добавить услугу',
			'acfe_field_group_condition' => 0,
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_64bfcfffa4882',
					'label' => '(Column 5/12)',
					'name' => '',
					'aria-label' => '',
					'type' => 'acfe_column',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'columns' => '5/12',
					'endpoint' => 0,
					'border' => '',
					'acfe_field_group_condition' => 0,
					'border_endpoint' => array(
						0 => 'endpoint',
					),
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfcfeba4881',
					'label' => 'Заголовок',
					'name' => 'label',
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
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfd030a4884',
					'label' => 'Кнопка "Подробнее"',
					'name' => 'is_link',
					'aria-label' => '',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui_on_text' => '',
					'ui_off_text' => '',
					'ui' => 1,
					'style' => '',
					'acfe_field_group_condition' => 0,
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfd053a4885',
					'label' => 'Ссылка кнопки',
					'name' => 'link',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_64bfd030a4884',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
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
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfd116a4887',
					'label' => 'Изображение услуги',
					'name' => 'img',
					'aria-label' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'uploader' => '',
					'acfe_thumbnail' => 0,
					'return_format' => 'id',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'preview_size' => 'medium',
					'acfe_field_group_condition' => 0,
					'library' => 'all',
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfd028a4883',
					'label' => '(Column 7/12)',
					'name' => '',
					'aria-label' => '',
					'type' => 'acfe_column',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'columns' => '7/12',
					'endpoint' => 0,
					'border' => '',
					'acfe_field_group_condition' => 0,
					'border_endpoint' => array(
						0 => 'endpoint',
					),
					'parent_repeater' => 'field_64bfcfcca4880',
				),
				array(
					'key' => 'field_64bfd079a4886',
					'label' => 'Описание услуги',
					'name' => 'desc',
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
					'acfe_wysiwyg_height' => 300,
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
					'parent_repeater' => 'field_64bfcfcca4880',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1691743762,
));

endif;