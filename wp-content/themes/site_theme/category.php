<?php get_header(); ?>


    <!-- Page Banner -->
    <section class="page-title">
        <div class="container">
            <div class="title">
                <div>
                    <h2>BLOG</h2>
                    <p>son eklenenler</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->

    <div class="container head-container">
        <!-- Tab-link -->
        <ul class="tab-link">
            <?php
                $data = get_terms('category');
                foreach ($data as $item):
                ?>
                <li><a href="<?php echo get_category_link($item) ?>"><?php echo $item->name?></a></li>
                <?php
                endforeach;
            ?>
        </ul>
        <!-- Tab-link -->

        <!-- Navigation -->
        <div class="navigation">
            <?php
            bcn_display();
            ?>
        </div>
        <!-- Navigation End -->
    </div>


    <section class="blog blog-page">

        <div class="container">
            <div class="row">
                <?php if(have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-4" id="<?php echo get_the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>" class="item">
                            <picture>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            </picture>
                            <h4><?php the_title(); ?></h4>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php else: echo "Bu kategori için yazı girişi yapılmamış."; ?>
                <?php endif; ?>

            </div>
            <a href="" class="all-button mt40 hover01">DAHA FAZLA YÜKLE</a>
        </div>
    </section>

<?php get_footer(); ?>