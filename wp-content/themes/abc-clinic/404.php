<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
                <div class="col-md-12 text-center mt-3">
                    <img src="<?php echo __PATH_IMG ?>/404.png" alt="404" class="wow flipInX">
                    <h3 class="" style="font-size: 40px; font-weight: 900;">ОЙ, ошибка</h3>
                    <h4>страница не найдена</h4>
                    <span>Что делать?</span>

                </div>
                <div class="col-md-4 offset-md-4 mb-5">
                    <a href="/" class="btn btn-blue d-block mt-5 pl-5 pr-5 pt-3 pb-3 color-white text_decoration_none">
                        Перейти на главную страницу
                    </a>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="phone">
<?php
get_footer();
