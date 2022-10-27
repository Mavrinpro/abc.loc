<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ABC_Clinic
 */
require_once 'vendor/phpexcel/PHPExcel.php';

get_header();
if ( in_category( 5 ) ) {
	echo get_template_part( 'template-parts/doc' );
} else {

	?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-3">', '</p>' );
					}
					?>
                </div>
                <div class="col md-12">

					<?php
					while ( have_posts() ) :
						the_post(); ?>
					<?php endwhile; // End of the loop.
					?>
                    <input type="hidden" id="phone">
                </div>
            </div>
        </div>
    </section>
    <section class="bg_reviews" style="background: url('<?php the_post_thumbnail_url(); ?> '); background-repeat:
            no-repeat; background-position: 800px 0; height: 540px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="slide_h2"><?php the_title(); ?></h1>
                    <p>Врачи АВС клиника – это команда экспертов высочайшего уровня.
                        В этом разделе вы можете узнать мнение наших пациентов о клинике, а также оставить свой отзыв. Мы будем рады услышать ваше мнение — оно поможет нам стать лучше!
                    </p>
                    <button class="btn btn-orange d-md-inline-block d-block text-center modal__trigger mt-5 pl-5 m-auto
					m-md-0
                                     pr-5 pt-3 pb-3 go_more scrollto" data-link="http://abc
                                     .loc/services/oftalmologiya/">Записаться
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accord bg_basic">
                        <div class="accord_head p-2">
                            <img src="<?php echo get_field( 'icon' )['url'] ?>" alt="Карточка
                            врача">
                            <span class="m-0 ml-3">Об услуге</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo get_field( 'image' ) ?>" alt="image" class="img-fluid h100">
                </div>
                <div class="col-md-5 offset-md-2 align-self-center">
					<?php echo get_field( 'about' ) ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg_cyan p-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="color_cyan2"><?php echo get_field( 'second_block' )['title'] ?></h3>
                    <p><?php echo get_field( 'second_block' )['desc'] ?></p>
                </div>
                <div class="col-md-6">
					<?php echo get_field( 'second_block' )['list1'] ?>
                </div>
                <div class="col-md-6">
					<?php echo get_field( 'second_block' )['list2'] ?>
                </div>
                <div class="col-12">
                    <p><?php echo get_field( 'second_block' )['desc2'] ?></p>
                </div>
            </div>
        </div>
    </section>
	<?php $s = get_field( 'blok3' );
	//dump( $s );


    $new_arr = [];
    if(isset($s) && sizeof($s) > 0) {
	    $i = 0;
	    foreach($s['icons'] as $res) { $i++; $new_arr[$i]['icons'] = $res; }
	    $i = 0;
	    foreach($s['titles'] as $res) { $i++; $new_arr[$i]['titles'] = $res; }
	    $i = 0;
	    foreach($s['descriptions'] as $res) { $i++; $new_arr[$i]['descriptions'] = $res; }
    }
//    echo '<pre>';
//    print_r($new_arr);
//	echo '</pre>';
    $iter = 0;
	foreach($new_arr as $item){
		if(empty($item)){
			$iter++;
		}
	}
    $notEmpty =  sizeof(array_filter($s['icons']));
