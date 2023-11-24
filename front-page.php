<?php get_header() ?>

<!-- <div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one" data-ride="carousel">           
     Hero Section Image 
    <div class="carousel-inner hero_image" role="listbox">
        <img src="<?php //echo get_stylesheet_directory_uri(); 
                    ?>/img/images/banner.jpg" alt="Digital print nepal banner image">
    </div>
</div> -->




<section class="hero_banner">
    <div class="banner_container">
        


<div class="banner_categories" id="menu_icon_show_hidden">
    <ul class="list">
        <?php
        $menu_args = array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Custom_Walker(),
        );

        wp_nav_menu($menu_args);
        ?>
    </ul>
</div>

     
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $args = array(
                    'post_type' => 'banner', // Assuming 'banner' is your custom post type
                    'posts_per_page' => -1,
                );

                $carousel_query = new WP_Query($args);
                $slide_count = $carousel_query->post_count;

                for ($i = 0; $i < $slide_count; $i++) {
                    $active_class = ($i === 0) ? 'active' : '';
                    echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" class="' . $active_class . '" aria-label="Slide ' . ($i + 1) . '"></button>';
                }
                ?>
            </div>

            <div class="carousel-inner">
                <?php
                $slide_index = 0;

                while ($carousel_query->have_posts()) : $carousel_query->the_post();
                    $active_class = ($slide_index === 0) ? 'active' : '';
                ?>
                    <div class="carousel-item <?php echo esc_attr($active_class); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('class' => 'd-block w-100 custom-carousel-image', 'alt' => get_the_title()));
                        } else {
                            // Fallback image if no featured image is set
                            echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/img/images/default-banner.jpg') . '" class="d-block w-100 custom-carousel-image" alt="Default Banner">';
                        }
                        ?>
                    </div>
                <?php
                    $slide_index++;
                endwhile;

                // Reset the query to the original state
                wp_reset_postdata();
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>
<section class="welcome-section sec-pad">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-img-box">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/digital_about.png" alt="Awesome Image" />
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
            $parent = get_page_by_path($parent_slug);

            if ($parent) {
                $child_pages = get_children(array(
                    'post_parent' => $parent->ID,
                    'post_type' => 'page', // Assuming child pages are of 'page' post type
                    'post_status' => 'publish',
                ));

                $is_first = true; // Variable to track the first element

                foreach ($child_pages as $child_page) {
                    $thumbnail = get_the_post_thumbnail_url($child_page->ID, 'thumbnail');
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
                    <div class="single-tab-content tab-pane fade in <?php echo esc_attr($active_class); ?>" id="<?php echo esc_html($slug); ?>">
                        <div class="sec-title text-center">
                            <span>Our services</span>
                            <h3><?php echo esc_html($title); ?></h3>
                            <p> <?php echo $content; ?> </p>
                            <a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>" class="read_more_btn">Read More</a>
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
                $parent = get_page_by_path($parent_slug);

                if ($parent) {
                    $child_pages = get_children(array(
                        'post_parent' => $parent->ID,
                        'post_type' => 'page', // Assuming child pages are of 'page' post type
                        'post_status' => 'publish',
                    ));

                    $is_first = true; // Variable to track the first element

                    foreach ($child_pages as $child_page) {
                        $thumbnail = get_the_post_thumbnail_url($child_page->ID, 'thumbnail');
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

                        <li class="mb2px_only <?php echo esc_attr($active_class); ?>" data-tab-name="<?php echo esc_html($slug); ?>">
                            <a href="#<?php echo esc_html($slug); ?>" aria-controls="<?php echo esc_html($title); ?>" role="tab" data-toggle="tab" class="hvr-bounce-to-bottom">
                                <img src="<?php echo esc_url($acf_image['url']); ?>" alt="service_icon" style="height: 80px;">
                                <h3><?php echo esc_html($title); ?></h3>
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
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Image" />
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3><?php echo wp_trim_words(get_the_excerpt(), 40); ?></h3>
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

<section class="recent-projects sec-pad">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>Work showcase</span>
            <h3>Recent Projects</h3>
            <p>There are many variations of passages of lorem Ipsum available, but <br /> the majority have suffered alteration in some form.</p>
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
                                    <span><?php echo get_field('project_type'); ?></span>
                                    <a href="project-details.html">
                                        <h3><?php the_title(); ?></h3>
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
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/customer.png" alt="" style="height: 100px;">
                                    <a href="service-details.html">
                                        <h3>Customer-Centric <br> Approach</h3>
                                    </a>
                                </div><!-- /.single-service-one -->
                            </div><!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="single-service-one hvr-bounce-to-bottom">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/design.png" style="height: 100px;">
                                    <a href="service-details.html">
                                        <h3>Design <br> Expertise</h3>
                                    </a>
                                </div><!-- /.single-service-one -->
                            </div><!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="single-service-one hvr-bounce-to-bottom">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/time.png" style="height: 100px;">
                                    <a href="service-details.html">
                                        <h3>Time <br /> Efficiency</h3>
                                    </a>
                                </div><!-- /.single-service-one -->
                            </div><!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="single-service-one hvr-bounce-to-bottom">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/images/technology.png" style="height: 100px;">
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