<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

$bIsMainPage = $APPLICATION->GetCurPage(false)  == SITE_DIR;

?>
<!DOCTYPE html>
<!--[if lt IE 8]>  <html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>  <html class="no-js"><![endif]-->
<head>
<!--    <meta charset="utf-8"> -->
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--     <title>Заголовок окна браузера</title>            -->
    <title><?$APPLICATION->ShowTitle();?></title>

<!--     <meta name="keywords" content="Ключевые слова"/>  -->
<!--     <meta name="description" content="Описание страницы"/>  -->

	    <?$APPLICATION->ShowHead();?>

<!--      <link rel="stylesheet" type="text/css" href="css/common-styles.css" /> -->
<!--     <link rel="icon" href="ico/favicon_bx.png">                             -->

	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/common-styles.css")?>

	<link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/ico/favicon_bx.png">

    <!--[if lt IE 9]>
<!--     <script src="js/vendor/modernizr-html5shiv-respond.min.js"></script>   -->
	<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/js/vendor/modernizr-html5shiv-respond.min.js');?>"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
<!--     <script src="js/vendor/modernizr.min.js"></script>   -->
	<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/js/vendor/modernizr.min.js');?>"></script>
    <!--<![endif]-->
	<?
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/jquery.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/bootstrap/collapse.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/bootstrap/tooltip.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/plugins.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/jquery.touchSwipe.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/jquery.ba-throttle-debounce.min.js');

       // Слайдер

        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/cookesHelp.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/bootstrap-switch.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/vendor/jquery.carouFredSel-packed.js');


	?>
</head>
<body>
    <!--[if lt IE 8]>
    <p class="chromeframe">Вы используете <strong>устаревший </strong> браузер. Пожалуйста <a
            href="http://browsehappy.com/">
        обновите свой браузер</a> или <a href="http://www.google.com/chromeframe/?redirect=true">установите Google Chrome
        Frame</a> чтобы улучшить взаимодействие с сайтом.</p>
    <![endif]-->

    <?$APPLICATION->ShowPanel();?>

    <div class="sticky-wrap">
        <header>
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                           <?if($bIsMainPage):?>
                            <span class="logo">
                           <?else:?>
                            <a class="logo" href="/">
                           <?endif;?>
                                <div class="image">Intervolga.ru</div>
                                <div id="slogan-rand" class="slogan">
                                    <noscript>Сайты и реклама в интернете</noscript>
                                </div>
                             <?if($bIsMainPage):?>
				</span>
                             <?else:?>
                                </a>
                             <?endif;?>
<!--                            </a>  -->
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-7 col-xs-12 hidden-xs">
                                    <ul class="btn-list-inline">
									<?$APPLICATION->IncludeFile(
										SITE_DIR."include/slogan.php",
										array(),
										array("MODE"=>"text")
									);?>
                                    </ul>
                                </div>
                                <div class="col-lg-5 col-xs-12 hidden-print">
                                    <div class="input-group-search">
                                        <input type="text" class="form-control" placeholder="Поиск...">
                                        <button class="btn btn-link" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <ul class="phone-list">
							<li><?$APPLICATION->IncludeFile(
									SITE_DIR."include/phone1.php",
									array(),
									array("MODE"=>"html")
								);?></li>
							<li><?$APPLICATION->IncludeFile(
									SITE_DIR."include/phone2.php",
									array(),
									array("MODE"=>"html")
								);?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

	<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N"
	),
	false
);?>

        <?if ($bIsMainPage):?>
            <?
            //Слайдер
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "index",
                array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "N",
                    "COMPONENT_TEMPLATE" => "index",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "NAME",
                        1 => "PREVIEW_TEXT",
                        2 => "PREVIEW_PICTURE",
                        3 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "1",
                    "IBLOCK_TYPE" => "index",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "N",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "100",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "url",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "TIMESTAMP_X",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC"
                ),
                false
