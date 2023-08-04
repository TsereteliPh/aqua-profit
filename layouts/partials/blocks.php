<?php
$id = $args['id'] ?? false;
if (have_rows('blocks', $id)) {
	$counters = array();
	while (have_rows('blocks', $id)) {
		the_row();
		$layout = get_row_layout();
		if (!isset($counters[$layout])) {
			// initialize counter
			$counters[$layout] = 1;
		} else {
			// increase existing counter
			$counters[$layout]++;
		}

		if (get_row_layout() == 'about') get_template_part('layouts/blocks/about/template');
		else if (get_row_layout() == 'advantages') get_template_part('layouts/blocks/advantages/template');
		else if (get_row_layout() == 'calculator') get_template_part('layouts/blocks/calculator/template');
		else if (get_row_layout() == 'contacts') get_template_part('layouts/blocks/contacts/template');
		else if (get_row_layout() == 'faq') get_template_part('layouts/blocks/faq/template');
		else if (get_row_layout() == 'map') get_template_part('layouts/blocks/map/template');
		else if (get_row_layout() == 'question') get_template_part('layouts/blocks/question/template');
		else if (get_row_layout() == 'reviews-slider') get_template_part('layouts/blocks/reviews-slider/template');
		else if (get_row_layout() == 'reviews') get_template_part('layouts/blocks/reviews/template');
		else if (get_row_layout() == 'services') get_template_part('layouts/blocks/services/template');
		else if (get_row_layout() == 'services-links') get_template_part('layouts/blocks/services-links/template');
		else if (get_row_layout() == 'stages') get_template_part('layouts/blocks/stages/template');
		else if (get_row_layout() == 'text') get_template_part('layouts/blocks/text/template');
		else if (get_row_layout() == 'works') get_template_part('layouts/blocks/works/template');
		else if (get_row_layout() == 'works-slider') get_template_part('layouts/blocks/works-slider/template');
	}
}
