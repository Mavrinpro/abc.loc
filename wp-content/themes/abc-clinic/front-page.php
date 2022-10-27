<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ABC_Clinic
 */

get_header();
?>
    <section class="h-640">
		<?php $slider = get_field( 'home_slider' ); //dump($slider); ?>
        <div class="swiper mySwiper mt-3" style="height: 640px;">
            <div class="swiper-wrapper">
				<?php //foreach ( $slider as $key => $img ) {
					//if ( $img['color_btn'] == '#288791' ) {
						//$img['color_btn'] = 'btn-blue';
					//} else {
						//$img['color_btn'] = 'btn-orange';
					//}
					?>
                    <div class="swiper-slide" style="background-image: url('<?php echo __PATH_IMG.'/doc2.jpg' ?>')
                            ; background-size: cover;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mt-5 pb-md-5">
                                    <h2 class="slide_h2 mid"><?php echo $slider[1]["title"] ?></h2>
                                    <p class="mb-5"><?php echo $slider[1]["drsc"] ?>
                                    </p>
                                    <a href="<?php echo $slider[1]['link'] ?>" class="btn <?php echo
                                    $slider[1]['color_btn']; ?>
                                    d-inline-block mt-5 pl-5
                                     pr-5 pt-3 pb-3 go_more" data-link="<?php echo $slider[1]['link'] ?><">Подробнее
                                    </a>
                                    <div class="number_animate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				//} ?>
            </div>
