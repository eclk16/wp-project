<?php
	ob_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



    function theme_setup(){

        // Thumbnail Support
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'woocommerce' );


        // Register Theme Menu
        register_nav_menus( array(
            'menu1' 		=> 'Menu 1',
            'footer_menu_1'  => 'Footer Menu 1',
            'footer_menu_2'  => 'Footer Menu 2',
        ));


        if( function_exists('acf_add_options_page') ) {
            acf_add_options_page(array(
                'page_title' 	=> 'Site Ayarları',
                'menu_title'	=> 'Site Ayarları',
                'menu_slug' 	=> 'site-options',
                'capability'	=> 'edit_posts',
                'redirect'		=> false ));
        }

        if( function_exists('acf_add_options_page') ) {
            acf_add_options_page(array(
                'page_title' 	=> 'Yönetici Ayarları',
                'menu_title'	=> 'Yönetici Ayarları',
                'menu_slug' 	=> 'admin-options',
                'capability'	=> 'edit_posts',
                'redirect'		=> false ));
        }

        // FILTERS

        // Mime tiplerini ekle
        add_filter('upload_mimes', 'cc_mime_types');

        // Mail content tipini ayarla
        add_filter( 'wp_mail_content_type','set_mail_content_type' );

        // TR Karakter filter
        add_filter('wp_handle_upload_prefilter', 'dosya_tr_karakter_degistir' );

        // Görsellerden width - height attributelarını kaldır
        add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
        add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

        // WPCF7 span etiketlerini kaldır
        add_filter('wpcf7_form_elements','remove_wpcf7_span_elements');

        // ACTIONS
        add_action('admin_menu', 'remove_admin_menu_items');
        add_action( 'wp_enqueue_scripts', 'akademikro_enqueue_scripts_styles');






    }

    if(have_rows('ozel_icerikler','option')):
        while(have_rows('ozel_icerikler','option')): the_row();
             post_type_yukle(array(
                'icerik_ikon' => get_sub_field('icerik_ikon'),
                'icerik_cogul' => get_sub_field('icerik_cogul'),
                'icerik_tekil' => get_sub_field('icerik_tekil'),
                'icerik_cogul_slug' => get_sub_field('icerik_cogul_slug'),
            ));
        endwhile;
    endif;

    function post_type_yukle($array){
        $labels = array(
            'name' => __($array['icerik_cogul'], $array['icerik_cogul'], 'tmgrup'),
            'singular_name' => __($array['icerik_cogul'], $array['icerik_cogul'], 'tmgrup'),
            'add_new' => __('Yeni Ekle', 'Yeni '.$array['icerik_tekil'].' Ekle', 'tmgrup'),
            'add_new_item' => __('Yeni '.$array['icerik_tekil'].' Ekle', 'tmgrup'),
            'edit_item' => __($array['icerik_tekil'].' Düzenle', 'tmgrup'),
            'new_item' => __('Yeni '.$array['icerik_tekil'].' Ekle', 'tmgrup'),
            'view_item' => __(''.$array['icerik_tekil'].' Görüntüle', 'tmgrup'),
            'search_items' => __(''.$array['icerik_tekil'].' Ara', 'tmgrup'),
            'not_found' =>  __('Bulunamadı.', 'tmgrup'),
            'not_found_in_trash' => __('Çöpte Bulunamadı', 'tmgrup'),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 20,
            'menu_icon'	=> $array['icerik_ikon'],
            'supports' => array('title','editor','thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug' => '', 'with_front' => false)
        );

        register_post_type( $array['icerik_cogul_slug'] , $args);
    }







