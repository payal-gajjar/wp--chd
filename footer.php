<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
		<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						<?php
							if ( is_active_sidebar( 'sidebar-1' ) ) {
								dynamic_sidebar( 'sidebar-1' );
							}
						?>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
						

						<nav class="social-menu-wrapper" aria-label="<?php esc_attr_e( 'social', 'twentytwenty' ); ?>" role="navigation">
								<ul class="social-menu reset-list-style">
								<?php
								if ( has_nav_menu( 'social' ) ) {
									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'social',
										)
									);
								}
							?>	
							</ul>
							</nav>	
					</div>
					
				</div>
			</div>
			
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