if ($notEmpty > 3){
    $col = 'col-md-3';
}else if($notEmpty == 3){
	$col = 'col-md-4';
}
else{
    $col = 'col-md-6';
}
    ?>
    <section class="p-lg-5 mt-5">
        <div class="container">
            <div class="row">
				<?php if(isset($s) && sizeof($s) > 0) {?>

					<?php foreach($new_arr as $k => $res) { ?>
			<?php if($res['icons'] != "") { ?>
                        <div class="<?php echo $col; ?>">
                            <img src="<?php echo  $res['icons'] ?>" alt="icon">
                            <h3 class="color_cyan2"><?php echo$res['titles']; ?></h3>
				<?php if($res['descriptions'] != "") { ?>
                            <p><?php echo $res['descriptions']; ?></p>
				<?php } ?>
                        </div>
					<?php } } ?>

				<?php  } ?>


                <!--                <div class="col-md-6">-->
                <!--                    <img src="-->
				<?php //echo get_field( 'blok3' )['icon2']['url'] ?><!--" alt="icon">-->
                <!--                    <h3 class="color_cyan2">-->
				<?php //echo get_field( 'blok3' )['title2'] ?><!--</h3>-->
                <!--                    <p>--><?php //echo get_field( 'blok3' )['sesc2'] ?><!--</p>-->
                <!--                </div>-->

            </div>
        </div>
    </section>



    <?php if (is_single(70)){
        $file = get_field('analianalize_priceze_price', 70);
        //dump($file);
       //echo ABSPATH;
//        $link = $file['link'];
//        $fileName = $file['filename'];



//        $excel = PHPExcel_IOFactory::load(ABSPATH.'/price.xls');
//       //$value =  $excel->getActiveSheet()->getCell('D8');
//		foreach ( $excel->getWorksheetIterator() as $item ) {
//            $title = $item->getTitle();
//            $lastRow = $item->getHighestRow();
//            $lastColumn = $item->getHighestColumn();
//            $lastColumnIndex = PHPExcel_Cell::stringFromColumnIndex($lastColumn);
//            echo $title. '<table border="1"> <tr>';
//
//            for ($row = 1; $row <= $lastRow; ++$row){
//                echo '<tr>';
//	            for ($col =0; $col < $lastColumnIndex; ++ $col){
//		            $val = $item->getCellByColumnAndRow($col, $row)->getValue();
//		            echo '<td>'.$val.'</td>td>';
//	            }
//                echo '</tr>';
//
//            }
//            echo '<table>';
//
//     }
		$id = '13guC8rpke-of5E0I3313ix7WiGiNsIg9z3JfdhI8200';
		$gid = '0';
		$range = 'A1:D900';
		//header('Content-Type: text/html; charset=utf-8');
		$csv = @file_get_contents('https://docs.google.com/spreadsheets/d/' . $id . '/export?format=csv&range=' .
                                  $range);
        $csv = explode("\r\n", $csv);
		$array = array_map('str_getcsv', $csv);


		$analize = get_field( 'anaanalizelize', 70 ); //dump($analize);  ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ( $analize as $item ) { ?>
                        <div class="accord bg_basic mb-2">
                            <div class="accord_head p-2">
                                <span class="m-0 ml-3"><?php echo $item['caption'] ?></span>
                                <img src="/wp-content/themes/abc-clinic/img/arrow2.png" alt="" class="ml-auto mr-2 arrow_accordion">
                            </div>
                            <div class="content" style="display: none;">
                                <div class="col-md-6 offset-md-6 mb-3 mt-3">
                                    <input type="search" placeholder="Искать в таблице" style="width: 100%" id="input_search">
                                </div>
                                <table class="table mt-2">
                                    <thead>
                                    <tr>
                                        <th class="p-md-3 ">Наименование</th>
                                        <th class="p-md-3 ">Описание</th>
                                        <th class="p-md-3 ">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<!--                                    --><?php //$table = get_field( 'anaanalizelize' )['4'];
//                                    foreach ( $table['body'] as $price ) { ?>
<!--	                                    --><?php //if ($price[1]['c'] != ""){ ?>
<!---->
<!--                                            <tr>-->
<!--                                                --><?php //if ($price[2]['c'] != "" && $price[3]['c'] != ""){ ?>
<!--                                                <td>--><?php //echo $price[1]['c']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $price[2]['c']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $price[3]['c']; ?><!-- руб.</td>-->
<!---->
<!--                                            --><?php //}else{ ?>
<!--                                                    <td class="text-center" colspan="3" style="background: #333; color:-->
<!--                                            #fff;"><b>--><?php //echo $price[1]['c']; ?><!--</b></td>-->
<!--                                               --><?php //}
//
//                                        }else{
//		                                    echo "";
//	                                    }
//                                    }?>
<?php
//$i = 0;

//echo '<pre>';
//var_dump($array);
unset($array[0]);
foreach ($array as $arr){


	$html .= '<tr>';
    if ($arr[0] != "" && $arr[3] != "") {
	    $html .= '<td scope="col">' . $arr[1] . '</td>';
	    $html .= '<td scope="col">' . $arr[2] . '</td>';
	    $html .= '<td scope="col">' . @number_format( $arr[3], 0, ',', ' ' )
                     . '</td>';
    }else{
	    $html .= '<td scope="col" colspan="3" class="text-center" style="background: #333; color: #fff;"><b>' .
                 $arr[1] . '</b></td>';
    }
	//$html .= '<td scope="row">'.$i.'</td>';
//	foreach ($arr as $key => $td) {
//unset($key[0]);
//if ($arr[3] != ""){
//	$html .= '<td scope="col">' . $arr[1] . '</td>';
//	$html .= '<td scope="col">' . $arr[2] . '</td>';
//}else{
//	$html .= '<td class="text-center" style="background: #333; color: #fff;"><b>' . $td. '</b></td>';
//}
//
//
//
//	}

}
echo $html;
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
        </section>
	<?php } else{ ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="accord bg_basic">
                            <div class="accord_head p-2 bg_blue">
                                <img src="<?php echo __PATH_IMG ?>/price.png" alt="Карточка
                            врача">
                                <span class="m-0 ml-3">Цены</span>
                            </div>
                        </div>
                    </div>

                    <?php
                    $is_page = '';
                    $arr_service = [
                        72  => 'oftalmologiya',
                        435 => 'ginekologiya',
                        454 => 'deramatovenerologiya',
                        74  => 'terapiya',
                        420 => 'nevrologiya',
                        414 => 'kardiologiya',
                        68  => 'endokrinologiya',
                        40  => 'funkczionalnaya_diagnostika'
                    ];
//                    switch (get_the_id()){
//                        case 72:
//	                        $is_page = 'oftalmologiya';
//                            break;
//	                    case 435:
//		                    $is_page = 'ginekologiya';
//		                    break;
//	                    case 454:
//		                    $is_page = 'deramatovenerologiya';
//		                    break;
//	                    case 74:
//		                    $is_page = 'terapiya';
//		                    break;
//	                    case 420:
//		                    $is_page = 'nevrologiya';
//		                    break;
//	                    case 414:
//		                    $is_page = 'kardiologiya';
//		                    break;
//	                    case 68:
//		                    $is_page = 'endokrinologiya';
//		                    break;
//                            case 40:
//	                    $is_page = 'funkczionalnaya_diagnostika';
//	                    break;



                    ?>

					<?php $price = get_field( $arr_service[get_the_id()], 252 ); ?>
                    <table class="table mt-5 ">
                        <thead>
                        <tr>
                            <th class="p-md-3 ">Наименование</th>
                            <th class="p-md-3 ">Акция</th>
                            <th class="p-md-3 ">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
						foreach ( $price['body'] as $price ) {
                            if (isset($price)){
                            ?>
                            <tr>
                                <td class="p-md-3 "><?php echo $price[0]['c']; ?></td>
                                <td class="p-md-3"><?php echo $price[1]['c'] ? $price[1]['c'] . ' руб.' : ""; ?> </td>
                                <td class="p-md-3 "><?php echo $price[2]['c']; ?> руб.</td>
                            </tr>
						<?php } }?>

                        </tbody>
                    </table>
                    <div class="col-md-12 text-center">
                        <a href="/price" class="btn btn-orange d-inline-block mt-5 pl-5 m-auto m-md-0
                                     pr-5 pt-3 pb-3 go_more " data-link="/price<">Все цены
                        </a>
                    </div>
                </div>
            </div>
        </section>
	<?php }?>

    <?php if (!is_single(70) ){ // если запись не Анализы ?>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="accord bg_basic">
                        <div class="accord_head p-2">
                            <img src="<?php echo __PATH_IMG ?>/spec_icon.png" alt="Карточка
                            врача">
                            <span class="m-0 ml-3">Специалисты направления</span>
                        </div>
                    </div>
                </div>

				<?php $doc = get_field( 'speczialisty' );
				if ( $doc ) {
					foreach ( $doc as $item ) { ?>
                        <div class="col-md-6 mb-md-3 mt-md-3">
                            <div class="bg_light hover_doc">
                                <div class="row">
                                    <div class="col-md-6 position-relative order-2 order-md-0">
                                        <img src="<?php echo get_the_post_thumbnail_url( $item->ID ) ?>"
                                             class="img-fluid doc_photo">
                                    </div>
                                    <div class="col-md-6 order-1 order-md-0 mb-5 mb-md-0"><h2 class="fsz_25 f_weight_600
                            color_cyan2 m-0 mt-3 doc_initial"><?php echo $item->post_title; ?></h2>
                                        <p><?php echo get_field( 'basic_spec', $item->ID ); ?></p>
                                        <a href="<?php echo $item->guid; ?>" class="btn btn-blue
                                                                                    d-md-inline-block d-block text-center mt-2 pl-md-5
                                                                                         pr-md-5 pt-md-3 pb-md-3 p-5 go_more"
                                           data-link="<?php echo $item->guid; ?>">Подробнее
                                        </a>
										<?php $y = get_field( 'experience', $item->ID ); ?>
                                        <div class="row mt-3">
                                            <div class="col-md-5 col-6">
                                                <div class="block_icon">
                                                    <p class="fsz_25 f_weight_600 color_cyan2 m-0 ml-2 ml-md-0">
                                                <span><?php
	                                                echo $y . ' ' . num2word( $y, array(
			                                                'год',
			                                                'года',
			                                                'лет'
		                                                ) ); ?></span>
                                                    </p>
                                                </div>
                                                <span class="block_icon_span">Стаж работы</span>
                                            </div>
                                            <div class="col-md- col-6">
                                                <div class="block_icon">

                                                    <p class="fsz_25 f_weight_600 color_cyan2 m-0 ml-2
                                                                                                ml-md-0">
                                                        <span><?php echo get_field( 'eye', $item->ID ); ?></span>+</p>
                                                </div>
                                                <span class="block_icon_span">Пациентов обследовано</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }
				} ?>
            </div>
        </div>
    </section>
        <?php } ?>
    <section class="mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg_orange p-4">
                    <h2 class="h2_single color-white">Записаться на прием</h2>

                    <form action="" class="w-100 row" method="post">
                        <div class="col-md-6">
                            <span style="color: #ffeb3b;" class="before_error"></span>
                            <input type="text" class="input_form mb-3" placeholder="Номер телефона" id="phone"
                                   name="phone">
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
                                               mt-3" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>"
                                    data-text_btn="Записаться">Записаться
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
	<?php
}
get_sidebar();
get_footer();
