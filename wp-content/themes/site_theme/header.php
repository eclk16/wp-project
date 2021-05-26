<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="telephone=no" name="format-detection">
    <title>
        <?php
        global $page, $paged;
        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'tmgrup'), max($paged, $page));
        ?>
    </title>
    <link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/assets/css/override.css" />
    <link rel="shortcut icon" type="image/png" href="<?=get_bloginfo('template_url')?>/assets/favicon.png" />
    <?php wp_head(); ?>
</head>

<body >
    <div class="tt-splash">
        <a href="<?=get_bloginfo('url')?>" class="logo"><img src="<?=get_field('footer_logo','option')['url']?>" alt=""></a>
    </div>
    <header class="navbar-fixed-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <div class="tt-drawer pull-left">
                        <a href="#" class="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="tt-phone hidden-xs hidden-sm">
                        <p><i class="fa fa-phone"></i><?=get_field('telefon','option')[0]['telefon']?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="tt-logo" data-menuanchor="home">TATTOO
                        <a href="<?=get_bloginfo('url')?>" class="logo"><img style="height:100px" 
                                src="<?=get_field('logo','option')['url']?>" alt=""></a>POSEİDON
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2 hidden-xs hidden-sm">
                    <div class="tt-booking text-right">
                        <a href="#" data-toggle="modal" data-target="#tt-modal">Sizi Arayalım</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <aside class="closed">
        <div class="tt-phone visible-xs visible-sm">
            <p><i class="fa fa-phone"></i><?=get_field('telefon','option')[0]['telefon']?></p>
        </div>
        <div class="tt-booking visible-xs visible-sm">
            <a href="#" data-toggle="modal" data-target="#tt-modal">Sizi Arayalım</a>
        </div>
        <ul>
            <li data-menuanchor="home" class="active">
                <a href="#home">Ana Sayfa</a>
            </li>
            <li data-menuanchor="services">
                <a href="#services">Hizmetlerimiz</a>
            </li>
            <li data-menuanchor="gallery">
                <a href="#gallery">Galeri</a>
            </li>
            <li data-menuanchor="contacts">
                <a href="#contacts">İletişim</a>
            </li>
        </ul>
    </aside>