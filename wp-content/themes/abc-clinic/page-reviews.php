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
	<section class="bg_reviews">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 class="slide_h2"><?php the_title(); ?></h1>
					<p>Врачи АВС клиника – это команда экспертов высочайшего уровня.
                        В этом разделе вы можете узнать мнение наших пациентов о клинике, а также оставить свой отзыв. Мы будем рады услышать ваше мнение — оно поможет нам стать лучше!
                    </p>
					<a href="#send_review" class="btn btn-blue d-md-inline-block d-block text-center  mt-5 pl-5 m-auto
					m-md-0
                                     pr-5 pt-3 pb-3 go_more scrollto" data-link="http://abc
                                     .loc/services/oftalmologiya/">Оставить отзыв
                    </a>
				</div>
			</div>
		</div>
	</section>
    <section class="comments_doc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 load_text_ajax">
                    <h3 class="slide_h2 fsz_25">Отзывы наших пациентов</h3>
	                <?php
	                $comments_query = new WP_Comment_Query;
                    //dump($comments_query);

                    $paged = 5;
	                //$comments = $comments_query->query( 'status=approve&order=ASC&number='.$paged);
	                $comments = $wpdb->get_results( "SELECT * FROM wp_comments WHERE comment_approved = 1 ORDER BY comment_ID DESC LIMIT $paged");
                    //dump($comments);
	                $countComments  = sizeof($comments_query->query( 'status=approve' ));
	                $pages          = get_comment_pages_count( $countComments );
	                $countCo        = $comments_query->query( 'status=approve' );
                    $ro             = count($countCo);
                    $countpages     = round($countComments / $paged);
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
                                        <span class="comment_date d-block d-md-inline-block"><?php echo
                                            date('d.m.Y', strtotime($comment->comment_date)); ?></span>
                                    </div>
	                                <?php echo $comment->comment_content; ?>
                                </div>
                            </div>
		                <?php }} ?>
                </div>
                <div class="col-12 text-center mb-5 btn_before">
                    <button class="btn btn-orange d-md-inline-block d-block text-center mt-5 pl-5 m-auto
					m-md-0 pr-5 pt-3 pb-3 go_more load_more" data-link="<?php the_title(); ?>" data-url="<?php echo
                    admin_url('admin-ajax.php');
                    ?>" data-maxPaged="<?php echo $countpages; ?>" data-paged="1" data-p="<?php echo
                    $countComments;
                    ?>">Загрузить еще
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="comment_form mb-5" id="send_review">
        <div class="container">
            <div class="row">
                <div class="col-md-6 block_comment_form bg_class p-md-5 p-3 mb-3 mb-md-0">
                    <h3 class="h3 mt-0">Оставить отзыв</h3>
                    <div class="form-group">
                        <form action="" method="post">
                            <input type="hidden" value="reviews" name="form_position">
                            <span style="color: #ef9f72;" class="before_error"></span>
                            <input type="text" class="input_form mb-3" placeholder="Имя" name="name">
                            <span style="color: #ef9f72;" class="before_error"></span>
                            <input type="text" class="input_form mb-3 phone" placeholder="+7 (999) 99-99-99"
                                   name="phone"
                                   id="phone">
                            <span style="color: #ef9f72;" class="before_error"></span>
                            <input type="number" class="input_form mb-3" placeholder="Номер мед. карты" name="card">
                            <input type="hidden" name="post_id" value="<?php echo get_the_ID() ?>">
                            <span style="color: #ef9f72;" class="before_error"></span>
                            <textarea name="comment" placeholder="Ваш отзыв" class="input_form"
                                      rows="5"></textarea>
                            <span class="fsz-10 mt-2 color-white mb-2 d-block">
<svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.69514 9L0 5.14839L1.32941 3.76265L3.69514 6.22854L9.67059 0L11 1.38574L3.69514 9Z" fill="white"/>
</svg>
 Я согласен(на) с соглашением на обработку персональных данных</span>
                            <button type="submit" class="btn btn-orange d-inline-block pl-5 pr-5 pt-3 pb-3
                            mt-3" data-url="<?php echo admin_url('admin-ajax.php');?>" data-text_btn="Оставить отзыв">Оставить отзыв
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 form_img"></div>
                <div class="col-12 bg_cyan p-5">
                    <div class="lock_block">
                        <img src="<?php echo __PATH_IMG; ?>/lock.png"
                                                  alt="lock" class="lock mr-3 mb-3 mb-md-0">
                        <p class="m-0">Ваши персональные данные находятся под надежной защитой и не попадут в открытый
                            доступ, не
                            будут
                            переданы третьим лицам.
                            Уважаемые посетители, большая просьба при написании отзыва, заполнять все поля формы и
                            указывать
                            адрес электронной почты для связи.

                            В противном случае администрация клиники не сможет отреагировать на оставленную информацию и
                            связаться с вами для решения возникших вопросов.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
//$args = array(
//	// Change the title of send button
//	//'label_submit' => __( 'Отправить999', 'textdomain' ),
//	'logged_in_as' => '',
//	'submit_button'=> '',
//	// Change the title of the reply section
//	'title_reply' => '',
//	// Remove "Text or HTML to be displayed after the set of comment fields".
//	'comment_notes_after' => '',
//    'comment_notes_before' => '',
//    'fields ' => [
//	    'author' => '<input type="text" class="input_form mb-3" placeholder="Имя">',
//        'email' => '<input type="text" class="input_form mb-3" placeholder="+7 (999) 99-99-99">',
//        'card' => '<input type="number" class="input_form mb-3" placeholder="Номер мед. карты">'
//    ],
//	// Redefine your own textarea (the comment body).
//	'comment_field' => '<div class="input-group">
//
//                        <textarea name="comment" placeholder="Ваше сообщение" class="input_form mb-3" rows="5">
//                        </textarea>
//                          <button type="submit" class="btn btn-warning">Отправить</button>
//                        </span>
//                      </div>',
//);
//comment_form( $args );
//?>
    <section class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12"><h3 class="slide_h2 fsz_25">Вы также можете оставить свой отзыв на:           </h3></div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="##" class="block_rev_icon p-2">
                        <img src="<?php echo __PATH_IMG; ?>/yandex.png" alt="" class="reviews_icon_services">
                    </a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="##" class="block_rev_icon p-2">
                    <img src="<?php echo __PATH_IMG; ?>/prodoctorov_reviews.png" alt="" class="reviews_icon_services">
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="##" class="block_rev_icon p-2">
                    <img src="<?php echo __PATH_IMG; ?>/2gis2.png" alt=""
                         class="reviews_icon_services">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();
