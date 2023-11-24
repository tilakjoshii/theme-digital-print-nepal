<?php get_header() ?>

<div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one" data-ride="carousel">
	<!-- Hero Section Image -->
	<div class="carousel-inner hero_image" role="listbox">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/banner.jpg"
			alt="Digital print nepal banner image">
	</div>
</div>

<section class="welcome-section sec-pad">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-6">
				<div class="welcome-img-box">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/digital_about.png"
						alt="Awesome Image" />
				</div><!-- /.welcome-img-box -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="welcome-content">
					<div class="title">
						<p>Welcome to Digital Print Nepal</p>
						<h3>Dream it. Print it.</h3>
					</div><!-- /.title -->
					<p>
						Welcome to the premier printing destination in Nepal! We are your one-stop solution for all
						your printing needs. From captivating book covers to professional business cards, stylish
						ID cards to vibrant bag, t-shirt, and cup prints – we turn your ideas into stunning reality.
						With unparalleled quality and innovative designs, we bring your visions to life. Join us in
						creating print perfection that leaves a lasting impression.
					</p>
					<a href="<?php echo site_url('/about'); ?>" class="thm-btn yellow-bg">Learn More</a>
				</div><!-- /.welcome-content -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.thm-container -->
</section><!-- /.welcome-section -->


<section class="video-box-design-guide sec-pad service-tab-box">
	<div class="thm-container">
		<div class="tab-content">
			<?php
           $parent_slug = 'services'; // Replace with the actual parent page slug
           $parent = get_page_by_path( $parent_slug);
           
           if ( $parent ) {
               $child_pages = get_children( array(
                   'post_parent' => $parent->ID,
                   'post_type' => 'page', // Assuming child pages are of 'page' post type
                   'post_status' => 'publish',
               ) );
			   
			   $is_first = true; // Variable to track the first element

               foreach ( $child_pages as $child_page ) {
                   $thumbnail = get_the_post_thumbnail_url( $child_page->ID, 'thumbnail' );
                   $title = $child_page->post_title;
                   $content = wp_trim_words($child_page->post_content, 50);
                   $permalink = esc_url(get_permalink($child_page->ID));
				   $slug = sanitize_title($title); // Get the slug of the title
				   
				   if ($is_first) {
					$is_first = false; // Set to false for subsequent iterations
					$active_class = 'active'; // Add the 'active' class for the first element
				    } else {
					   $active_class = ''; // No 'active' class for other elements
				    }
               ?>
			<div class="single-tab-content tab-pane fade in <?php echo esc_attr($active_class); ?>"
				id="<?php echo esc_html( $slug ); ?>">
				<div class="sec-title text-center">
					<span>Our services</span>
					<h3>
						<?php echo esc_html( $title ); ?>
					</h3>
					<p>
						<?php echo $content; ?>
					</p>
					<a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>" class="read_more_btn">Read
						More</a>
				</div><!-- /.sec-title -->
			</div><!-- /.single-tab-content -->

			<?php
               } // End foreach
           } // End if
           ?>
		</div><!-- /.tab-content -->


		<div class="tab-title">
			<ul class="list-inline service_list" role="tablist">
				<?php
           $parent_slug = 'services'; // Replace with the actual parent page slug
           $parent = get_page_by_path( $parent_slug);
           
           if ( $parent ) {
               $child_pages = get_children( array(
                   'post_parent' => $parent->ID,
                   'post_type' => 'page', // Assuming child pages are of 'page' post type
                   'post_status' => 'publish',
               ) );
			   
			   $is_first = true; // Variable to track the first element

               foreach ( $child_pages as $child_page ) {
                   $thumbnail = get_the_post_thumbnail_url( $child_page->ID, 'thumbnail' );
                   $title = $child_page->post_title;
                   $content = $child_page->post_content;
                   $permalink = esc_url(get_permalink($child_page->ID));
				   $slug = sanitize_title($title); // Get the slug of the title
				   
				   // Get ACF image field value
				   $acf_image = get_field('service_icon', $child_page->ID);

				   if ($is_first) {
					$is_first = false; // Set to false for subsequent iterations
					$active_class = 'active'; // Add the 'active' class for the first element
				    } else {
					   $active_class = ''; // No 'active' class for other elements
				    }
               ?>

				<li class="mb2px_only <?php echo esc_attr($active_class); ?>"
					data-tab-name="<?php echo esc_html( $slug ); ?>">
					<a href="#<?php echo esc_html( $slug ); ?>" aria-controls="<?php echo esc_html( $title ); ?>"
						role="tab" data-toggle="tab" class="hvr-bounce-to-bottom">
						<img src="<?php echo esc_url($acf_image['url']); ?>" alt="service_icon" style="height: 80px;">
						<h3>
							<?php echo esc_html( $title ); ?>
						</h3>
					</a>
				</li>

				<?php
               } // End foreach
           } // End if
           ?>
			</ul><!-- /.list-inline -->
		</div><!-- /.tab-title -->


	</div><!-- /.thm-container -->
