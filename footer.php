<section class="footer-subscribe">
	<div class="thm-container">
		<div class="title">
			<span>Subsrcibe newsletter</span>
			<h3>Don’t Miss Out</h3>
		</div><!-- /.title -->
		<form action="inc/mailchimp/subscribe.php" class="subscribe-form">
			<input type="text" placeholder="Enter your email address" /><!--
			--><button type="submit" class="thm-btn yellow-bg">Submit Info</button>
		</form>
	</div><!-- /.thm-container -->
</section><!-- /.footer-subscribe -->

<footer class="footer">
	<div class="thm-container">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-widget about-widget">
					<div class="title">
						<h3>About Digital Print Nepal</h3>
					</div><!-- /.title -->
					<p>
						Welcome to the premier printing destination in Nepal! We are your one-stop solution for all
						your printing needs. From captivating book covers to professional business cards, stylish ID
						cards to vibrant bag, t-shirt, and cup prints – we turn your ideas into stunning reality.
						With unparalleled quality and innovative designs, we bring your visions to life. Join us in
						creating print perfection that leaves a lasting impression.
					</p>
				</div><!-- /.footer-widget about-widget -->
			</div><!-- /.col-md-4 -->
			<div class="col-md-2">
				<div class="footer-widget links-widget explore">
					<div class="title">
						<h3>Explore</h3>
					</div><!-- /.title -->
					<ul class="link-list">
						<li><a href="<?php echo site_url('/about'); ?>">About</a></li>
						<li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
						<li><a href="<?php echo site_url('/services'); ?>">Our Services</a></li>
					</ul><!-- /.link-list -->
				</div><!-- /.footer-widget links-widget explore -->
			</div><!-- /.col-md-2 -->
			<div class="col-md-3">
				<div class="footer-widget links-widget services">
					<div class="title">
						<h3>Services</h3>
					</div><!-- /.title -->
					<ul class="link-list">
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
								$title = $child_page->post_title;
								$permalink = esc_url(get_permalink($child_page->ID));
						?>

								<li><a href="<?php echo $permalink . '?child_id=' . $child_page->ID; ?>"><?php echo $title; ?></a></li>

						<?php
							} // End foreach
						} // End if
						?>
					</ul><!-- /.link-list -->
				</div><!-- /.footer-widget links-widget explore -->
			</div><!-- /.col-md-3 -->
			<div class="col-md-3">
				<div class="footer-widget contact-widget">
					<div class="title">
						<h3>Contact</h3>
					</div><!-- /.title -->
					<p>9851348037</p>
					<p>9851000755</p>
					<p>digitalprint2080@gmail.com</p>
					<p>Kirtipur, Kathmandu, Nepal</p>
				</div><!-- /.footer-widget links-widget explore -->
			</div><!-- /.col-md-3 -->
		</div><!-- /.row -->
	</div><!-- /.thm-contianer -->
</footer><!-- /.footer -->
<div class="footer-bottom">
	<div class="thm-container clearfix">
		<div class="pull-left copy-text">
			<p>&copy; Copyright 2023 Created by <a href="https://neeminfosys.com/">Neem Infosys</a></p>
		</div><!-- /.pull-left copy-text -->
		<div class="social-box pull-right">
			<a href="#" class="fab fa-twitter hvr-pulse"></a>
			<a href="https://www.facebook.com/profile.php?id=100063160003189" class="fab fa-facebook-f hvr-pulse"></a><!--  
             --><a href="#" class="fab fa-youtube hvr-pulse"></a>
		</div><!-- /.social-box -->
	</div><!-- /.thm-container -->
</div><!-- /.footer-bottom -->

<!-- <div class="scroll-to-top scroll-to-target" data-target="html"><i class="fas fa-angle-up"></i></div>                     -->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-select.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.counterup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

<?php wp_footer(); ?>
<script>
	let menuicon = document.querySelector('#menu_icon');
	let navbar = document.querySelector('.banner_categories');

	menuicon.onclick = () => {
		menuicon.classList.toggle('bx-x');
		navbar.classList.toggle('active');
		// console.log(navbar);
	}
</script>
</body>

</html>