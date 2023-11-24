<?php get_header(); ?>


<section class="contact-section" style="margin-top: 60px;">
     <div class="thm-container">
        <div class="row">
           <div class="col-md-12">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56542.97032933109!2d85.28195224897227!3d27.657462709796523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d3cf18ca51%3A0xd10ec3d53656e18f!2sLalitpur!5e0!3m2!1sen!2snp!4v1693128844188!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
        </div>
      </div>
</section>

 <section class="contact-section sec-pad">
     <div class="thm-container">
         <div class="row">
             <div class="col-md-8">
                 <div class="contact-form-content">
                     <div class="title">
                         <span>Contact with us</span>
                         <h2>Send Message</h2>
                     </div><!-- /.title -->
                     <?php echo do_shortcode('[contact-form-7 id="17c05d8" title="Contact form"]'); ?>
                     <!-- <form action="inc/sendemail.php" class="contact-form">
                         <input type="text" name="name" placeholder="Your full name" />
                         <input type="text" name="email" placeholder="Your email address" />
                         <textarea name="message" placeholder="What you are looking for?"></textarea>
                         <button type="submit" class="thm-btn yellow-bg">Submit Now</button>
                     </form> -->
                 </div><!-- /.contact-form-content -->
             </div><!-- /.col-md-8 -->
             <div class="col-md-4">
                 <div class="contact-info text-center">
                     <div class="title text-center">
                        <span>Contact info</span>
                        <h2>Details</h2>
                     </div><!-- /.title -->
                     <div class="single-contact-info">
                         <h4>Address</h4>
                         <p>Kirtipur, Kathmandu, Nepal</p>
                     </div><!-- /.single-contact-info -->
                     <div class="single-contact-info">
                         <h4>Phone</h4>
                         <p>9851348037</p>
                         <p>9851000755</p>
                     </div><!-- /.single-contact-info -->
                     <div class="single-contact-info">
                         <h4>Email</h4>
                         <p>digitalprint2080@gmail.com</p>
                     </div><!-- /.single-contact-info -->
                     <div class="single-contact-info">
                         <h4>Follow</h4>
                         <div class="social">
                            <a href="#" class="fab fa-twitter hvr-pulse"></a>
                            <a href="https://www.facebook.com/profile.php?id=100063160003189" class="fab fa-facebook-f hvr-pulse"></a><!--  
                             --><a href="#" class="fab fa-youtube hvr-pulse"></a>
                        </div><!-- /.social -->
                     </div><!-- /.single-contact-info -->
                 </div><!-- /.contact-info -->
             </div><!-- /.col-md-4 -->
         </div><!-- /.row -->
     </div><!-- /.thm-container -->
 </section><!-- /.contact-section -->

<?php get_footer(); ?>