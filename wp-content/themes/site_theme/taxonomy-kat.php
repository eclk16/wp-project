<?php get_header(); ?>

<?php
$current_term = get_queried_object();
?>
<!-- Product -->
<div class="product">
    <div class="tabHeader">
        <ul class="tab">
            <?php
            $terms = get_terms( array(
                'taxonomy'       => 'bus-categories',
                'hide_empty'     => false,
                'posts_per_page' => 10,

            ) );
            ?>
            <?php foreach ( $terms as $term ): ?>
                <li<?=($term->slug == $current_term->slug) ? ' class="active" ' : null?>>
                    <a href="<?=get_term_link($term)?>" style="color: inherit; text-decoration: none;"><?= $term->name ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="proContent tab-content">
                    <div class="item">
                        <div class="title"><?= $current_term->name ?></div>
                        <?php
                        $args  = array(
                            'post_type' => 'buses',
                            'orderby' => 'menu_order',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'bus-categories',
                                    'field'    => 'name',
                                    'terms'    => $current_term
                                )
                            )
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
                            $thumb      = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                            ?>
                            <a href="<?= get_the_permalink() ?>">
                                <div class="model"><?= get_the_title() ?></div>
                                <img src="<?= $thumb ?>" alt="">
                            </a>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Product -->


<?php get_footer(); ?>
