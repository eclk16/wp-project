<?php
    get_header(); 
?>
     
    <!-- Search -->
    <div class="container">
      <div class="product-single">
        <div class="row">
          <div class="col-md-12">
              <?php 
                $s = get_search_query(); 
                $args = array('s' => $s);
                $the_query = new WP_Query($args);
                if($the_query->have_posts()){
                    echo '
                      <h1>Results</h1>
                      <hr>
                      <ul style="list-style: circle; font-size: 16px; padding-left: 20px">';
                    while($the_query->have_posts()){
                        $the_query->the_post();
                        ?>
                        <li style="padding: 5px 0;"><a href="<?php the_permalink(); ?>" style="color: #333"><?php the_title(); ?></a></li>
                        <?php
                    }
                    echo '</ul>';
                }else {
                    echo '
                      <br>
                      <h1 class="text-center">There is no anything!</h1> <br> <br>                          
                      ';
                }
            ?>
          </div>
        </div>
      </div>
    </div>
    <br><br>

       
    <!-- /Search -->
    
 
<?php get_footer(); ?>