add_action( 'after_setup_theme', 'theme_setup',9100);

    //---------------------------------------------------------------------------------
    // Add mime types
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    //---------------------------------------------------------------------------------
    // Admin Menü Itemleri Temizle
    function remove_admin_menu_items() {
        $remove_menu_items = array(__('Comments'),__('Tools'),__('Users'),__('Posts'));
        global $menu;
        end ($menu);
        while (prev($menu)){
            $item = explode(' ',$menu[key($menu)][0]);
            if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
            unset($menu[key($menu)]);}
        }
    }

    //---------------------------------------------------------------------------------
    // Görsellerden width-height attributelarını temizle
    function remove_width_attribute( $html ) {
        $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
        return $html;
    }

    //---------------------------------------------------------------------------------
    // Mail content tipini html olarak ayarla
	function set_mail_content_type(){
	    return "text/html";
	}

    //---------------------------------------------------------------------------------
    // WPCF7 span etiketlerini kaldır
	function remove_wpcf7_span_elements($content){
        $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
        return $content;
    }

    //---------------------------------------------------------------------------------
    // UPLOAD TR Karakter Replace
    function dosya_tr_karakter_degistir( $file )
    {
        $bul 	 = array('İ','Ü','Ğ','Ö','Ç','Ş','ş','ç','ö','ğ','ü','ı',' ','ö','ç');
        $degistir = array('I','U','G','O','C','S','s','c','o','g','u','i','_','o','c');
        $file['name'] = str_replace($bul,$degistir,$file['name']);

        return $file;
    }

    //---------------------------------------------------------------------------------
    // Enqueue CSS and JS Scripts
    function akademikro_enqueue_scripts_styles(){

        gereksiz_temizle();

        // wp_enqueue_style( 'main', get_template_directory_uri()."/css/main.css", null, '1.0', false );
        // wp_enqueue_style( 'swiper', get_template_directory_uri()."/css/swiper.min.css", null, '1.0', false );

        // wp_enqueue_script( 'swiper', get_template_directory_uri()."/js/swiper.min.js", null, '1.0', true );
        // wp_enqueue_script( 'trianglify', get_template_directory_uri()."/js/trianglify.min.js", null, '1.0', true );
    }

    //---------------------------------------------------------------------------------
    // Remove Gereksiz Things :)
    function gereksiz_temizle(){
        // Remove WP EMOJI
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );

        // Wp generator
        remove_action('wp_head', 'wp_generator');
        // RPC RDS lnk
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        // Winmanifesst
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'shortlink');

    }

    //---------------------------------------------------------------------------------
    // Sayfalama
    function sayfalama($pages = '', $range = 2){
         $showitems = ($range * 2)+1;
         global $paged;
         if(empty($paged)) $paged = 1;

         if($pages == '')
         {
             global $wp_query;
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
         }

         if(1 != $pages)
         {
             if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
             if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

             for ($i=1; $i <= $pages; $i++)
             {
                 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                 {
                     echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
                 }
             }

             if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
             if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         }
    }

    //---------------------------------------------------------------------------------
    // Unstyle
    function unstyle( $style ){
        wp_dequeue_style( $style );
        wp_deregister_style( $style );
    }


    /* QUERY EXAMPLE
     * <?php
        $args = array('post_type' => 'slider', 'orderby' => 'menu_order','posts_per_page' => -1);
        query_posts($args);
        if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        endwhile; else : endif; wp_reset_query();
     */

    /* GET THUMBNAIL
     wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
     */

     /* * LANGUAGE CALL VARIABLE
    $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
    <?php if(ICL_LANGUAGE_CODE == 'tr'): ?>
    <li><a href="<?=$languages['en']['url']?>"><?=$languages['en']['native_name']?></a></li>
    <?php endif; ?>
    <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
    <li><a href="<?=$languages['tr']['url']?>"><?=$languages['tr']['native_name']?></a></li>
    <?php endif; ?> 
    */

    /* SOCIAL MEDIA LOOP
    <?php if(have_rows('hesaplar','option')): ?>
    <ul class="socialMedia">
        <?php while(have_rows('hesaplar','option')): the_row(); ?>
        <li><a href="<?=get_sub_field('link')?>"><i class="<?=get_sub_field('ikon')?>"></i></a></li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
    */