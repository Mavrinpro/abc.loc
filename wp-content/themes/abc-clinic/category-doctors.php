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
    <section class="bg_doctors">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="slide_h2"><?php single_cat_title(); ?></h1>
                    <p class="mb-5">Врачи АВС клиника – это команда экспертов высочайшего уровня.
                        В этом разделе вы можете узнать мнение наших пациентов о клинике, а также оставить свой отзыв.
                        Мы будем рады услышать ваше мнение — оно поможет нам стать лучше!
                    </p>
                    <button class="btn btn-orange d-block mt-5 pl-5 m-auto m-md-0
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
                <div class="col-12"><h3 class="slide_h2 fsz_25">Врачи клиники</h3></div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- Цикл WordPress -->
                <?php
                    $title = explode(' ', get_the_title());


                    ?>
                    <div class="col-md-6 mb-md-4">
                        <div class="bg_light hover_doc">
                            <div class="row align-items-center">
                                <div class="col-md-6 position-relative order-2 order-md-0">
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid doc_photo">
                                </div>
                                <div class="col-md-6 order-1 order-md-0 mb-5 mb-md-0"><h2 class="f_weight_600
                                color_cyan2 m-0 mt-3 doc_initial"><b><?php echo $title[0] ?></br></b> <span
                                                style="font-size: 18px;"><?php
                                        echo
                                        $title[1]
                                        ?> <?php echo $title[2] ?></span></h2>
                                    <p><?php echo the_field('basic_spec'); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-blue
                                                                                    d-md-inline-block d-block text-center mt-2 pl-md-5
                                                                                         pr-md-5 pt-md-3 pb-md-3 p-5 go_more"
                                       data-link="<?php the_permalink(); ?>">Подробнее
                                    </a>

                                    <div class="row mt-3">
                                        <div class="col-md-5 col-6">
                                            <div class="block_icon">
                                                <p class="fsz_25 f_weight_600 color_cyan2 m-0 ml-2 ml-md-0">
                                                    <span><?php the_field( 'experience' ); ?> <?php echo num2word(
                                                            get_field( 'experience' ), array( 'год', 'года', 'лет' ) ) ?></span></p>
                                            </div>
                                            <span class="block_icon_span d-block mt-2">Стаж работы</span>
                                        </div>
                                        <div class="col-md- col-6">
                                            <div class="block_icon">

                                                <p class="fsz_25 f_weight_600 color_cyan2 m-0 ml-2
                                                                                                ml-md-0">
                                                    <span><?php the_field( 'eye' ); ?></span>+</p>
                                            </div>
                                            <span class="block_icon_span d-block mt-2">Пациентов обследовано</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
				<?php endwhile; else : ?>
                    <p>Записей нет.</p>
				<?php endif; ?>

            </div>
        </div>
    </section>
    <section class="mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 bg_orange pb-4">
                    <h2 class="h2_single color-white">Записаться на прием</h2>

                <form action="" class="w-100 row" method="post">
                <div class="col-md-6">
                    <span style="color: #ffeb3b;" class="before_error"></span>
                    <input type="text" class="input_form mb-3" placeholder="Номер телефона" id="phone" name="phone">
                    <span class="fsz-10 color-white mb-2 d-block">
<svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.69514 9L0 5.14839L1.32941 3.76265L3.69514 6.22854L9.67059 0L11 1.38574L3.69514 9Z" fill="white"/>
</svg>
 Я согласен(на) с соглашением на обработку персональных данных</span>
                </div>
                <div class="col-md-6">
                    <span style="color: #ffeb3b;" class="before_error"></span>
                    <input type="text" class="input_form mb-3" placeholder="Ваши Ф. И. О." name="name">
                    <span class="fsz-10 color-white mb-2 d-block">
 Запись через сайт является предварительной. Для отправки заявки достаточно номера телефона. Наш сотрудник свяжется с Вами для подтверждения записи к специалисту.</span>
                </div>
                    <div class="col-md-6 text-center d-flex justify-content-md-start justify-content-center">
                        <button type="submit" class="btn btn-blue d-inline-block  pl-5 pr-5 pt-3 pb-3
                                               mt-3" data-url="<?php echo admin_url('admin-ajax.php');?>" data-text_btn="Записаться">Записаться
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12"><h3 class="slide_h2 fsz_25">Вы можете оставить свой отзыв на:</h3></div>
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
