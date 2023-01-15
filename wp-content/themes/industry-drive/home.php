<?php
/**
 * The template for displaying home pages
 * Template Name: Home
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package global_step
 */

get_header();
?>

  <!-- /.main start  -->
    <main class="main">  
    <!-- ============================
        START BANNER SECTION
    ============================== -->
    <?php 
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category_name'=>'featured',
  
    );
    $loop = new wp_Query($args);

    while($loop->have_posts()) : $loop->the_post(); 
    $exclude[] = $post->ID; 
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );        
     ?>
    <section class="featured_banner_area" style="background-image: url('<?php echo $url; ?>');">
        <div class="featued_area id_grid_container">

            <?php
            $cat = get_the_category( $post->ID );
            $posttags = get_the_tags();
            foreach($cat as $cd){
                foreach($posttags as $tag) {
                echo "<h3>$cd->cat_name | $tag->name</h3>";
                }
            }
                ?>
            
            <h1><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></h1>
            <p><span><a href=""><?php echo reading_time(); ?> read |</a></span><span><a href="<?php echo the_permalink(); ?>"> Read more <i class="fa fa-long-arrow-right"></i></a></span></p>

        </div>
    </section>
    <?php
        endwhile;
        wp_reset_query();
    ?>
    <!-- ============================
        END BANNER SECTION
    ============================== -->

    <!-- ============================
        START FEATURED SECTION
    ============================== -->
  

    <section class="id_featured_area">
        <div class="id_grid_container id_feature_container">
        <div class="id_row">
                <?php 
                    
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category_name'=>'featured',
                        'post__not_in'  =>  $exclude,
                        //'tag__in' => array(9),
                    );
                    $loop = new wp_Query($args);

                ?>
                <?php 
                
                  $count = 1;
                  while($loop->have_posts()) : $loop->the_post(); 
                  $exclude_featured[] = $post->ID; 
                ?>
                <div class="item_<?php echo $count;?> id_featured_body">
                    <?php
                 
                    $featured_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );  ?>
                    <img src="<?php echo $featured_url; ?>">
                    <div class="id_featured_content">
                    <?php
                        $cat = get_the_category( $post->ID );
                        $posttags = get_the_tags();
                        foreach($cat as $cd){
                            foreach($posttags as $tag) {
                            echo "<h3 class='cat_name_$count'>$cd->cat_name | $tag->name</h3>";
                            }
                        }
                        ?>
                        <h1 class="title_<?php echo $count; ?>"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></h1>
                        <p class="subtitle_<?php echo $count; ?>"><span><a href=""><?php echo reading_time(); ?> read |</a></span><span><a href="<?php echo the_permalink(); ?>"> Read more <i class="fa fa-long-arrow-right"></i></a></span></p>
                    </div>
                  
                </div>
                <?php 
                    $count++;
                    endwhile;?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>

    <!-- ============================
        END FEATURED SECTION
    ============================== -->

      <!-- ============================
        START TRENDING SECTION
    ============================== -->
    <section class="id_featured_area id_trending_area">
      
        <div class="id_grid_container id_trending_container">
        <h1 class="section_title">Trending Now</h1>  
            <div class="id_row">
                <?php 
                    
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category_name'=>'trending',
                        'post__not_in'  =>  $exclude_featured,
                        //'tag__in' => array(9),
                    );
                    $loop = new wp_Query($args);

                ?>
                <?php 
                
                  $count = 1;
                  while($loop->have_posts()) : $loop->the_post(); 
                  $exclude_trending[] = $post->ID; 
                ?>
                <div class="item_<?php echo $count;?> id_featured_body">
                    <?php
                 
                    $featured_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );  ?>
                    <img src="<?php echo $featured_url; ?>">
                    <div class="id_featured_content">
                    <?php
                        $cat = get_the_category( $post->ID );
                        $posttags = get_the_tags();
                        foreach($cat as $cd){
                            foreach($posttags as $tag) {
                            echo "<h3 class='cat_name_$count'>$cd->cat_name | $tag->name</h3>";
                            }
                        }
                        ?>
                        <h1 class="title_<?php echo $count; ?>"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></h1>
                        <p class="subtitle_<?php echo $count; ?>"><span><a href=""><?php echo reading_time(); ?> read |</a></span><span><a href="<?php echo the_permalink(); ?>"> Read more <i class="fa fa-long-arrow-right"></i></a></span></p>
                    </div>
                  
                </div>
                <?php 
                    $count++;
                    endwhile;?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>


    <!-- ============================
        END TRENDING SECTION
    ============================== -->

     <!-- ============================
        START LATEST SECTION
    ============================== -->
    <section class="id_latest_article id_featured_area">
        <div class="id_grid_container id_latest_article_container">
            <h1 class="section_title">Latest Article</h1>
            <?php 
            $exclude_all = array_merge($exclude,$exclude_featured, $exclude_trending);
            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $latests = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => $paged,
                'post__not_in'  =>  $exclude_all,
               
            ));
            ?>
            <div class="id_row latest_posts_wrapper">
                <?php 
                $count = 1;
                while($latests->have_posts()): $latests->the_post();	
                ?>
                <div class="item_<?php echo $count;?> id_featured_body">
                <?php
                $featured_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );  ?>
                <img src="<?php echo $featured_url; ?>">
                <div class="id_featured_content">
                <?php
                    $cat = get_the_category( $post->ID );
                    $posttags = get_the_tags();
                    foreach($cat as $cd){
                        foreach($posttags as $tag) {
                        echo "<h3 class='cat_name_$count'>LATEST ARTICLE | $tag->name</h3>";
                        }
                    }
                    ?>
                    <h1 class="title_<?php echo $count; ?>"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></h1>
                    <p class="subtitle_<?php echo $count; ?>"><span><a href=""><?php echo reading_time(); ?> read |</a></span><span><a href="<?php echo the_permalink(); ?>"> Read more <i class="fa fa-long-arrow-right"></i></a></span></p>
                </div>
                <?php 
                $count++;
                ?>
                </div>
                <?php  endwhile; ?>
            </div>
            <script>
            var limit = 3,
            page = 1,
            type = 'latest',
            category = '',
            max_pages_latest = <?php echo $latests->max_num_pages ?>
            </script>
            <?php if ( $latests->max_num_pages > 1 ){
            echo '<div class="load_more">
                                <a href="#" class="btn-load-more">Load more</a> 
                            </div>';
                    }else{?>
            <article>
            <h1>Sorry...</h1>
            <p><?php _e('Sorry, No Posts Available !'); ?></p>
            </article>
            <?php }
            wp_reset_query();
            ?>

        </div> <!-- end container -->

    </section>

 

     <!-- ============================
        START LATEST SECTION
    ============================== -->

   

    </main>
    <!-- /.main start  -->

<?php

get_footer();