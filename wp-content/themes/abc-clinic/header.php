<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ABC_Clinic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="preloader"></div>
<div class="overlays"></div>
<?php wp_body_open(); ?>
<div id="block-search">
    <?php echo get_search_form(); ?>
    <span class="close_search_block">&#10006;</span>
</div>
<section class="main_page">
    <div class="container">
        <div class="row">
            <header id="masthead" class="col-md-12">
                <div class="site-branding">

                        <?php
                        the_custom_logo();
                        echo get_template_part('inc/header-menu');
                        $contacts = get_field('contacts', 59);
                        ?>

                    <div class="phone">
                        <div class="block_ph d-none d-md-block">
                            <svg class="svg_phone" width="21" height="21" viewBox="0 0 21 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.7013 9.23215C18.876 5.03926 15.5992 1.77842 11.4748 0.0509549C11.1304 -0.0925251 10.7399 0.0772151 10.5999 0.431919C10.4602 0.786623 10.6258 1.1908 10.9694 1.33466C14.7722 2.92817 17.7937 5.93363 19.4758 9.7996C19.5866 10.0569 19.8324 10.2095 20.0893 10.2095C20.1803 10.2095 20.2739 10.1897 20.363 10.1482C20.7021 9.99179 20.8532 9.58191 20.7013 9.23215Z"
                                      fill="#288791"/>
                                <path d="M10.6156 5.0321C12.9215 5.99574 14.7544 7.81454 15.7747 10.1555C15.8828 10.4033 16.1199 10.5502 16.3677 10.5502C16.4568 10.5502 16.5466 10.5311 16.6333 10.4908C16.9599 10.3397 17.1064 9.94429 16.9591 9.60747C15.8006 6.95138 13.7215 4.8871 11.1038 3.79292C10.7712 3.65477 10.3933 3.8188 10.2578 4.16132C10.1238 4.50347 10.2837 4.89357 10.6159 5.03248L10.6156 5.0321Z"
                                      fill="#288791"/>
                                <path d="M18.8856 17.2747C18.7174 17.4436 18.5465 17.6103 18.3753 17.7763C18.0225 18.1192 17.6571 18.4739 17.3092 18.8632C16.9743 19.2385 16.585 19.3983 16.0073 19.3983C15.946 19.3983 15.8836 19.396 15.8181 19.393C14.7262 19.3329 13.6218 19.0063 12.2357 18.3338C9.56475 17.0353 7.22226 15.202 5.27405 12.8858C3.71671 11.0358 2.61073 9.19868 1.89257 7.26228C1.4724 6.14526 1.31256 5.29085 1.37307 4.4962C1.40504 4.08973 1.53901 3.79516 1.80998 3.53865C2.16392 3.20221 2.50569 2.8574 2.84783 2.51183C3.06477 2.29186 3.28284 2.07226 3.50586 1.85304C3.62651 1.73392 3.71328 1.70195 3.74639 1.70195C3.77988 1.70195 3.86894 1.73392 3.9892 1.85152C4.28948 2.14495 4.58482 2.44295 4.88015 2.74056L5.32809 3.19041C5.55074 3.41572 5.77338 3.63836 5.99602 3.86024C6.21029 4.07527 6.42532 4.28954 6.64187 4.50875C6.89229 4.76146 6.87821 4.80561 6.64529 5.03967L6.4158 5.27106C5.95035 5.74146 5.48604 6.21034 4.9947 6.68531C4.46303 7.21775 4.32564 7.92145 4.61755 8.61715C5.00155 9.52979 5.54122 10.3983 6.31723 11.3513C7.73643 13.0924 9.21271 14.4332 10.8367 15.4547C11.1042 15.6206 11.3748 15.7542 11.613 15.8715C11.7424 15.9346 11.8722 15.9982 11.9811 16.0572C12.2574 16.2136 12.5481 16.2935 12.8431 16.2935C13.1643 16.2935 13.6408 16.1961 14.0857 15.7382C14.6235 15.1868 15.1707 14.6445 15.739 14.08C15.8596 13.9609 15.946 13.929 15.9745 13.929C16.0046 13.929 16.0929 13.9617 16.212 14.0793C17.1083 14.971 18.0049 15.8619 18.8951 16.7575C19.1018 16.9649 19.1239 17.0322 18.8849 17.2747H18.8856ZM17.173 13.1141C16.8042 12.7499 16.3894 12.5676 15.9749 12.5676C15.5605 12.5676 15.1468 12.7503 14.7803 13.1141C14.2208 13.6686 13.6613 14.2235 13.111 14.7879C13.0193 14.8823 12.9356 14.9322 12.8431 14.9322C12.7845 14.9322 12.7221 14.9124 12.6505 14.872C12.289 14.6745 11.9034 14.5147 11.5563 14.2981C9.9343 13.2785 8.57561 11.967 7.37297 10.4911C6.77507 9.75776 6.24454 8.97262 5.87271 8.08928C5.79773 7.91117 5.8122 7.79319 5.9572 7.64743C6.51666 7.10662 7.06203 6.55249 7.61274 5.9976C8.37847 5.22654 8.37847 4.32455 7.60779 3.54854C7.17012 3.10707 6.73321 2.67472 6.2963 2.2321C5.84493 1.78149 5.3985 1.32479 4.94256 0.878369C4.57454 0.51986 4.1597 0.339844 3.74677 0.339844C3.33155 0.339844 2.9171 0.521001 2.55022 0.882936C1.98581 1.43745 1.44538 2.0068 0.871844 2.55179C0.34093 3.05493 0.0729992 3.67071 0.0162923 4.38963C-0.0727642 5.56031 0.213815 6.66514 0.618756 7.74105C1.44576 9.96937 2.70549 11.948 4.23316 13.7619C6.29668 16.2155 8.75943 18.1569 11.6412 19.5574C12.9386 20.1869 14.2828 20.6718 15.7439 20.7513C15.8333 20.7559 15.9209 20.7589 16.0073 20.7589C16.9028 20.7589 17.6856 20.4845 18.3246 19.769C18.8038 19.2328 19.3442 18.7441 19.8519 18.2322C20.604 17.4707 20.6089 16.5489 19.8614 15.7969C18.9686 14.8991 18.0708 14.0058 17.173 13.113V13.1141Z"
                                      fill="#288791"/>
                            </svg>
                            <a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a>
                        </div>
                        <a href="tel:<?php echo $contacts['phone']; ?>" class="btn-orange btn-circle order-3
                        d-md-none d-flex mr-2">
                            <svg class="svg_pen" width="15" height="15" viewBox="0 0 15 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.1274 7.13368C12.8818 4.27229 10.6455 2.04698 7.83089 0.868086C7.59584 0.77017 7.32936 0.886007 7.23379 1.12807C7.13847 1.37013 7.25145 1.64596 7.48598 1.74414C10.0811 2.8316 12.1431 4.88265 13.2911 7.52093C13.3667 7.6965 13.5344 7.80065 13.7098 7.80065C13.7718 7.80065 13.8357 7.78714 13.8965 7.75883C14.1279 7.65209 14.231 7.37236 14.1274 7.13368Z" fill="white"/>
                                <path d="M7.24448 4.26744C8.81815 4.92506 10.069 6.16629 10.7653 7.76385C10.8391 7.93293 11.0009 8.03319 11.17 8.03319C11.2307 8.03319 11.292 8.0202 11.3512 7.99267C11.5741 7.88956 11.6741 7.61971 11.5736 7.38985C10.783 5.57723 9.36409 4.16849 7.57771 3.42178C7.35071 3.3275 7.0928 3.43944 7.00034 3.67319C6.90892 3.90669 7.018 4.1729 7.24474 4.2677L7.24448 4.26744Z" fill="white"/>
                                <path d="M12.8883 12.6222C12.7735 12.7375 12.6568 12.8513 12.54 12.9645C12.2992 13.1985 12.0499 13.4406 11.8125 13.7063C11.5839 13.9624 11.3182 14.0715 10.924 14.0715C10.8821 14.0715 10.8395 14.0699 10.7949 14.0678C10.0497 14.0268 9.296 13.804 8.35009 13.345C6.52734 12.4588 4.92874 11.2077 3.59921 9.62706C2.53642 8.36454 1.78166 7.11085 1.29156 5.78937C1.00482 5.02708 0.89574 4.444 0.937036 3.9017C0.958853 3.62431 1.05028 3.42328 1.2352 3.24823C1.47674 3.01863 1.70998 2.78332 1.94347 2.54749C2.09151 2.39737 2.24033 2.24751 2.39253 2.09791C2.47486 2.01662 2.53408 1.9948 2.55668 1.9948C2.57953 1.9948 2.64031 2.01662 2.72238 2.09687C2.9273 2.29712 3.12885 2.50048 3.3304 2.70359L3.63609 3.01058C3.78803 3.16434 3.93997 3.31628 4.09191 3.4677C4.23813 3.61444 4.38488 3.76067 4.53266 3.91027C4.70356 4.08272 4.69395 4.11285 4.535 4.27258L4.37838 4.4305C4.06074 4.75152 3.74388 5.0715 3.40857 5.39563C3.04574 5.75899 2.95198 6.23922 3.15119 6.71399C3.41325 7.33681 3.78154 7.9295 4.31112 8.57985C5.27963 9.76809 6.2871 10.6831 7.39534 11.3802C7.57793 11.4934 7.76259 11.5846 7.92518 11.6646C8.01349 11.7077 8.10205 11.7511 8.17633 11.7913C8.36489 11.8981 8.56332 11.9526 8.76461 11.9526C8.98382 11.9526 9.30899 11.8861 9.61261 11.5737C9.9796 11.1974 10.3531 10.8272 10.7409 10.4421C10.8232 10.3608 10.8821 10.339 10.9016 10.339C10.9221 10.339 10.9824 10.3613 11.0637 10.4416C11.6753 11.0501 12.2873 11.6581 12.8947 12.2692C13.0358 12.4108 13.0508 12.4568 12.8877 12.6222H12.8883ZM11.7195 9.7829C11.4678 9.53434 11.1847 9.40993 10.9019 9.40993C10.619 9.40993 10.3367 9.5346 10.0866 9.7829C9.70481 10.1613 9.32302 10.54 8.94745 10.9252C8.88486 10.9896 8.82772 11.0236 8.76461 11.0236C8.72461 11.0236 8.68202 11.0101 8.63319 10.9826C8.38645 10.8478 8.12335 10.7387 7.88648 10.5909C6.77954 9.8951 5.85232 9.00009 5.03159 7.99288C4.62356 7.49239 4.26151 6.95658 4.00776 6.35375C3.95659 6.2322 3.96646 6.15169 4.06542 6.05222C4.44721 5.68315 4.8194 5.30499 5.19522 4.92631C5.71778 4.40011 5.71778 3.78456 5.19184 3.25498C4.89316 2.9537 4.59499 2.65866 4.29683 2.3566C3.9888 2.04908 3.68414 1.73741 3.37299 1.43276C3.12184 1.1881 2.83874 1.06525 2.55694 1.06525C2.27358 1.06525 1.99074 1.18888 1.74036 1.43587C1.35519 1.81429 0.986383 2.20284 0.594979 2.57476C0.232663 2.91812 0.0498174 3.33835 0.0111185 3.82897C-0.049657 4.62789 0.145915 5.38187 0.422262 6.11611C0.986643 7.63679 1.84633 8.9871 2.88886 10.2249C4.29709 11.8994 5.97777 13.2242 7.9444 14.18C8.8298 14.6096 9.74715 14.9405 10.7442 14.9948C10.8053 14.9979 10.865 15 10.924 15C11.5351 15 12.0693 14.8127 12.5054 14.3244C12.8324 13.9585 13.2012 13.625 13.5477 13.2757C14.0609 12.756 14.0643 12.1269 13.5542 11.6137C12.9449 11.001 12.3322 10.3914 11.7195 9.78212V9.7829Z" fill="white"/>
                            </svg>
                        </a>
                        <button class="btn btn-orange modal__trigger ml-md-3 order-4 order-md-0 d-none d-md-block"
                                data-modal="#modal">Заказать
                            звонок</button>
                        <button class="btn-circle btn-blue modal__trigger order-4 order-md-0 d-block
                        d-md-none"
                                data-modal="#modal"><span>
