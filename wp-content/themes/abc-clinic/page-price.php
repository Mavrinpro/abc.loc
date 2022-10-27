<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ABC_Clinic
 */

get_header();
?>
    <section>
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
        <div class="container pb-5">
            <div class="row">
                <div class="col md-12">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
                        <h1 class="slide_h2"><?php the_title() ?></h1>
						<?php
						the_content();

					endwhile; // End of the loop.
					?>
<!--                    <div class="col-md-6 offset-md-6">-->
<!--                        <input type="search" placeholder="Искать в таблице" style="width: 100%" id="input_search">-->
<!--                    </div>-->
                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 72 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(72) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
		                        <?php $table = get_field( 'oftalmologiya' );
		                        foreach ( $table['body'] as $price ) { ?>
                                        <?php if ($price[0]['c'] != ""){ ?>
                                    <tr>
                                        <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                    </tr>
		                        <?php }else{
                                        echo "";
                                        }
                                    }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 435 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(435) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'ginekologiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 454 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(454) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'deramatovenerologiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 74 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(74) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'terapiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

<!--                    <div class="accord bg_basic">-->
<!--                        <div class="accord_head p-2 mb-2">-->
<!--                            <img src="--><?php //echo get_field( 'icon', 443 )['url'] ?><!--" alt="Карточка-->
<!--                            врача" class="ml-3">-->
<!--                            <span class="m-0 ml-5">--><?php //echo get_the_title(443) ?><!--</span>-->
<!--                            <img src="--><?php //echo __PATH_IMG ?><!--/arrow2.png" alt="" class="ml-auto-->
<!--                                                mr-2 arrow_accordion">-->
<!--                        </div>-->
<!--                        <div class="content">-->
<!--                            <table class="table">-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                    <th>Наименование</th>-->
<!--                                    <th>Стоимость</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--				                --><?php //$table = get_field( 'price' );
//				                foreach ( $table['body'] as $price ) { ?>
<!--                                    <tr>-->
<!--                                        <td>--><?php //echo $price[0]['c']; ?><!--</td>-->
<!--						                --><?php //if ( $price[1]['c'] == 0 ) { ?>
<!--                                            <td>Бесплатно</td>-->
<!--						                --><?php //} else { ?>
<!--                                            <td>--><?php //echo $price[1]['c']; ?><!-- руб.</td>-->
<!--						                --><?php //} ?>
<!--                                    </tr>-->
<!--				                --><?php //} ?>
<!---->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 420 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(420) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'nevrologiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 414 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(414) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'kardiologiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 68 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(68) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'endokrinologiya' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{
		                                echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="accord bg_basic">
                        <div class="accord_head p-2 mb-2">
                            <img src="<?php echo get_field( 'icon', 40 )['url'] ?>" alt="Карточка
                            врача" class="ml-3">
                            <span class="m-0 ml-5"><?php echo get_the_title(40) ?></span>
                            <img src="<?php echo __PATH_IMG ?>/arrow2.png" alt="" class="ml-auto
                                                mr-2 arrow_accordion">
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $table = get_field( 'funkczionalnaya_diagnostika' );
                                foreach ( $table['body'] as $price ) { ?>
	                                <?php if ($price[0]['c'] != ""){ ?>
	                                <?php if ($price[2]['c'] != ""){ ?>
                                        <tr>
                                            <td><?php echo $price[0]['c']; ?></td>

                                            <td><?php echo $price[2]['c']; ?> руб.</td>
                                        </tr>
	                                <?php }else{ ?>
                                            <td class="text-center" colspan="2" style="background: #333; color:
                                            #fff;"><b><?php
                                                    echo
                                                    $price[0]['c'];
                                            ?></b></td>
		                               <?php }
                                    }else{
                                        echo "";
	                                }
                                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>

<!--                    --><?php //echo linkTxt('#', 'Ссылка', true, false); ?>
                    <input type="hidden" id="phone">
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
