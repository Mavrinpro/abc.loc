<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ABC_Clinic
 */

get_header();
?>
    <section class="result_search mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php if ( have_posts() ) : ?>
    <h1 class="page-title">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Поиск по фразе: %s', 'abc-clinic' ), '<span>' . get_search_query() . '</span>' );
		?>
    </h1>
                </div>
            </div>
        </div>
    <div class="div_bg_image_search"></div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

                </div>
            </div>
        </div>
    </section><!-- #main -->

<?php
get_sidebar();
get_footer();
