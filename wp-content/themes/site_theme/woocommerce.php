<?php get_header(); ?>

<?php
    $current_term = get_queried_object();
    if ( have_posts() ) :
        if(isset($current_term) && $current_term->slug == 'kampanyalar'):
            require 'kampanyalar.php';
        else:

?>
    <?php if(!is_single() && is_product_category()): ?>
    <section class="pageBanner">
            <?php if(!empty(get_field('banner','product_cat_'.$current_term->term_id)) && get_field('banner','product_cat_'.$current_term->term_id)['url'] != ''): ?>
                <img src="<?=get_field('banner','product_cat_'.$current_term->term_id)['url']?>" alt="">
            <?php else: ?>
                <div class="null"></div>
            <?php endif; ?>

        <h2><?=$current_term->name?></h2>
    </section>
    <?php endif; ?>

    <!-- Main -->
    <main <?=is_single() ? ' style="background: #fff"' : null?>>
        <div class="navigation wooNavigation mb0">
            <div class="container d-flex justify-content-center">
                <div>
                    <?php bcn_display();?>
                </div>
            </div>
        </div>
        <?php if(!is_single()): ?>
        <button class="filter-btn">  
            <picture>
            <img src="<?=get_bloginfo('template_url')?>/images/icons/filter.svg" alt="">
            </picture>
        </button>
        <?php endif; ?>
        <div class="container pt35 pb35">
            <div class="row">
                <?php if(!is_single()): ?>
                <div class="col-lg-0">
                    
                    <div class="woo-categori">
                        <div class="title">
                            <h4 class="mb0">FİLTRE</h4>
                            <div class="close-btn">
                                <img src="<?=get_bloginfo('template_url')?>/images/icons/close.svg" alt="">
                            </div>
                        </div>
                        <?php if(get_field('filtre_shortcode',$current_term) != ''): ?>
                            <?=do_shortcode(get_field('filtre_shortcode',$current_term))?>
                        <?php else: ?>
                            <?=do_shortcode('[searchandfilter id="wpf_5ee3c6741d877"]')?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <!-- <?=!is_single() ? '9' : '12'?> -->
                <div class="col-lg-12"> 
                    <?php woocommerce_content(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(!is_single() && is_product_category()): ?>
                        <?php if(get_field('yonlendirme','product_cat_'.$current_term->term_id) != ''): ?>
                            <a href="<?=get_field('yonlendirme','product_cat_'.$current_term->term_id)?>" class="text-center showall">Tümünü Göster</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>


    </main>
    <?php endif; endif;?>

<?php get_footer(); ?>

<?php if(is_single()): ?>
    <script>
        $(function(){
           var minimum = $('.woocommerce-product-details__short-description').text();
           if(minimum != ''){
               var split = minimum.split(': ');
               if(split[1] != ''){
                   var value = split[1].trim();
                   $('input.qty').attr('min',value).attr('value',value);
               }
           }

           $('.variations select').on('change',function(){
               $('input.qty').attr('min',value).attr('value',value);
           });
        });
    </script>
<?php endif; ?>
