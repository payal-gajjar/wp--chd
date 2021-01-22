<?php 

/**

 * The theme header
 * 
 */
?>

<!DOCTYPE html>



<html class="no-js" lang="en-US" itemscope itemtype="http://schema.org/WebPage">

	<head>

		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width">
	

		<!--wordpress head-->

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		
   <!--  header code start here -->
   <header>
  <div id="site-page" class="site">
	<header id="site-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 d-flex flex-wrap justify-content-between align-items-center">
				  	<nav class="site-navigation d-flex justify-content-end align-items-center">
								
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
									    'container'      => 'ul',
									    'menu_class'     => 'd-flex flex-column flex-lg-row justify-content-lg-end align-content-center',
										)
									);
								?>
					
				</nav>
				 <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
    	 		</div>
				</div>
			</div>
		</div>
   </header>  
   </div>       
 



    			