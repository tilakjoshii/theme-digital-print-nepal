<?php get_header(); ?>
  

<section class="page-title">
    <div class="thm-container">
        <h3>About us</h3>        
    </div><!-- /.thm-container -->
</section><!-- /.page-title -->

<div class="breadcumb-wrapper">
    <div class="thm-container">
        <ul class="breadcumb">
            <li><a href="index.html">Homepage</a></li><!--
            --><li><span class="sep">-</span></li><!--
            --><li><span>About Us</span></li>
        </ul><!-- /.breadcumb -->
    </div><!-- /.thm-container -->
</div><!-- /.breadcumb-wrapper -->

<section class="about-section sec-pad">
    <div class="thm-container">
        <div class="row masonary-layout">
        <?php
           $parent_slug = 'about'; // Replace with the actual parent page slug
           $parent = get_page_by_path( $parent_slug);
           
           if ( $parent ) {
               $child_pages = get_children( array(
                   'post_parent' => $parent->ID,
                   'post_type' => 'page', // Assuming child pages are of 'page' post type
                   'post_status' => 'publish',
               ) );
           
               foreach ( $child_pages as $child_page ) {
                   $thumbnail = get_the_post_thumbnail_url( $child_page->ID, 'full' );
                   $title = $child_page->post_title;
                   $content = $child_page->post_content;
                   $trimmed_content = wp_trim_words( strip_tags( $content ), 10 );
                   $permalink = esc_url(get_permalink($child_page->ID));
               ?>
           
           <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-about">
                    <div class="img-box">
                        <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" style="max-width: 370px;"/>
                    </div><!-- /.img-box -->
                    <div class="text-box hvr-bounce-to-bottom">
                        <a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>"><h3><?php echo esc_html( $title ); ?></h3></a>
                        <p><?php echo $trimmed_content; ?> </p>
                        <a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>" class="read-more fas fa-angle-right"></a>
                    </div><!-- /.text-box -->
                </div><!-- /.single-about -->
            </div><!-- /.col-md-4 -->
            
            <?php
               } // End foreach
           } // End if
           ?>
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.about-section -->

<section class="testi-carousel-wrapper">
	<div class="overlay"></div><!-- /.overlay -->
    <div class="thm-container">
	    <div class="testi-carousel owl-carousel owl-theme">
		<?php
          $args = array(
              'post_type' => 'testimonial', // Set the post type to 'site_information'
              'posts_per_page' => 12,  
          );
           // Query the posts
           $query = new WP_Query($args);
          
           // Check if there are posts
           if ($query->have_posts()) {
               while ($query->have_posts()) {
                   $query->the_post();
                   $thumbnail_id = get_post_thumbnail_id();
                   $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
          ?>
	        <div class="item single-testimonials">
                <div class="img-box">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt_text; ?>"/>
                </div><!-- /.img-box -->
                <div class="text-box">
                    <h3><?php echo wp_trim_words(get_the_excerpt(), 25); ?></h3>
                    <p><?php the_title(); ?></p>
                </div><!-- /.text-box -->
	        </div>
		<?php }
           // Restore the original post data
            wp_reset_postdata();
           }
        ?>
	    </div>
    </div><!-- /.thm-container -->
</section><!-- /.testi-carousel-wrapper -->


<!-- <section class="team-section sec-pad">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>The leadership</span>
            <h3>Meet the Team</h3>
            <p>There are many variations of passages of lorem Ipsum available, but <br /> the majority have suffered alteration in some form.</p>
        </div>
        <div class="team-carousel owl-carousel owl-theme">
        <?php
          $args = array(
              'post_type' => 'team', 
              'posts_per_page' => 20,  
          );
           $query = new WP_Query($args);
          
           if ($query->have_posts()) {
               while ($query->have_posts()) {
                   $query->the_post();
                   $thumbnail_id = get_post_thumbnail_id();
                   $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
          ?>
            <div class="item">
                <div class="single-team-carousel">
                    <div class="inner">
                        <div class="img-box">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt_text; ?>" style="max-width: 470px;"/>
                        </div>
                        <div class="team-content">
                            <div class="title">
                                <span><?php echo get_field('team_designation'); ?></span>
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <p><?php echo the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
            wp_reset_postdata();
           }
        ?>
        </div>
    </div>
</section> -->


<?php get_footer(); ?>