
<!-- Slider main container -->

    <div class="swiper SwiperDoc">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
	        <?php $doctors = get_posts( array(
		        'posts_per_page' => 4,
		        'category'    => 5,
		        'orderby'     => 'date',
		        'order'       => 'DESC',
		        'include'     => array(),
		        'exclude'     => array(),
		        'meta_key'    => '',
		        'meta_value'  =>'',
		        'post_type'   => 'post',
		        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	        ) ); ?>
	        <?php foreach ($doctors as $doctor){ setup_postdata( $post ); //dump($doctor);?>
            <div class="swiper-slide flex_column">
	            <?php echo get_the_post_thumbnail($doctor->ID, '', ['class'=> 'img_bg_gray']); ?>
                <p class="fsz_25 f_weight_600 color_blue lh_31 mb-2 pl-2 pr-2"><?php echo $doctor->post_title; ?></p>
                    <p class="pl-2 pr-2"><?php echo the_field('basic_spec', $doctor->ID ); ?></p>
                    <button class="btn btn-orange d-block pl-5 pr-5 pt-3
                                            pb-3 modal__trigger m-auto">Записаться
                        </button>
            </div>
	        <?php } wp_reset_postdata(); ?>
        </div>
        <!-- If we need pagination -->

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