// This is comment
            );?>

    <div class="activities-description-wrap">
        <div class="activities-description">
            <div class="container">
                <div class="activities-inner">
                    <h3>Последние посещенные вами страницы</h3>
                    <ul>
                        <li><a href="#">Мы стали использовать новую ткань</a></li>
                        <li><a href="#">Главная страница</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

     <div class="container mbl">
           <div class="row">
               <div class="col-md-12">
                   <div class="live-main">
                        <h5><a href="#">Новости</a></h5>
                        <div class="live-pagination">
                            <a class="prev" href="#prev"><i class="fa fa-angle-left"></i></a>
                            <a class="next" href="#next"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="live-list-wrap">
                            <div class="live-list">
                                <div class="live-list-item" id="live-1">
                                    <div class="live-item-body image">
                                        <a class="live-item-img" href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/live-list/img-1.jpg" alt=""/></a>
                                        <div class="live-item-body-over">
                                            <div class="live-item-description">
                                                <div class="description">Изобретение относится к области получения и применения...</div>
                                            </div>
                                            <div class="live-item-label">
                                                <i class="fa fa fa-twitter"></i>
                                                <a href="#">Новое веяние в одежде - получено прочное водостойкое соединение</a>
                                            </div>
                                            <span class="live-item-data">25 Декабря 2015</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="live-list-item" id="live-2">
                                    <div class="live-item-body image">
                                        <a class="live-item-img" href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/live-list/img-2.jpg" alt=""/></a>
                                        <div class="live-item-body-over">
                                            <div class="live-item-description">
                                                <div class="description">В следующем году состоится выставка одежды...</div>
                                            </div>
                                            <div class="live-item-label">
                                                <i class="fa fa fa-vk"></i>
                                                <a href="#">Международная выставка одежды Salon De Fashion</a>
                                            </div>
                                            <span class="live-item-data">22 Октября 2015</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="live-list-item" id="live-3">
                                    <div class="live-item-body">
                                        <div class="live-item-body-over">
                                            <div class="live-item-description">
                                                <div class="description">Для пошива нашей одежды мы стали использовать новую
                                                    инновационную ткань</div>
                                            </div>
                                            <div class="live-item-label">
                                                <a href="#">Мы стали использовать новую ткань</a>
                                            </div>
                                            <span class="live-item-data">2 Июня 2015</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="live-list-item" id="live-4">
                                    <div class="live-item-body">
                                        <div class="live-item-body-over">
                                            <div class="live-item-description">
                                                <div class="description">Мы расширяем свой размерный ряд. Теперь наша одежда будет
                                                    доступна большему количеству людей</div>
                                            </div>
                                            <div class="live-item-label">
                                                <a href="#">Размерный ряд</a>
                                            </div>
                                            <span class="live-item-data">30 Апреля 2015</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="live-list-item" id="live-5">
                                    <div class="live-item-body image">
                                        <a class="live-item-img" href=""><img src="<?=SITE_TEMPLATE_PATH?>/img/live-list/img-3.jpg" alt=""/></a>
                                        <div class="live-item-body-over">
                                            <div class="live-item-description">
                                                <div class="description">С 20 по 23 февраля состоится...</div>
                                            </div>
                                            <div class="live-item-label">
                                                <i class="fa fa fa-twitter"></i>
                                                <a href="#">Форум производителей одежды в России</a>
                                            </div>
                                            <span class="live-item-data">22 Апреля 2014</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
        </div>
        <?endif;?>

	<?if(ERROR_404=='Y'):?>
	<div class="page-not-found">
	<?else:?>
	<div class="container">
		<?if (!$bIsMainPage):?>
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "template", Array(
				"COMPONENT_TEMPLATE" => ".default",
				"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
				"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
				"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			),
				false
			);?>
		<?endif;?>
		<h1><?$APPLICATION->ShowTitle(false)?></h1>
	</div>
	<?endif;?>
        <div class="container">
						