<svg class="svg_pen" width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.79519 6.86128L3.25087 8.29219L8.04866 3.57781C8.1059 3.52173 8.1975 3.52173 8.25474 3.57781C8.31147 3.63389 8.31147 3.72405 8.25474 3.7803L3.45694 8.49487L4.01707 9.04544L10.2851 2.88653L8.82922 1.4561L4.03159 6.16983C4.00322 6.19804 3.96581 6.21214 3.92856 6.21214C3.89114 6.21214 3.85372 6.19804 3.82535 6.16983C3.76811 6.11425 3.76811 6.0234 3.82535 5.96732L8.62297 1.25361L8.06251 0.702858L1.79519 6.86128ZM10.8541 10H1.49052H1.48044H1.47242H0.145927C0.0651036 10 0 9.93637 0 9.85695C0 9.77786 0.0651036 9.71355 0.145927 9.71355H0.935701C0.83198 9.56277 0.797291 9.37622 0.84394 9.19454L1.01243 8.53448L1.01311 8.53079L1.01396 8.52727L1.01498 8.52374L1.01601 8.52022L1.01703 8.51669L1.44679 6.83155L1.4473 6.82987L1.44764 6.8282L1.44799 6.82651L1.44849 6.82484L1.44901 6.82315L1.44917 6.82181L1.44986 6.81981L1.45037 6.81812L1.45071 6.81728L1.45089 6.81645L1.45139 6.8151L1.45208 6.81325L1.45276 6.81158L1.45311 6.81056L1.45396 6.80838L1.45465 6.80671L1.45533 6.80502L1.45585 6.80402L1.4567 6.80184L1.45755 6.80033L1.45807 6.79915L1.45892 6.79764L1.45977 6.79562L1.46062 6.79395L1.46147 6.79242L1.46216 6.79126L1.46319 6.78941L1.46404 6.7879L1.46456 6.78723L1.46508 6.78639L1.46593 6.78521L1.46694 6.78337L1.47258 6.77547L1.47395 6.77363L1.47515 6.77194L1.47634 6.7706L1.48472 6.7612L1.48592 6.75986L7.95998 0.399113L7.96272 0.396604L7.96527 0.394079C8.2262 0.139696 8.57188 0 8.9396 0C9.3104 0 9.65812 0.14154 9.91972 0.399113L10.5943 1.06085C11.1324 1.59026 11.1343 2.44963 10.6005 2.98123L10.5993 2.98257L10.5981 2.98392L10.5969 2.98508L10.5955 2.98642L10.5943 2.98761L10.5918 2.99013L4.12575 9.34314L4.12011 9.34868L4.11327 9.35506L4.11207 9.35624L4.11053 9.35742L4.10916 9.35858L4.10848 9.35925L4.10763 9.35976L4.10661 9.3606L4.10489 9.36194L4.10336 9.36296L4.10251 9.36363L4.1008 9.3648L4.09892 9.36614L4.09738 9.36716L4.09601 9.36816L4.09481 9.36867L4.09293 9.37001L4.09139 9.37085L4.08986 9.37185L4.08866 9.37236L4.08662 9.37337C4.07295 9.38059 4.05877 9.38579 4.0439 9.38831L2.72509 9.71355H10.8541C10.9349 9.71355 11 9.77786 11 9.85695C11 9.93637 10.9349 10 10.8541 10ZM10.4841 2.67681C10.8119 2.25552 10.7799 1.64854 10.3881 1.26335L9.71418 0.60162C9.50742 0.397946 9.23265 0.286446 8.9396 0.286446C8.69662 0.286446 8.46526 0.363686 8.27525 0.506745L8.92422 1.14464L8.92695 1.14715L8.92969 1.14967L8.93243 1.1522L8.93498 1.15487L8.93755 1.15756L10.4841 2.67681ZM3.15331 8.60099L3.14783 8.59594L3.14271 8.59058L3.14031 8.58789L2.33807 7.79955L1.66789 7.14118L1.33128 8.46128C1.90644 8.63339 2.21793 8.93814 2.39273 9.50031L3.73256 9.17019L3.15467 8.60215L3.15331 8.60099ZM2.10994 9.56999C1.96504 9.11026 1.73146 8.88156 1.26036 8.73901L1.12657 9.26389C1.09478 9.38848 1.13033 9.51677 1.22312 9.60777C1.29232 9.67527 1.38288 9.71238 1.47737 9.71355H1.48934C1.51719 9.71288 1.54487 9.70935 1.57272 9.70247L2.10994 9.56999Z" fill="white"/>
</svg>
</span>Запись</button>


                        <svg class="svg_search ml-0 ml-md-4 mr-3 ml-3 mr-md-0" width="21" height="23" viewBox="0 0 21
                         23"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.2954 15.72C14.3346 15.72 16.181 14.9129 17.5181 13.6066C18.8552 12.3002 19.6813 10.4963 19.6813 8.50402C19.6813 6.51177 18.8552 4.70779 17.5181 3.40145C16.181 2.09512 14.3346 1.28807 12.2954 1.28807C10.2562 1.28807 8.40978 2.09512 7.07268 3.40145C5.73558 4.70779 4.90953 6.51177 4.90953 8.50402C4.90953 10.4963 5.73558 12.3002 7.07268 13.6066C8.40978 14.9129 10.2562 15.72 12.2954 15.72ZM1.14789 22.7853C0.906612 23.0489 0.491073 23.0718 0.219632 22.836C-0.0501333 22.6003 -0.0735911 22.1943 0.16769 21.9291L6.58509 14.9244C6.43094 14.7934 6.28349 14.6592 6.13939 14.5184C4.56436 12.9796 3.58919 10.8531 3.58919 8.50402C3.58919 6.15654 4.56436 4.03007 6.13939 2.48964C7.71442 0.950848 9.89097 -0.00189209 12.2954 -0.00189209C14.6982 -0.00189209 16.8747 0.950848 18.4514 2.48964C20.0264 4.02843 21.0016 6.15491 21.0016 8.50402C21.0016 10.8515 20.0264 12.9796 18.4514 14.5184C16.8764 16.0572 14.6998 17.0099 12.2954 17.0099C10.5847 17.0099 8.98952 16.527 7.64404 15.6954L1.14789 22.7869V22.7853Z" fill="#0F4155"/>
                        </svg>
                    </div>
                </div><!-- .site-branding -->

            </header><!-- #masthead -->
        </div>
    </div>
</section>