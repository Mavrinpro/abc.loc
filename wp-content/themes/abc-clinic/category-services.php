<?php get_header(); ?>
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
    <section class="bg_services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="slide_h2"><?php single_cat_title(); ?></h1>
                    <p>АВС клиника – это комплексный подход к диагностированию и лечению. Широкий спектр услуг от А до Я.

                    </p>
                    <button class="btn btn-orange d-block mt-5 pl-5 m-auto m-md-0
                                     pr-5 pt-3 pb-3 go_more modal__trigger " data-link="http://abc
                                     .loc/services/oftalmologiya/<">Записаться
                        <span style="left: 158.5px; top: 45.5625px;"></span></button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h3 class="slide_h2 fsz_25">Все услуги</h3></div>
				<?php
				global $post;

				$myposts = get_posts( 'numberposts=30&category=4' );
				//$bg_class = '';
				//$bg_corner_block = '';

				foreach ( $myposts as $key => $post ) {
					$list_sub_cat = get_field( 'list_sub_cat' );

					if ( $key % 2 == 0 ) {
						$bg_class        = '';
						$bg_corner_block = '';

					} else {
						$bg_class        = 'bg_class service_block_odd';
						$bg_corner_block = 'bg_corner_block';

					}
					setup_postdata( $post );
					$icon = get_field( 'icon' );
					?>
                    <div class="col-md-4">
                        <div class="service_block <?php echo $bg_class; ?>">
                            <div class="go-corner <?php echo $bg_corner_block; ?>">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                            <div class="block_icon_and_title">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                <h3 class="ml-4 ml-md-0"><a href="<?php the_permalink(); ?>"
                                                            class="link_h3"><?php the_title();
										?></a></h3>
                            </div>
                            <div class="d-none d-md-block">
                                <ul>
									<?php
									if ( $list_sub_cat != null ) {
										foreach ( $list_sub_cat as $listen ) { ?>

                                            <li><?php echo $listen; ?></li>
											<?php
										}
									} ?>
                                </ul>
                                <a href="<?php the_permalink(); ?>" class="go_more mt-3">Подробнее
                                    <span>→</span></a>
                            </div>
                        </div>
                    </div>
					<?php
				}
				wp_reset_postdata();
				?>
                <div class="col-12 mb-4 d-block d-md-none text-center"><a href="/category/services/"
                                                                          class="go_more mt-3 color_blue ">Подробнее
                        <span>→</span></a></div>
                <!-- Цикл WordPress -->
                <div class="col-md-4">
                    <div class="service_block color_cyan">
                        <div class="form_group"><h3 class="m-0">Записаться на прием</h3>
                            <p>Познакомьтесь с врачом и узнайте
                                стоимость лечения</p>

                                <form action="" method="post">
                                    <input type="hidden" value="services" name="form_position">
                                    <span style="color: #ef9f72;" class="before_error"></span>
                                    <input type="text" class="input_form" placeholder="Имя" name="name">
                                    <span style="color: #ef9f72;" class="before_error"></span>
                                    <input type="text" class="input_form" placeholder="+7 (999) 99-99-99" id="phone"
                                           name="phone">
                                    <input type="hidden" name="post_id" value="<?php echo get_the_ID() ?>">

                            <button type="submit" class="btn btn-orange d-block m-auto pl-5 pr-5 pt-3 pb-3"
                                    data-url="<?php echo admin_url('admin-ajax.php');?>" data-text_btn="Записаться">Записаться
                            </button>
                            </form>
                            <span class="fsz-10 mt-2">Нажимая на кнопку вы соглашаетесь с Политикой
                                конфиденциальности</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();
