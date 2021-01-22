<?php
/* Template Name: 06 - İletişim */
get_header();
?>

<!-- Map -->
<section class="map">
    <?=get_field('harita_embed','option')?>
</section>


<!-- Contact -->
<section class="contact">
    <div class="container mt100 mb75">
        <div class="row">
            <div class="col-md-7" data-aos="fade-right" data-aos-duration="1000">
                <div class="contact-inner">
                    <h3><?=__('Bizimle İletişime Geçin','valorem')?></h3>

                    <?php if(ICL_LANGUAGE_CODE == 'tr'): ?>
                    <?=do_shortcode('[contact-form-7 id="5" title="İletişim formu 1" html_id="formfield"]')?>
                    <?php else: ?>
                    <?=do_shortcode('[contact-form-7 id="340" title="Contact form ingilizce"]')?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-5" data-aos="fade-left" data-aos-duration="1000">
                <div class="contact-info" style="background:url(<?=get_field('iletisim_arkaplani')['url']?>) no-repeat;">
                    <h4><?=__('İletişim','valorem')?></h4>
                    <p><?=get_field('adres','option')?></p>

                    <?php if(have_rows('telefon','option')): while(have_rows('telefon','option')): the_row();?>
                        <a href="tel:<?=get_sub_field('telefon')?>"><?=get_sub_field('telefon')?></a> <br>
                    <?php endwhile; endif; ?>
                    <?php if(have_rows('e-mail','option')): while(have_rows('e-mail','option')): the_row();?>
                        <a href="mailto:<?=get_sub_field('e-mail')?>"><?=get_sub_field('e-mail')?></a> <br>
                    <?php endwhile; endif; ?>

                    <?php if(have_rows('hesaplar','option')): ?>
                        <ul class="social-media">
                            <?php while(have_rows('hesaplar','option')): the_row(); ?>
                                <li><a href="<?=get_sub_field('link')?>"><i class="<?=get_sub_field('ikon')?>"></i></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
