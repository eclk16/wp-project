<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=latin-ext"
          rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/css/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>




<a href="<?=get_bloginfo('url')?>" class="logo"><img src="<?=get_field('logo','option')['url']?>" alt=""></a>