<?php
/**
 * ABC Clinic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ABC_Clinic
 */
function dump( $data ) {
	echo '<pre>';
	var_dump( $data );
	echo '</pre>';
}

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define( 'PREFIX_THEME', 'abc_' );
define( '__PATH_IMG', '/wp-content/themes/abc-clinic/img' );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function abc_clinic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ABC Clinic, use a find and replace
		* to change 'abc-clinic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'abc-clinic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'abc-clinic' ),
	) );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'abc_clinic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}

add_action( 'after_setup_theme', 'abc_clinic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function abc_clinic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'abc_clinic_content_width', 640 );
}

add_action( 'after_setup_theme', 'abc_clinic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function abc_clinic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'abc-clinic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'abc-clinic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'abc_clinic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function abc_clinic_scripts() {

	wp_style_add_data( 'abc-clinic-style', 'rtl', 'replace' );

	wp_enqueue_script( 'abc-clinic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'click_slider', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(
		'customize-preview'
	), _S_VERSION, true );
	wp_enqueue_script( 'abc_animate', get_template_directory_uri() . '/js/wow.js', array(
		'customize-preview'
	), _S_VERSION, true );
	wp_enqueue_script( 'abc_imask', get_template_directory_uri() . '/js/imask.js', array(
		'customize-preview'
	), _S_VERSION, true );
	if ( is_front_page() || is_page(13) || is_page(11 )) {
		wp_enqueue_script( 'yaMap', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array(
			'customize-preview'
		), _S_VERSION, true );
		wp_enqueue_script( 'map', get_template_directory_uri() . '/js/map.js', array(
			'customize-preview'
		), _S_VERSION, true );
	}

	if ( in_category( 5 ) ) { // fancybox
		wp_enqueue_script( 'abc-fancybox', get_template_directory_uri() . '/js/fancybox.min.js', array( 'customize-preview' ), _S_VERSION, true );
	}
	wp_enqueue_script( 'abc-clinic-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
	//modal
	wp_enqueue_script( 'abc-clinic-modalnavigation', get_template_directory_uri() . '/js/modal.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'abc_clinic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

function abc_register_styles() {
// grid bootstrap
	wp_enqueue_style( PREFIX_THEME . 'grid_bootstrap', get_template_directory_uri() . '/css/bootstrap-grid.css', array(), _S_VERSION );
	wp_enqueue_style( PREFIX_THEME . 'slick_css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), _S_VERSION );
	if ( in_category( 5 ) ) {
		wp_enqueue_style( PREFIX_THEME . 'fancybox_css', get_template_directory_uri() . '/css/fancybox.min.css', array(), _S_VERSION );
	}
	wp_enqueue_style( PREFIX_THEME . 'animate_css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION );
	wp_enqueue_style( PREFIX_THEME . 'modal_css', get_template_directory_uri() . '/css/modal.css', array(), _S_VERSION );


	wp_enqueue_style( 'abc-clinic-style', get_stylesheet_uri(), array(), _S_VERSION );
}

add_action( 'wp_enqueue_scripts', 'abc_register_styles' );

// remove <meta name="generator"
add_filter( 'the_generator', '__return_empty_string' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
header_remove( 'x-powered-by' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
remove_action( 'wp_body_open', 'gutenberg_global_styles_render_svg_filters' );


// Получаем имена зарегистрированных скриптов
function wpschool_show_script_style_ids() {
	global $wp_scripts, $wp_styles;
	echo "\n" . '<!--' . "\n\n";
	echo 'SCRIPT IDs:' . "\n";
	foreach ( $wp_scripts->queue as $handle ) {
		echo $handle . "\n";
	}
	echo "\n" . 'STYLE IDs:' . "\n";
	foreach ( $wp_styles->queue as $handle ) {
		echo $handle . "\n";
	}
	echo "\n" . '-->' . "\n\n";
}

add_action( 'wp_print_scripts', 'wpschool_show_script_style_ids' );

// Переименовываем пункт меню «Записи» в «Новости»
function wptutsplus_change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[25][0] = 'Отзывы';
	//$submenu['edit-comments.php'][25][0] = 'News Items';
	//$submenu['edit-comments.php'][0][0] = 'Все отзывы';
}

add_action( 'admin_menu', 'wptutsplus_change_post_menu_label' );

// Склонение года, лет
function num2word( $num, $words ) {
	$num = $num % 100;
	if ( $num > 19 ) {
		$num = $num % 10;
	}
	switch ( $num ) {
		case 1:
		{
			return ( $words[0] );
		}
		case 2:
		case 3:
		case 4:
		{
			return ( $words[1] );
		}
		default:
		{
			return ( $words[2] );
		}
	}
}

//echo num2word(50, array('год', 'года', 'лет'));

// Обрезка текста до 200 символов

function cutText( $text, $numsymbol ) {
	$text = strip_tags( $text );
	$text = @mb_substr( $text, 0, $numsymbol );
	$text = trim( $text, "!,.- " );

	return $text . "...";
}

//====================================================================
// Load more reviews
add_action( 'wp_ajax_loadmore', 'true_loadmore' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_loadmore' );
function true_loadmore() {
	$paged   = ! empty( $_POST['paged'] ) ? $_POST['paged'] : 1;
	$last_id = $_POST['last_id'];
	$post_id = $_POST['post_id'];

	$NEXT_ID = 99999999;
	if ( @$_REQUEST['next_id'] > 0 ) {
		$NEXT_ID = (int) @$_REQUEST['next_id'];
	}

	$paged ++;
	$num            = 5;
	$comments_query = new WP_Comment_Query;
	$args           = [
		//'status'    => 'approve',
		//'number'    => $num,
		'order'   => 'ASC',
		'number'  => 1,
		//'offset'    => $paged,
		//'comment_ID' >$last_id,
		'post_id' => $post_id, // Если нужно получить отзывы конкретной записи указать post_id
		'where'   => 'comment_ID > ' . $NEXT_ID,


	];
	global $wpdb;
	//$comments       = $comments_query->query($args); // Основной запрос]=
	if ( isset( $post_id ) ) {
		$comments = $wpdb->get_results( "SELECT * FROM wp_comments WHERE comment_ID < $last_id AND comment_approved = 1 AND comment_post_ID = $post_id ORDER BY comment_ID DESC LIMIT 5" );
	} else {
		$comments = $wpdb->get_results( "SELECT * FROM wp_comments WHERE comment_ID < $last_id AND comment_approved = 1 ORDER BY comment_ID DESC LIMIT 5" );
	}


	$NEXT_ID = (int) $comments[ sizeof( $comments ) - 1 ]->comment_ID;

	$countCo = $comments_query->query( 'status=approve' ); // Запрос без аргументов (получить общее число
	// отзывов)
	$count = count( $countCo ); //количество отзывов

	$countpages = ceil( $count / $num ); //количество страниц отзывов
	//dump($comments);

	//$count = round( count( $comments ));
	if ( $comments ) {
		$STRING = '';
		foreach ( $comments as $comment ) { ?>

            <div class="block_comment mb-3" data-comment_id="<?php echo $comment->comment_ID; ?>"
                 data-count_comment="<?php echo $count; ?>" data-post_id="<?php echo $post_id; ?>">
                <div class="userpic">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/userpic.png" width="41">
                </div>
                <div class="comm ml-3 p-3">
                    <div class="comment_attr d-block d-md-flex justify-content-md-between mb-2">
                        <span class="comment_name"><?php echo $comment->comment_author; ?></span>
                        <span class="comment_date d-block d-md-inline-block"><?php echo date( 'd.m.Y', strtotime( $comment->comment_date ) ); ?></span>
                    </div>
					<?php echo $comment->comment_content; ?>
                </div>
            </div>

			<?php


		}


	} else {

		//echo $num.' last_id: '.$last_id.' post_id: '.$post_id.' '.$countpages.' paged: '.$paged.' NEXT_ID: '.$NEXT_ID;
		$err = [
			'data' => 0,
			'load' => 'Отзывов больше нет.'
		];
		echo json_encode( $err );

	}
	die;
}

// remove field site comment form

//add_filter('comment_form_default_fields', 'remove_comment_form_fields');
//function remove_comment_form_fields($fields) {
//	if(isset($fields['url'])) {
//	unset($fields['url']);
//	}
//	if(isset($fields['email'])) {
//		unset($fields['email']);
//	}
//	if(isset($fields['author'])) {
//		unset($fields['author']);
//	}
//
//return $fields;
//}
function remove_comment_fields( $fields ) {
	unset( $fields['url'] ); // Удаляем URL
	unset( $fields['email'] ); // Удаляем E-mail

	return $fields;
}

add_filter( 'comment_form_default_fields', 'remove_comment_fields' );

// Add phone number field
//
//function add_review_phone_field_on_comment_form() {
//	echo '<p class="comment-form-phone uk-margin-top"><label for="phone">' . __( 'Phone', 'text-domain' ) . '</label><span class="required">*</span><input class="uk-input uk-width-large uk-display-block" type="text" name="phone" id="phone"/></p>';
//}
//add_action( 'comment_form_logged_in_after', 'add_review_phone_field_on_comment_form' );
//add_action( 'comment_form_after_fields', 'add_review_phone_field_on_comment_form' );
//
//
//// Save phone number
//add_action( 'comment_post', 'save_comment_review_phone_field' );
//function save_comment_review_phone_field( $comment_id ){
//	if( isset( $_POST['phone'] ) )
//		update_comment_meta( $comment_id, 'phone', esc_attr( $_POST['phone'] ) );
//}
//
function print_review_phone( $id ) {
	$val   = get_comment_meta( $id, "phone", true );
	$title = $val ? '<strong class="review-phone">' . $val . '</strong>' : '';

	return $title;
}

//
add_filter( 'manage_edit-comments_columns', 'my_add_comments_columns' );

function my_add_comments_columns( $my_cols ) {

	$temp_columns = array(
		'phone' => 'Телефон',
		'card'  => 'Мед. карта',
	);
	$my_cols      = array_slice( $my_cols, 0, 3, true ) + $temp_columns + array_slice( $my_cols, 3, null, true );

	return $my_cols;
}

//
add_action( 'manage_comments_custom_column', 'my_add_comment_columns_content', 10, 2 );

function my_add_comment_columns_content( $column, $comment_ID ) {
	global $comment;
	switch ( $column ) :

		case 'phone' :
		{

			echo get_comment_meta( $comment_ID, 'phone', true );
			break;
		}
		case 'card' :
		{
			echo get_comment_meta( $comment_ID, 'card', true );
			break;
		}
	endswitch;
}

// Send form
add_action( 'wp_ajax_send_form', 'send_form' );
add_action( 'wp_ajax_nopriv_send_form', 'send_form' );
function send_form() {
	$name          = sanitize_text_field( $_POST['name'] );
	$phone         = sanitize_text_field( $_POST['phone'] );
	$card          = sanitize_text_field( $_POST['card'] );
	$comments      = sanitize_text_field( $_POST['comment'] );
	$post_id       = sanitize_text_field( $_POST['post_id'] );
	$agent         = $_SERVER['HTTP_USER_AGENT'];
	$ip            = $_SERVER['REMOTE_ADDR'];
	$arr           = [];
	$flag          = 0;
	$form_position = $_POST['form_position'];
	$pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
	global $comment;

		if ( empty( $name ) ) {
			$arr['name'] = 1;
			$flag        = 1;
		}

		if ( empty( $phone ) ) {
			$arr['phone'] = 1;

			$flag = 1;
		}
		if ( ! preg_match( $pattern_phone, $phone ) ) {
			$arr['phone'] = 1;
			$flag         = 1;
		}
		if ( empty($card) && $form_position == 'reviews' ) {
			$arr['card'] = 1;
			$flag        = 1;
		}
		if (  empty($comments) && $form_position == 'reviews' ) {
			$arr['comments'] = 1;
			$flag            = 1;
		}

		if ( $flag == 0 ) {
			$arr['success'] = 'Данные успешно отправлены!';
			$arr['form_position'] = $form_position;

			if ( $form_position == 'reviews' ) {
			$data           = [
				'comment_post_ID'      => $post_id,
				'comment_author'       => $name,
				'comment_author_email' => '',
				'comment_author_url'   => '',
				'comment_content'      => $comments,
				'comment_type'         => 'comment',
				'comment_parent'       => 0,
				'user_id'              => '',
				'comment_author_IP'    => $ip,
				'comment_agent'        => $agent,
				'comment_date'         => null, // получим current_time('mysql')
				'comment_approved'     => 0,
			];


			wp_insert_comment( wp_slash( $data ) );

			global $wpdb;
			$args        = array(
				'post_id' => $post_id,
				'orderby' => array( 'comment_date' ),
				'order'   => 'DESC',
				'number'  => 1
			);
			$id_comments = get_comments( $args );


// cOMMENT_META

			$wpdb->insert( $wpdb->prefix . 'commentmeta', // Добавляем телефон
				[
					'comment_id' => $id_comments[0]->comment_ID,
					'meta_key'   => 'phone',
					'meta_value' => $phone
				] );
			$wpdb->insert( $wpdb->prefix . 'commentmeta', // добавляем номер мед. карты
				[
					'comment_id' => $id_comments[0]->comment_ID,
					'meta_key'   => 'card',
					'meta_value' => $card
				] );

		}else{
				$arr['form_'] = $form_position;
            }




	}
//    if ($form_position == 'front_page'){
//        $arr['success'] = 'Топ';
//    }
	echo json_encode( $arr );
	file_put_contents(__DIR__ . '/array.txt', $text);
	die;
}

//-----------------
    function linkTxt($link, $text, $boo = null, $class = null){
    if ($boo == true){
        $boo = 'target="_blank"';
    }
    return '<a href="'.$link.'" '.$boo.' class="'.$class.'">'.$text.'</a>';
    }

// Ajax search
add_action('wp_ajax_send_search' , 'data_search');
add_action('wp_ajax_nopriv_send_search','data_search');
function data_search(){
$query = new WP_Query( array( 'posts_per_page' => 10, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'any'
) );
if( $query->have_posts() ) :

while( $query->have_posts() ): $query->the_post(); ?>
<a href="<?php echo the_permalink(); ?>" class="fsz_25 color_cyan2 text_decoration_none
f_weight_600"><?php the_title();?> <span>→</span></a>
<?php endwhile;
wp_reset_postdata();
else:
echo 'По данному запрому ничего не найдено!';
endif;
wp_die();
}