</section><!-- /.video-box-design-guide -->


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
					<img src="<?php  the_post_thumbnail_url(); ?>" alt="Image" />
				</div><!-- /.img-box -->
				<div class="text-box">
					<h3>
						<?php echo wp_trim_words(get_the_excerpt(), 40); ?>
					</h3>
					<p>
						<?php  the_title(); ?>
					</p>
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



<!-- =======Clients Section ====== -->
<section id="clients" class="section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span>Our Clients</span>
            <h3>Meet our happy clients</h3>
        </div>

        <div class="row no-gutters clients-wrap">

            <?php
            $args = array(
                'post_type'      => 'our_clients',
                'posts_per_page' => -1,
            );

            $clients_query = new WP_Query($args);

            if ($clients_query->have_posts()) :
                while ($clients_query->have_posts()) :
                    $clients_query->the_post();

                    // Get the client logo image URL using ACF
                    $client_logo_url = get_field('client_logo');

                    // Output the client logo HTML
                    if ($client_logo_url) :
                        ?>
                        <div class="col-lg-3 col-md-4 col-xs-6 ">
                            <div class="client-logo">
                                <img src="<?php echo esc_url($client_logo_url); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                            </div>
                        </div>
                        <?php
                    else :
                        echo 'No client_logo field found for post ID ' . get_the_ID();
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No clients found.';
            endif;
            ?>

        </div>
    </div>
</section>
<!-- -----------client section end------ -->
	
	

<!--video gallery section start-->
<section class="gallery_section custom_padding_tb feature text-center" id="video">
    <div class="blog__content">
	<span>Video Gallery</span>
      <h3 class="w-100 section-heading  text-center">Inspiring Visual Showcase</h3>
      <div class="container">
          <div class="row ">
		  <?php
        // Query the custom post type 'videos'
        $video_query = new WP_Query(array('post_type' => 'video_gallery'
	, 'posts_per_page' => 6));

        if ($video_query->have_posts()) {
          while ($video_query->have_posts()) {
            $video_query->the_post();

            // Get the video URL from the ACF field
            $video_url = get_field('video_url');
          


                // Check if the URL is in the shortened format
                if (strpos($video_url, 'youtu.be') !== false) {
                    // Convert shortened URL to full embed format
                    $video_id = substr(strrchr($video_url, '/'), 1);
                    $video_url = "https://www.youtube.com/embed/$video_id";
                }


            // Output the video in an iframe
            echo '<div class="col-lg-4 col-md-6 col-12 gallery_item">';
            echo '<iframe src="' . $video_url . '" loading="lazy"></iframe>';
            echo '</div>';
          }

          wp_reset_postdata();
        }
        ?>
          </div>
		</div>
    </div>
  </section>
  <!--video gallery section end-->

<section class="recent-projects sec-pad">
	<div class="thm-container">
		<div class="sec-title text-center">
			<span>Work showcase</span>
			<h3>Recent Projects</h3>
			<p>There are many variations of passages of lorem Ipsum available, but <br /> the majority have suffered
				alteration in some form.</p>
		</div><!-- /.sec-title -->
		<div class="row">
			<?php
          $args = array(
              'post_type' => 'recent_project', // Set the post type to 'site_information'
              'posts_per_page' => 3,  
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

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="single-recent-project">
					<div class="img-box">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt_text; ?>" />
					</div><!-- /.img-box -->
					<div class="text-box">
						<a href="project-details.html" class="more"><i class="fas fa-plus"></i></a>
						<div class="inner hvr-bounce-to-bottom">
							<span>
								<?php echo get_field('project_type'); ?>
							</span>
							<a href="<?php the_permalink();?>">
								<h3>
									<?php the_title(); ?>
								</h3>
							</a>
						</div><!-- /.inner -->
					</div><!-- /.text-box -->
				</div><!-- /.single-recent-project -->
			</div><!-- /.col-md-4 -->

			<?php }
           // Restore the original post data
            wp_reset_postdata();
           }
        ?>
		</div><!-- /.row -->
	</div><!-- /.thm-container -->
