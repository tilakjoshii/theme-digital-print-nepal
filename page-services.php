<?php get_header(); ?>

<section class="page-title">
    <div class="thm-container">
        <h3>All Services</h3>        
    </div><!-- /.thm-container -->
</section><!-- /.page-title -->

<div class="breadcumb-wrapper">
    <div class="thm-container">
        <ul class="breadcumb">
            <li><a href="index.html">Homepage</a></li><!--
            --><li><span class="sep">-</span></li><!--
            --><li><span>All Services</span></li>
        </ul><!-- /.breadcumb -->
    </div><!-- /.thm-container -->
</div><!-- /.breadcumb-wrapper -->


<section class="service-style-three sec-pad">
    <div class="thm-container">
        <div class="row masonary-layout">
       
       <?php
           $parent_slug = 'services'; // Replace with the actual parent page slug
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
                   $permalink = esc_url(get_permalink($child_page->ID));
               ?>
                   <div class="col-md-4 col-sm-6 col-xs-12">
                       <div class="single-service-three">
                           <div class="img-box">
                               <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                           </div><!-- /.img-box -->
                           <div class="text-box hvr-bounce-to-bottom">
                               <a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>">
                                  <h3><?php echo esc_html( $title ); ?></h3>
                                </a>
                               <a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>" class="read-more fas fa-angle-right"></a>
                           </div><!-- /.text-box -->                    
                       </div><!-- /.single-service-three -->
                   </div><!-- /.col-md-4 -->
           <?php
               } // End foreach
           } // End if
           ?>

        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.all-services -->

<?php get_footer(); ?>