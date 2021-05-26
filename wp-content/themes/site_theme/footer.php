<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-8">
                <div class="tt-copyright">
                    <p>&copy;Poseidon Tattoo, 2021. <span>Tüm Hakları Saklıdır.</span></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-8">
                <div class="tt-social pull-right">
                <?php if(have_rows('hesaplar','option')): ?>
        <?php while(have_rows('hesaplar','option')): the_row(); ?>
        <a href="<?=get_sub_field('link')?>" target="_blank">
                        <i class="<?=get_sub_field('ikon')?>"></i>
                    </a>
        <?php endwhile; ?>
    <?php endif; ?>
                   
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="tt-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8 col-xs-8">
                        <h4 class="modal-title">Sizi Arayalım</h4>
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                    </div>
                </div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="8" title="Contact form 1"]'); ?>
            
        </div>
    </div>
</div>
<div class="modal fade" id="tt-modal-service" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a class="left carousel-control" href="#carousel-popup" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#carousel-popup" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="#" class="close pull-right" data-dismiss="modal">&times;</a>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="carousel-popup" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner" role="listbox">
                        <?php
                            $i=1;
                            $args = array('post_type' => 'hizmetler', 'orderby' => 'menu_order','posts_per_page' => -1);
                            query_posts($args);
                            if (have_posts()) : while (have_posts()) : the_post(); ?>
                             <div class="item <?php if($i==1) echo 'active'; ?>">
                                <div class="col-md-4 col-sm-4 col-xs-8">
                                    <div class="collage">
                                        <img src="<?=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) )?>"
                                            alt="Image 1" title="Image 1" class="img-1" />
                                    </div>
                                   
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-8">
                                    <div class="text">
                                        <h2><?=get_the_title()?></h2>
                                        <p><?=get_the_content()?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                               
                               
                            </div>


                            <?php
                            $i++;
                            endwhile; else : endif; wp_reset_query();
                            ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="<?=get_bloginfo('template_url')?>/assets/js/jquery.min.js"></script>
<!-- Google maps -->
</script>
<!-- Twitter Bootstrap JS file -->
<script src="<?=get_bloginfo('template_url')?>/assets/js/bootstrap.min.js"></script>
<!-- jQuery plugins -->
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.mousewheel.min.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.swipe.min.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.fullpage.min.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.jscrollpane.min.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.lightgallery.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/jquery.maskedinput.min.js"></script>
<!-- LightGallery extension -->
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.fullscreen.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.thumbnail.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.zoom.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.hash.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.share.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/plugins/lightgallery.autoplay.js"></script>
<script src="<?=get_bloginfo('template_url')?>/assets/js/override.js"></script>
<?php wp_footer(); ?>
</body>

</html>