</section><!-- /.recent-projects -->

<!-- CTA Section -->

<section id="contact-cta-section" class="contact-cta-section">
  <div class="wrapper-full">
    <div class="cta-wrapper">
      <div class="details-wrapper">
        <h2>Print Your Design Without Limits</h2>
        <p>For Quick inquiry</p>
      </div>
      <a class="blue-cta-button" href="#">Contact Us Now!</a>
      <div class="clearfix"></div>
    </div>
  </div>
</section>

<!-- Our clients -->

<section id="clients" class="section-bg">
    <div class="container">
        <div class="section-header">
            <span>Our Clients</span>
            <h3>Meet our happy clients</h3>
        </div>

        <div class="row no-gutters justify-content-center clients-wrap clearfix wow fadeInUp client-mb" style="visibility: visible; animation-name: fadeInUp;">

            <?php
            $client_query = new WP_Query(array('post_type' => 'clients', 'posts_per_page' => -1));
            if ($client_query->have_posts()) :
                while ($client_query->have_posts()) : $client_query->the_post();
                    ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 ">
                        <div class="client-logo ">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>
    </div>
</section>

<!-- Team Section -->

<section class="container">
    <div class="sec-title text-center">
        <span>Meet Our Team</span>
        <h3>Our Teams</h3>
    </div><!-- /.sec-title -->
    <div class="row justify-content-center team-mb">
        <?php
        // Query the custom post type
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1 // Get all posts
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class="col-md-3 col-sm-6">
                    <div class="our-team hvr-bounce-to-bottom">
                        <div class="pic">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Image" />
                        </div>
                        <div class="team-content">
                            <h3 class="title"><?php the_title(); ?></h3>
                            <span class="post"><?php the_content(); ?></span>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>




<section class="service-style-one sec-pad">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-6">
				<div class="service-content">
					<div class="title">
						<span>What Sets Us Apart</span>
						<h2>Why Choose Us</h2>
					</div><!-- /.title -->
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/printing.png" alt="">
					</div>
				</div><!-- /.service-content -->
			</div><!-- /.col-md-6 -->

			<div class="col-md-6">
				<div class="service-right-content">
					<div class="inner">
						<div class="divider hor"></div><!-- /.divider -->
						<div class="divider ver"></div><!-- /.divider -->
						<div class="row">
							<div class="col-sm-6">
								<div class="single-service-one hvr-bounce-to-bottom">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/customer.png"
										alt="" style="height: 100px;">
									<a href="service-details.html">
										<h3>Customer-Centric <br> Approach</h3>
									</a>
								</div><!-- /.single-service-one -->
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="single-service-one hvr-bounce-to-bottom">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/design.png"
										style="height: 100px;">
									<a href="service-details.html">
										<h3>Design <br> Expertise</h3>
									</a>
								</div><!-- /.single-service-one -->
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="single-service-one hvr-bounce-to-bottom">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/time.png"
										style="height: 100px;">
									<a href="service-details.html">
										<h3>Time <br /> Efficiency</h3>
									</a>
								</div><!-- /.single-service-one -->
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6">
								<div class="single-service-one hvr-bounce-to-bottom">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/technology.png"
										style="height: 100px;">
									<a href="service-details.html">
										<h3>Cutting-Edge <br /> Technology</h3>
									</a>
								</div><!-- /.single-service-one -->
							</div><!-- /.col-sm-6 -->
						</div><!-- /.row -->
					</div><!-- /.inner -->
				</div><!-- /.service-right-content -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.thm-container -->
</section><!-- /.service-style-one -->


<?php get_footer() ?>