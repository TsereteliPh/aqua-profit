<section class="works">
	<div class="container">

	<?php get_template_part('/layouts/partials/title', null, array(
            'class' => 'works__caption',
            'title' => get_sub_field('title')
        )); ?>

        <ul class="reset-list works__list js-show-more-container">
            <?php
                $args = [
                    'post_type' => 'project',
                    'orderby' => 'post_date',
                    'posts_per_page' => '4',
                    'paged' => 1
                ];
				$iteration = 0;

                $query = new WP_Query($args);
                $posts = $query->posts;

                if ( $query->have_posts() ) {
                    if (is_archive()) {
                        foreach ($posts as $post) {
                            get_template_part('layouts/partials/cards/project', null, array(
                                'class' => 'works__item',
								'iteration' => $iteration
                            ));

							$iteration++;
                        }
                    } else {
                        while ( $query->have_posts() ) {
                            $query->the_post();

                            get_template_part('layouts/partials/cards/project', null, array(
                                'class' => 'works__item',
								'iteration' => $iteration
                            ));

							$iteration++;
                        }

                        wp_reset_postdata();
                    }
                }
            ?>
        </ul>

        <?php if ( $query->max_num_pages > 1 ) : ?>
            <button class="btn-show-more works__button js-show-more" type="button" data-text="Показать еще">Показать еще проекты</button>

            <script>
                let posts = '<?php echo json_encode($query->query_vars); ?>';
                let current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                let max_pages = <?php echo $query->max_num_pages; ?>;
            </script>
        <?php endif; ?>
	</div>
</section>
