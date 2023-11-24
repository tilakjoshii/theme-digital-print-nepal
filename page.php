<?php get_header(); ?>


<?php
// Check if the child_id parameter is set in the URL
if (isset($_GET['child_id'])) {
    $child_id = intval($_GET['child_id']); // Sanitize the parameter

    // Get child page data
    $child_page = get_post($child_id);
    $title = $child_page->post_title;
    $content = apply_filters('the_content', $child_page->post_content);
    $thumbnail = get_the_post_thumbnail($child_id, 'thumbnail');
    ?>
    
    <section class="page-title">
        <div class="thm-container">
            <h3><?php echo  $title; ?></h3>        
        </div><!-- /.thm-container -->
    </section><!-- /.page-title -->

    <div class="breadcumb-wrapper">
        <div class="thm-container">
            <ul class="breadcumb">
                <li><a href="index.html">Homepage</a></li><!--
                --><li><span class="sep">-</span></li><!--
                --><li><span>Service Page</span></li>
            </ul><!-- /.breadcumb -->
        </div><!-- /.thm-container -->
    </div><!-- /.breadcumb-wrapper -->

    <section class="blog-details-page sec-pad">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-8">
				<div class="single-blog-post">
					<?php echo   $content; ?>
				</div><!-- /.single-blog-post -->
			</div><!-- /.col-md-8 -->

			<div class="col-md-4">
				<div class="sidebar right-sidebar">

					<!-- <div class="single-sidebar search-sidebar">
                        <?php dynamic_sidebar( 'main_sidebar' ); ?>
					</div> -->

					<!-- <div class="single-sidebar recent-post">
						<div class="title">
							<h3>Recent Posts</h3>
						</div>
						<ul class="post-list">
							<li><a href="#"><h4>What file types do you accept for printing cards.</h4></a></li>
							<li><a href="#"><h4>What are your recommended file sizes for images and photos?</h4></a></li>
							<li><a href="#"><h4>What is the difference between vector and bitmap images?</h4></a></li>
						</ul>
					</div> -->

                    <div class="single-sidebar category-sidebar">
						<div class="title">
							<h3>Services</h3>
						</div><!-- /.title -->
						<ul class="category-list">
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
                                    $title = $child_page->post_title;
                                    $permalink = esc_url(get_permalink($child_page->ID));
                        ?>
							<li><a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>"><?php echo  $title; ?></a></li>                 
                        <?php
                             } // End foreach
                         } // End if
                        ?>
						</ul><!-- /.about-list -->                   
					</div><!-- /.single-sidebar -->

                    <div class="single-sidebar category-sidebar">
						<div class="title">
							<h3>About US</h3>
						</div><!-- /.title -->
						<ul class="category-list">
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
                                    $title = $child_page->post_title;
                                    $permalink = esc_url(get_permalink($child_page->ID));
                        ?>
							<li><a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>"><?php echo  $title; ?></a></li>                 
                        <?php
                             } // End foreach
                         } // End if
                        ?>
						</ul><!-- /.service-list -->                   
					</div><!-- /.single-sidebar -->
                    
				</div><!-- /.sidebar right-sidebar -->
			</div><!-- /.col-md-4 -->
		</div><!-- /.row -->
	</div><!-- /.thm-container -->
    </section><!-- /.blog-details-page -->

<?php
}
?>


<?php get_footer(); ?>