<!--            <div class="block_next">-->
<!--                <div class="prev swiper-button-prev"></div>-->
<!--                <div class="swiper-pagination"></div>-->
<!--                <div class="next swiper-button-next"></div>-->
<!--            </div>-->
        </div>
        <!-- Slider main container -->
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7"><h2 class="slide_h2 mt-0">Наши услуги</h2></div>
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <a href="http://abc.loc/services/" class="go_more mt-3 color_blue">Все услуги
                        <span>→</span></a>
                </div>
				<?php
				global $post;
				$args = [
					'numberposts' => 5,
					'category'    => 4,
					'include'     => [72, 435, 454, 74, 70],
					'order'       => 'ASC',
				];
				$myposts = get_posts( $args );
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
                                    <input type="hidden" value="front_page" name="form_position">
                                    <span style="color: #ef9f72;" class="before_error"></span>
                                    <input type="text" class="input_form" placeholder="Имя" name="name">
                                    <span style="color: #ef9f72;" class="before_error"></span>
                                    <input type="text" name="phone" class="input_form" placeholder="+7 (999) 99-99-99"
                                           id="phone">
                                    <input type="hidden" name="post_id" value="<?php echo get_the_ID() ?>">
                            <button type="submit" class="btn btn-orange d-inline-block pl-5 pr-5 pt-3 pb-3"
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
    <section id="about" class="mb-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 oberflow_row">
                    <img class="col_img_bg" src="<?php echo __PATH_IMG; ?>/stul.png">
                    <img src="<?php echo __PATH_IMG; ?>/doc.png" alt="Doctor"
                         class="doctor_left fadeInLeft wow d-block d-md-none">
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-5 transparent">
                    <img src="<?php echo __PATH_IMG; ?>/doc.png" alt="Doctor"
                         class="doctor_left fadeInLeft wow d-none d-md-block">
                    <h2 class="slide_h2 ">О клинике</h2>
                    <p>Врачи АВС клиника – это команда экспертов высочайшего уровня. Преимущество медицинского центра
                        заключается в сочетании опыта работы высокопрофессиональных специалистов и оснащение клиники
                        высококлассным оборудованием.</p>

                    <p>В нашем медцентре работают лучшие доктора и кандидаты медицинских наук. Они являются
                        постоянными участниками и спикерами специализированных научно-практических конференций,
                        форумов, симпозиумов. Подробная информация о врачах нашего центра и их достижениях
                        представлена в разделе «НАШИ ВРАЧИ».</p>

                    <p>Наша главная задача - нести людям качественную медицину для обеспечения здоровья, красоты и
                        полноценного долголетия.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="advantages" class="mb-5">
        <div class="container">
            <div class="row transparent">
                <div class="col-md-5">
                    <h2 class="slide_h2">Наши преимущества</h2>
                    <p>Высокие стандарты сети Клиник «ABC» выстроены таким образом, чтобы пациенты
                        могли получать медицинскую помощь максимально безопасно и без очередей, что актуально особенно в
                        текущем ритме жизни!</p>
                    <button class="btn btn--blue-dark d-inline-block mt-5 pl-5 pr-5 pt-3 pb-3 modal__trigger">
                        Записаться
                    </button>
                </div>
                <img src="<?php echo __PATH_IMG; ?>/abc_transparent.png" alt="ABC -
                    Клиника" class="abc_logo_transition fadeInRight wow">
            </div>
            <div class="row mt-5">
				<?php $advantages = get_field( 'advantages' );
				$it               = 0;
				foreach ( $advantages as $k => $adv ) {
					$it = $it + 0.1; ?>
                    <div class="col-md-3">
						<?php foreach ( $adv as $key => $item ) { //dump($item); ?>
							<?php if ( isset( $item['url'] ) ) { ?>
                                <img src="<?php echo @$item['url']; ?>" alt="<?php echo @$item['alt']; ?>"
                                     class="bounceIn wow" data-wow-delay="<?php echo $it; ?>s">
                                <p class="fsz_25 f_weight_600 color_blue lh_31 mb-2"><?php echo @$item['title']; ?></p>
                                <p class="txt_bottom"><?php echo @$adv['desc']; ?></p>
							<?php }
						} ?>
                    </div>
				<?php } ?>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="slide_h2 mt-2 mb-2">Врачи клиники</h2>
                    <p>Высокие стандарты сети Клиник «Нева» выстроены таким образом, чтобы пациенты могли получать
                        медицинскую помощь максимально безопасно и без очередей, что актуально особенно в текущем ритме
                        жизни!</p>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <a href="http://abc.loc/doctors/" class="go_more mt-3 color_blue">Все врачи
                        <span>→</span></a>
                </div>
            </div>
            <div class="row mt-4 mb-4 d-none d-md-flex">
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
                <div class="col-md-3 mb-3 mb-md-0 scroll_block" data-wow-delay="0s">
                    <?php echo get_the_post_thumbnail($doctor->ID, '', ['class'=> 'img_bg_gray']); ?>
                    <p class="fsz_25 f_weight_600 color_blue lh_31 mb-2 name_doc"><?php echo $doctor->post_title; ?></p>
                    <p class="p_height30"><?php echo the_field('basic_spec', $doctor->ID ); ?></p>
                    <button class="btn btn-orange d-inline-block pl-5 pr-5 pt-3
                                            pb-3 modal__trigger m-auto">Записаться</button>
                </div>
    <?php } wp_reset_postdata(); ?>

            </div>
            <div class="row d-block d-md-none h500 mt-4">
				<?php echo get_template_part( 'template-parts/slider', 'doc' ); ?>
            </div>
        </div>
    </section>
    <section class="bg_class txt_white reviews pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="slide_h2 mt-2 mb-2 txt_white">Отзывы</h2>
                        <a href="/reviews/" class="go_more txt_white">Все отзывы
                            <span>→</span></a>
                    </div>
                </div>
	            <?php
	            $comments_query = new WP_Comment_Query;
	            $comments = $comments_query->query( 'status=approve&number=3' );
	            if ( $comments ) {
		            foreach ( $comments as $comment ) { ?>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="reviews_home p-3">
                                <div class="rev_name_and_date mb-3">
                                    <img src="<?php echo __PATH_IMG; ?>/userpic.png" alt="icon"
                                         class="userpic mr-3">
                                    <div class="d-flex flex-column">
                                        <span class="comment_name"><?php echo $comment->comment_author; ?></span>
                                        <span class="comment_date d-block d-md-inline-block mt-1"><?php echo
	                                        date('d.m.Y', strtotime($comment->comment_date)); ?></span>
                                    </div>
                                </div>
                                <p class="m-0"><?php echo cutText($comment->comment_content, 200); ?></p>
                            </div>
                        </div>
		            <?php }} ?>
            </div>
        </div>
    </section>

    <section>
		<?php $contacts = get_field( 'contacts' ); ?>
        <div class="container">
            <div class="row">
                <div class="col-12"><h2 class="slide_h2 mt-2 mb-2">Контакты</h2></div>
                <div class="col-md-7">
                    <div id="map" style="width: 100%; height: 400px"></div>
                </div>
                <div class="col-md-5 mt-5 mt-md-0">
                    <div class="row">
                        <div class="col-2 mb-4"><img
                                    src="<?php echo __PATH_IMG; ?>/marker-map.png"
                                    alt="Точка на карте" class="bounceIn wow" data-wow-delay="0s"></div>
                        <div class="col-10 adr mb-4">
                            <p class="adress m-0">Адрес:</p>
                            <p class="m-0"><?php echo $contacts['adress']; ?></p>
                        </div>
                        <div class="col-2 mb-4"><img
                                    src="<?php echo __PATH_IMG; ?>/phone_call.png"
                                    alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.1s"></div>
                        <div class="col-10 adr mb-4">
                            <p class="adress m-0">Номер телефона:</p>
                            <p class="m-0"><?php echo $contacts['phone']; ?></p>
                        </div>
                        <div class="col-2 mb-4"><img src="<?php echo __PATH_IMG; ?>/time.png"
                                                     alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.2s">
                        </div>
                        <div class="col-10 adr mb-4">
                            <p class="adress m-0">График работы:</p>
                            <p class="m-0">Пн. - Пт.: 8.00 - 20.00 </br>
                                Cб. - Вс.: 8.00 - 16.00</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
<?php
get_sidebar();
get_footer();
