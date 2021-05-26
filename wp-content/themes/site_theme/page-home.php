<?php
	/* Template Name: 01 - Anasayfa */
	get_header();
?>


<nav class="hidden-xs hidden-sm">
	<ul id="tt-menu">
		<li data-menuanchor="home" class="active">
			<a href="#home"></a>
		</li>
		<li data-menuanchor="services">
			<a href="#services"></a>
		</li>
		<li data-menuanchor="team">
			<a href="#team"></a>
		</li>
		<li data-menuanchor="prices">
			<a href="#prices"></a>
		</li>
		<li data-menuanchor="gallery">
			<a href="#gallery"></a>
		</li>
		<li data-menuanchor="reviews">
			<a href="#reviews"></a>
		</li>
		<li data-menuanchor="contacts">
			<a href="#contacts"></a>
		</li>
	</ul>
</nav>
<div id="fullpage">
	<div class="tt-section home">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 col-xs-8">
					<h1>Tatoo <br > Poseidon</h1>
					
					<span>Hoşgeldiniz</span>
				</div>
				<div class="col-md-4 col-md-offset-2 col-xs-8">
					<div id="carousel-home-screen" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								
							</div>
						</div>
						<ol class="carousel-indicators">
							<li data-target="#carousel-home-screen" data-slide-to="0" class="active"></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-section services">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 col-xs-8">
					<div class="tt-breadcrumbs">
						<p>Hizmetlerimiz</p>
					</div>
				</div>
				<div class="clearfix"></div>
				<div id="carousel-service-screen" class="carousel slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
					<?php
					$i=1;
					$args = array('post_type' => 'hizmetler', 'orderby' => 'menu_order','posts_per_page' => -1);
					query_posts($args);
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="item <?php if($i==1) echo 'active'; ?> col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-8">
						<div class="tt-number">
							<span>0<?=$i?></span>
						</div>
						<a href="#" data-slide="0" data-toggle="modal" data-target="#tt-modal-service">
							<span><?=get_the_title()?></span>
							<img src="<?=wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) )?>"
								alt="Tattoos" title="Tattoos" class="pull-right" />
						</a>
					</div>
					<?php
					$i++;
					endwhile; else : endif; wp_reset_query();
					?>
						
					</div>
					<ol class="carousel-indicators visible-xs">
					<?php
					$i=1;
					$args = array('post_type' => 'hizmetler', 'orderby' => 'menu_order','posts_per_page' => -1);
					query_posts($args);
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li data-target="#carousel-service-screen" data-slide-to="0" class="<?php if($i==1) echo 'active'; ?>"></li>
					<?php
					$i++;
					endwhile; else : endif; wp_reset_query();
					?>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-section gallery">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 cpl-xs-8">
					<div class="tt-breadcrumbs">
						<p>Galeri</p>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-6 col-md-offset-1 col-md-8 col-xs-8 tt-scrollpane">
					<div id="captions" class="js-gallery">
					<?php 
						$images = get_field('galeri',60);
						$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
						if( $images ): 
						?>
								<?php foreach( $images as $image_id ): ?>
									<a class="col-md-2" href="<?=$image_id['url']?>">
										<img src="<?=$image_id['url']?>" style="height:100%">
										<div class="overlay hidden-xs hidden-sm">
											<i class="fa fa-search"></i>
										</div>
									</a>
								<?php endforeach; ?>
						<?php endif; ?>
						

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-section contacts">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-2 col-xs-8">
					<div class="tt-info">
						<p><i class="fa fa-map-marker"></i><?=get_field('adres','option')?></p>
						<p><i class="fa fa-envelope-open"></i><?=get_field('e-mail','option')[0]['e-mail']?></p>
						<p><i class="fa fa-phone"></i><?=get_field('telefon','option')[0]['telefon']?></p>
					</div>
				</div>
			</div>
		</div>
		<div id="map">
		<?=get_field('harita_embed','option')?>
		</div>
	</div>
</div>

<?php get_footer(); ?>