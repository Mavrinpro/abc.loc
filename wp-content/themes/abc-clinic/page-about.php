<?php get_header(); ?>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-3">', '</p>' );
					}
					?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg_reviews" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="slide_h2"><?php the_title(); ?></h1>
					<?php the_content(); ?>
                    <button class="btn btn-orange d-inline-block mt-5 pl-5 m-auto m-md-0
                                     pr-5 pt-3 pb-3 go_more modal__trigger " data-link="http://abc
                                     .loc/services/oftalmologiya/<">Записаться
                        <span style="left: 158.5px; top: 45.5625px;"></span></button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Видео</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="advantages" class="mb-5 pb-5">
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
				<?php $advantages = get_field( 'advantages', 59 );
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
                <div class="col-md-12">
                    <h2 class="slide_h2">Фотогалерея</h2>
                </div>
                <div class="col-md-3">фото</div>
                <div class="col-md-3">фото</div>
                <div class="col-md-3">фото</div>
                <div class="col-md-3">фото</div>
            </div>
        </div>
    </section>
    <section class="comments_doc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 load_text_ajax">
                    <h3 class="slide_h2">Отзывы о клинике</h3>
					<?php
					$comments_query = new WP_Comment_Query;
					//dump($comments_query);

					$paged = 5;
					//$comments = $comments_query->query( 'status=approve&order=ASC&number='.$paged);
					$comments = $wpdb->get_results( "SELECT * FROM wp_comments WHERE comment_approved = 1 ORDER BY comment_ID DESC LIMIT $paged" );
					//dump($comments);
					$countComments = sizeof( $comments_query->query( 'status=approve' ) );
					$pages         = get_comment_pages_count( $countComments );
					$countCo       = $comments_query->query( 'status=approve' );
					$ro            = count( $countCo );
					$countpages    = round( $countComments / $paged );
					//echo end($comments)->comment_ID.'trtr';
					if ( $comments ) {
						foreach ( $comments as $comment ) { ?>
                            <div class="block_comment mb-3" data-comment_id="<?php echo $comment->comment_ID; ?>"
                                 data-count_comment="<?php echo $ro; ?>">
                                <div class="userpic">
                                    <img src="<?php echo __PATH_IMG; ?>/userpic.png" width="41">
                                </div>
                                <div class="comm ml-3 p-3">
                                    <div class="comment_attr d-block d-md-flex justify-content-md-between mb-2">
                                        <span class="comment_name"><?php echo $comment->comment_author; ?></span>
                                        <span class="comment_date d-block d-md-inline-block"><?php echo date( 'd.m.Y', strtotime( $comment->comment_date ) ); ?></span>
                                    </div>
									<?php echo $comment->comment_content; ?>
                                </div>
                            </div>
						<?php }
					} ?>
                </div>
                <div class="col-12 text-center mb-5 btn_before">
                    <button class="btn btn-orange d-md-inline-block d-block text-center mt-5 pl-5 m-auto
					m-md-0 pr-5 pt-3 pb-3 go_more load_more" data-link="<?php the_title(); ?>"
                            data-url="<?php echo admin_url( 'admin-ajax.php' );
					        ?>" data-maxPaged="<?php echo $countpages; ?>" data-paged="1"
                            data-p="<?php echo $countComments;
					        ?>">Загрузить еще
                    </button>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" id="phone">
    <section class="mb-5">
		<?php $contacts = get_field( 'contacts', 59 ); ?>
        <div class="container">
            <div class="row">
                <div class="col-12"><h2 class="slide_h2 mt-2 mb-2">Контакты</h2></div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="d-flex">
                    <img src="<?php echo __PATH_IMG; ?>/location2.png"
                            alt="Точка на карте" class="bounceIn wow" data-wow-delay="0s">

                        <div class="ml-3 d-flex flex-column justify-content-around">
                    <p class="adress m-0">Адрес:</p>
                    <p class="m-0"><?php $adr =  explode(',',$contacts['adress']); echo $adr[0].',</br>'. $adr[1] ?></p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="d-flex">
                    <img src="<?php echo __PATH_IMG; ?>/call2.png"
                            alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.1s">

                        <div class="ml-3 d-flex flex-column justify-content-around">
                    <p class="adress m-0">Номер телефона:</p>
                    <p class="m-0"><?php echo $contacts['phone']; ?></p>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="d-flex">
                    <img src="<?php echo __PATH_IMG; ?>/clock2.png"
                                             alt="Точка на карте" class="bounceIn wow" data-wow-delay="0.2s">

                        <div class="ml-3 d-flex flex-column justify-content-around">
                    <p class="adress m-0">График работы:</p>
                    <p class="m-0">Пн. - Пт.: 8.00 - 20.00 </br>
                        Cб. - Вс.: 8.00 - 16.00</p>
                </div>
                </div>
                </div>
            </div>
            <input type="hidden" id="phone">
            <div class="row">
                <div class="col-md-12">
                    <div id="map" style="width: 100%; height: 400px"></div>
                </div>
            </div>
        </div>
        </div>
    </section>

<?php get_footer();

