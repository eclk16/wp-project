<?php get_header(); ?>

    <!-- Slider -->
    <section class="slider v2 max1390 mt40">
        <ul class="control v2 max1390">
            <li class="left"><img src="images/icons/ArrowS.svg" alt=""></li>
            <li class="right"><img src="images/icons/ArrowS.svg" alt=""></li>
        </ul>
        <div class="loop">
        <?php
            $args = array('post_type' => 'urun-slider', 'orderby' => 'menu_order');
            query_posts($args);
            $count = 0;
            if (have_posts()) : while (have_posts()) : the_post();
                $desktop 		= get_field('desktop');
                $mobil			= get_field('mobil');
        ?>
            <div class="item">
                <img class="desktop" src="<?=$desktop?>" alt="">
                <img class="mobil" src="<?=$mobil?>" alt="">
            </div>
        <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </section>
    <!-- /Slider -->

    <!-- Product -->
    <main>
        <div class="productList bgWhite pt70 pb100">
            <div class="title pb70">
                <h6>ÜRÜNLER</h6>
                <h2>Üretimini yaptığımız özel koleksiyonlarımız</h2>
            </div>
            <ul class="tabFiltre tab">
                <?php
                $terms = get_terms( array(
                    'taxonomy'       => 'urun-kategori',
                    'hide_empty'     => false,
                    'posts_per_page' => 10,
                ) );
                ?>
                <?php foreach ( $terms as $term ): ?>
                    <li data-filter=".<?= $term->slug ?>">
                        <?= $term->name ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="proSlider v2">
                <div class="loop tab-content">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post();
                            $title      = get_the_title();
                            $idd        = get_the_ID();
                            $thumb      = wp_get_attachment_url( get_post_thumbnail_id($idd) );
                            $kod        = get_field('urun_kodu');
                            $ter        = wp_get_post_terms($idd,'urun-kategori');
                            ?>
                            <a href="#" class="item x4 <?php foreach($ter as $tax): echo $tax->slug.' '; endforeach; ?>">
                                <img class="head" src="images/slider/title.png" alt="">
                                <img class="pro" src="<?=$thumb?>" alt="">
                                <div class="name">
                                    <h4><?=$title?></h4>
                                    <div class="number"><?=$kod?></div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </main>
    <!-- /Product -->

<?php get_footer(); ?>