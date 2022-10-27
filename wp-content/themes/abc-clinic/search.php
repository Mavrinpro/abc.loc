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
    <section class="result_search">
    <div class="container">
    <div class="row">
    <div class="col-12">

    <h1 class="page-title color_cyan2">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Поиск по фразе: %s', 'abc-clinic' ), '<span>' . get_search_query() . '</span>' );
		?>
    </h1>

    </div>
    <div class="col-md-8">
        <form role="search" method="get" id="livesearch" action="<?php echo esc_url( home_url() ); ?>" class="mb-3" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            <input type="text" name="s" id="s" onkeyup="fetchResult();" class="livesearch_input">
        </form>
        <span class="color_cyan2">Начните вводить: фамилию врача, название услуги, симптом, статью и другие материалы</span>
    </div>
    </div>
    </div>
    <div class="div_bg_image_search d-none d-md-block"></div>
    </section>
    <section class="mt-5 mb-5">
    <div class="container">
    <div class="row">
    <div class="col-md-12" id="search">
	    <?php if (get_search_query() && have_posts() ) : ?>
	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="fsz_25 color_cyan2 text_decoration_none f_weight_600"><?php the_title();
        ?> <span>→</span></a>


	<?php endwhile;



else :

	echo 'По данному запрому ничего не найдено';

endif;
?>

    </div>
    </div>
    </div>
    </section><!-- #main -->
    <input type="hidden" id="phone">
<?php
get_sidebar();
get_footer();
