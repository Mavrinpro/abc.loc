<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ABC_Clinic
 */

get_header();
?>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-3">','</p>' );
					}
					?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col md-12">

		<?php
		while ( have_posts() ) :
			the_post();
            ?>
            <h1 class="slide_h2"><?php the_title() ?></h1>
        <?php
			the_content();

		endwhile; // End of the loop.
		?>
                    <input type="hidden" id="phone">
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
