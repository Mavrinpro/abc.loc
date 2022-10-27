<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ABC_Clinic
 */

?>
<section id="footer" class="p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo get_field('logo_footer', 59)['url']; ?>" alt="<?php echo get_field('logo_footer')
                ['alt']; ?>" class="bounceInLeft wow">
                <p class="licenсes mt-3">
	                <?php echo get_field('txt_licences', 59); ?>
                </p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <h3>Пациентам</h3>
                <p>Вопросы и ответы</p>
                <p>Справочник</p>
            </div>
            <div class="col-md-2">
                <h3>Клиника</h3>
                <p>Новости компании</p>
                <p>Акции</p>
                <p>Цены</p>
            </div>
            <div class="col-md-3">
                <h3>Подпишись на нас</h3>
                <div class="row align-items-center">
                    <div class="social d-flex flex-column col-3">
                        <a href="##"><img src="<?php echo __PATH_IMG; ?>/vk.png" alt=""
                                          class="mb-3"></a>
                        <a href="##"><img src="<?php echo __PATH_IMG; ?>/ok.png" alt="" class=""></a>
                    </div>
                    <div class="col-6">
                        <a href="##"><img src="<?php echo __PATH_IMG; ?>/prodoctorov.png" alt=""
                                          class=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 txt_warning">
                ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ. НЕОБХОДИМО ПРОКОНСУЛЬТИРОВАТЬСЯ СО СПЕЦИАЛИСТОМ.
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row txt_bottom p-3 justify-content-between">
            <div class="col-md-6"><?php echo date('Y'); ?> © Сеть клиник «ABC Клиника» Все права защищены</div>
            <div class="col-md-3">
                <a href="##">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</section>
<!--Modal-->
<div id="modal-1" class="slickModal">
    <div class="window">
        <!-- Your popup content -->

        <div class="form_group"><h3 class="m-0">Записаться на прием</h3>
            <p class="mb-2 text-white">Познакомьтесь с врачом и узнайте
                стоимость лечения</p>
            <form action="" method="post">
                <input type="hidden" value="front_page" name="form_position">
                <span style="color: #ef9f72;" class="before_error"></span>
                <input type="text" class="input_form" placeholder="Имя" name="name">
                <span style="color: #ef9f72;" class="before_error"></span>
                <input type="text" class="input_form" placeholder="+7 (999) 99-99-99" id="modalPhone" name="phone">
                <input type="hidden" name="post_id" value="<?php echo get_the_ID() ?>">
                <button type="submit" class="btn btn-orange d-inline-block pl-5 pr-5 pt-3 pb-3" data-url="<?php echo
                admin_url('admin-ajax.php');?>" data-text_btn="Записаться">Записаться
                </button>
            </form>
            <span class="fsz-10 mt-2">Нажимая на кнопку вы соглашаетесь с Политикойs
                                конфиденциальности</span>
        </div>

    </div>
</div>
<!--Modal end-->
<?php wp_footer(); ?>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
        },
    });
</script>
<script>
    var element2 = document.getElementById('modalPhone');
    var maskOptions2 = {
        mask: '+7(000)000-00-00',
        lazy: false
    }
    var mask2 = new IMask(element2, maskOptions2);
</script>
<script>
    function fetchResult(){
        var keyword = jQuery('.livesearch_input').val();
        var url = jQuery('#livesearch').data('url');
        console.log(keyword);
        if(keyword === "" || keyword.length <= 3){
            jQuery('#search').html("");
        } else {
            jQuery.ajax({
                url: url,
                type: 'post',
                data: {
                    action: 'send_search',
                    keyword: keyword
                },
                beforeSend: function (){
                    jQuery('#search').html('Поиск...');
                },
                success: function(data) {
                    jQuery('#search').html( data );
                    console.log(data);
                }
            });
        }
    }
</script>
</body>
</html>
