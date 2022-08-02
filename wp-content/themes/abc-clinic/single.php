<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ABC_Clinic
 */

get_header();
if (in_category(5)){
    echo get_template_part('template-parts/doc');
}else{

?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col md-12">

                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', get_post_type());

                        the_post_navigation(array('prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'abc-clinic') . '</span> <span class="nav-title">%title</span>', 'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'abc-clinic') . '</span> <span class="nav-title">%title</span>',));

                    endwhile; // End of the loop.
                    ?>

                </div>
            </div>
        </div>
    </section>

<?php
}
get_sidebar();
get_footer();
