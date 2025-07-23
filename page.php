<?php get_header(); ?>

<section id="content">


	<?php // if ( get_field( 'bg_image' ) ): ?>
	<?php
		$bg_image = get_field('bg_image');
		$bg_video = get_field('bg_video');
		$is_homepage = is_front_page(); // vérifier si on est sur la homepage
	?>

        <article class="title">
        <div class="image"
             style="background-image: url('<?php echo $bg_image['sizes']['header']; ?>')">
            <?php if ( $is_homepage && $bg_video ): ?>
                <video class="background-video" autoplay muted loop playsinline>
                    <source src="<?php echo esc_url($bg_video); ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        </div>
        <div class="title">
            <h1 class="page-title">
                <span class="txt"><?php echo get_the_title(); ?></span>
                <span class="underline"></span>
            </h1>
        </div>
        </article>

	<?php else: ?>

        <div class="spacer"></div>

	<?php endif; ?>

    <div class="platter">
        <nav class="sub-nav">
		    <?php

		    wp_nav_menu( array(
			    'theme_location' => 'principal'
		    ) );

		    ?>
        </nav>

		<?php
		// TO SHOW THE PAGE CONTENTS
		while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <article class="content-page">

				<?php
				echo '<div class="content">';
				the_content();
				echo '</div>';
				?> <!-- Page Content -->

            </article><!-- .entry-content-page -->


			<?php
		endwhile; //resetting the page loop
		wp_reset_query(); //resetting the page query
		?>


    </div>


</section>


<?php get_footer(); ?>

