<?php
/*
Theme Name: Twenty Twenty child
Text Domain: twentytwenty-child
Template: twentytwenty
*/
?>

<section class="hero-area" id="hero-area" style="background: url(<?php echo get_field('background'); ?>);">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
             <div class="hero-box">
             	<div class="img"><img src="<?php echo get_field('hero-logo'); ?>"></div>
             	<div class="title"><?php echo get_field('hero-title'); ?></div>
             	<div class="sub-title"><?php echo get_field('hero-sub_title'); ?></div>
             	<div class="button"><a href="#">Explore</a></div>
             	<div class="arrow"><a href="#site-page"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow.png"></a></div>
             </div>
          </div>
        </div>
      </div>
</section>

<?php get_header(); ?>

<section class="about-us-area" id="about-us-area">
      <div class="container">
      	
          <div class="row">
            <div class="col-xl-12">
                <div class="about-title">
                		<h2><?php echo get_field('abt_heading'); ?></h2>
                		<p class="sub_title"><?php echo get_field('abt_sub_heading'); ?></p>
                </div>
                </div>
            </div>
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-12">
             <div class="about-box">
             	<div class="title"><span>01</span><?php echo get_field('abt_title'); ?></div>
             	<div class="sub-title"><?php echo get_field('abt_description'); ?></div>
             </div>
          </div>
         <div class="col-xl-4 col-lg-4 col-md-12">
             <div class="about-box">
             	<div class="title"><span>02</span> <?php echo get_field('sec_title'); ?></div>
             	<div class="sub-title"><?php echo get_field('sec_description'); ?></div>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12">
             <div class="about-box">
             	<div class="title"><span>03</span> <?php echo get_field('third_title'); ?></div>
             	<div class="sub-title"><?php echo get_field('third_description'); ?></div>
             </div>
          </div>
        </div>
      </div>
</section>

<section class="cta-area" id="cta-area">
      <div class="container">
      	
          <div class="row">
            <div class="col-xl-12">
            	<div class="cta-box">
	             	<div class="title"> <?php echo get_field('cta_text'); ?></div>
	             	<div class="sub-title"><?php echo get_field('cta_subtext'); ?></div>
             </div>
            </div>
        </div>
    </div>
</section>
 <section class="portfolio-area" id="portfolio-area">
      <div class="container">
      	
          <div class="row">
            <div class="col-xl-12">
                <div class="port-title">
                		<h2>Portfolio</h2>
                		<p class="sub_title">When we are bored we have some of these</p>
                </div>
                </div>
            </div>
        <div class="row">

			<?php
		$postsPerPage = 8;
			$args = array(
			     'post_type' => 'portfolios',
			     'posts_per_page' => $postsPerPage,
			     
			);?>
		<?php $loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="col-xl-3 col-lg-3 col-md-12">
             <div class="port-box">
             	<img src="<?php echo get_the_post_thumbnail_url(); ?>" />
             	<div class="p-content">
             	<div class="title"><?php echo the_title();?></div>
             	<div class="sub-title"><?php echo the_content();?></div>
             </div>
             </div>
             
          </div>
          <?php	endwhile;
           wp_reset_postdata();
           ?>
           <div class="more-list-blocks"></div>
            
           

          <div class="col-xl-12">
                <div class="port-more">
                		<p class="sub_title">Oh we have more of these</p>
                </div>
                <div class="text-center">
                	<div class="loadmores" data-offset="4"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow-load.png"></a></div>
            	</div>
            </div>
     
</section>
<section class="our-client-work" id="our-client-work">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center title-content">
                <h2>Clients</h2>
                <p>Somebody Actually Pay for this Stuff</p>
            </div>   
        </div>
        <?php
		
			$args = array(
			     'post_type' => 'logos',
			     'posts_per_page' => 4,
			     'paged' => $paged,
			);?>
		
        <div class="logo-slider">
        	<?php $loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div><img src="<?php echo get_the_post_thumbnail_url(); ?>"></div>
            <?php	endwhile; ?>
        </div>
        
</section>
<section class="contact-us" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center title-content">
                <h2>Contact Us</h2>
                <p>Sure.. We can take some time for Chat</p>
            </div>   
        </div>
        <div class="contact-form">
           		<?php echo do_shortcode( '[contact-form-7 id="14" title="Contact form 1"]' ); ?>
        </div>
</section>

<?php get_footer(); 

