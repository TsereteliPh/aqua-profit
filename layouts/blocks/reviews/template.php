<section class="reviews">
	<div class="container">

	<?php get_template_part('/layouts/partials/title', null, array(
		'class' => 'reviews__title',
		'title' => get_sub_field('title')
	)); ?>

        <ul class="reset-list reviews__list js-show-more-container">
            <?php
                $args = [
                    'post_type' => 'review',
                    'orderby' => 'post_date',
                    'posts_per_page' => '10',
                    'paged' => 1
                ];
				$iteration = 0;

                $query = new WP_Query($args);
                $posts = $query->posts;

                if ( $query->have_posts() ) {
                    if (is_archive()) {
                        foreach ($posts as $post) {
                            get_template_part('layouts/partials/cards/review', null, array(
                                'class' => 'reviews__item'
                            ));

							$iteration++;
                        }
                    } else {
                        while ( $query->have_posts() ) {
                            $query->the_post();

                            get_template_part('layouts/partials/cards/review', null, array(
                                'class' => 'reviews__item'
                            ));

							$iteration++;
                        }

                        wp_reset_postdata();
                    }
                }
            ?>
        </ul>

        <?php if ( $query->max_num_pages > 1 ) : ?>
            <button class="btn-show-more reviews__button js-show-more" type="button" data-text="Показать еще проекты">Показать еще проекты</button>

            <script>
                let posts = '<?php echo json_encode($query->query_vars); ?>';
                let current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                let max_pages = <?php echo $query->max_num_pages; ?>;
            </script>
        <?php endif; ?>
	</div>
</section>
