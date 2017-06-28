<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes() ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery-ui.min.css" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon1.png" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon1.png" />
    <!-- <link rel="bookmark" href="http://img.wezhan.cn/42981_favicon.ico?t=201704251127363492" /> -->

    <title><?php bloginfo('name'); ?><?php wp_title('|',true); ?></title>
    <?php // add meta keywords and description by conditionary
		//以下内容针对网站首页
		if ( is_home() || is_front_page() ) { //判断是否为首页
		    $description = "硬件，软件，各类设备";//将双引号中的内容修改为你自己的
		    $keywords = "硬件，软件，各类设备";//将双引号中的内容修改为你自己的
		}

		/**
		* 以下内容针对单个文章页面、静态页面，但排除附件页面
		*/
		elseif ( is_singular() && !is_attachment() ) {
		    /**
		     * 2012.06.16 add !is_attachment() to not display these on attachment pages
		     * or, we could figure out proper description and kewwords to show on attachment pages, then revise it
		     */
			$exerpt = $post->post_excerpt; //2012.11.01 因 get_the_excerpt() 会在没有设定 excerpt 时自动生成一个 excerpt 而导致某些情况下出错。
			if ( $exerpt != '') { //是否存在摘要
				$description = $exerpt; //使用文章摘要作为描述
			}
			else {
				$description = $post->post_content; //使用文章内容的前 200 个字符（后面会进行截短）作为描述
		    }

			$keywords ="";
			// 2013.10.09, 在下面的查询中增加一个参数以减少数据库查询强度，得到一个仅仅包含标签名称的数组，因而下面的也变简单了
			$tags = wp_get_post_tags( $post->ID, array( 'fields' => 'names' ) );
			$keywords = implode(",", $tags);
		}

		//以下部分留着，目前还没想好怎么处理静态页面、分类、标签和日期存档页
		//相信很多人跟我一样，懒得给每个分类和标签都添加说明
		// 2012.11.01 已激活部分内容，会自动判断以决定是否显示到页面源代码中
		elseif(is_category()) {
		    $description = category_description();
		// $keywords = "";
		}
		elseif(is_tag()) {
		    $description = tag_description();
		// $keywords = "";
		}

		//判断前面的程序是否给 description 赋予了具体内容
		//如果没有就不在网页源代码中显示这一部分
		if ( $description != '' ) {
		    // 2015.01.25
		    // 清理类似  的标记
		    $description = preg_replace('#\[[^\]]+\]#', '', $description);
		    // 清理 description 中的 HTML 代码，并截短为 200 个字符
		    $description = wp_html_excerpt( wp_strip_all_tags( $description, true ), 200 );
		?>
		    <meta name="description" content="<?php echo $description; ?>" />
		<?php }

		//类似 description 来处理 keywords
		if ( $keywords !='' ): ?>
		    <meta name="keywords" content="<?php echo $keywords; ?>" />
		<?php endif; ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/base.pc.css" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/font/iconfont.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/pager.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/iconfontV2.css" rel="stylesheet" />
    <?php if(is_home()):?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/RenderRunTimeCss.css" type="text/css" />
    <?php elseif(is_page()):?>
        <?php if(is_page('lxwm')):?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page-lxwm.css" type="text/css" />
        <?php else:?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/renderpage.css" type="text/css" />
        <?php endif;?>
    <?php elseif(is_search()):?>
         <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/search.css" type="text/css" />
    <?php elseif(is_category()):?>
        <?php if(is_category('cgal')):?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/category-cgal.css" type="text/css" />
        <?php elseif(is_category('ygfc')):?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/category-ygfc.css" type="text/css" />
        <?php else:?>
         <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/category.css" type="text/css" />
        <?php endif;?>
    <?php elseif(is_single()):?>
        <?php if(in_category(array( 'cgal'))):?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-ygfc.css" type="text/css" />
        <?php else:?>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single.css" type="text/css" />
        <?php endif;?>
    <?php endif;?>

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/public.common.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.lazyload.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/kino.razor.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/underscore.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.slider.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/searchExt.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.color.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.mjs.nestedSortable.js"></script>
    <script language='javascript' type='text/javascript' id='yibuHeaderScript'>
</script>


    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/velocity.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/velocity.ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validatestar.min.js"></script>
 <?php wp_head(); ?>
</head>
<body>
    <!-- <input type="hidden" id="pageinfo" value="1265" data-type="" data-device="pc" data-entityid="" /> -->
<style>
    .viewSwitch {
        position: fixed;
        right: 60px;
        top: 60px;
        z-index: 999999999;
        background-color: white;
    }

    .deviceSwitch {
        width: 96px;
        text-align: center;
        float: left;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .deviceSwitch div {
        background-color: #FFF;
        width: 48px;
        font-size: 20px;
        float: left;
        color: #222;
        cursor: pointer;
    }

    .deviceSwitch div:hover {
        color: #29A0CB;
    }

    .deviceSwitch div span {
        line-height: 48px;
    }

    .deviceSwitch div.active {
        background-color: #29A0CB;
        color: white;
        cursor: auto;
    }

    .deviceSwitch div.active:hover {
        color: white;
    }

    .deviceSwitch div.active span {
        color: #FFF;
    }
   /* .editableContent p {padding:5px 0px; margin:0;line-height:22px;text-indent:2em;}*/
    .content_post p {
        padding:5px 0px; margin:0;line-height:22px;text-indent:2em;font-size: 14px;line-height: 150%; font-family: 微软雅黑, sans-serif;
    }
</style>
<!-- <div class="viewSwitch" style="display: none;">
    <div class="deviceSwitch">
        <div class="device-pc" data-device="pc" title="点击预览PC版">
            <span class="ym-iconfont-web"></span>
        </div>
        <div class="device-mobile" data-device="mobile" title="点击预览移动版" style="display:">
            <span class="ym-iconfont-mobile"></span>
        </div>
    </div>
</div> -->
<script type="text/javascript">
    (function ($) {
        $.extend({
            request: function (m) {
                var sValue = location.search.match(new RegExp("[\?\&]" + m + "=([^\&]*)(\&?)", "i"));
                return sValue ? sValue[1] : sValue;
            },
            urlUpdateParams: function (url, name, value) {
                var r = url;
                if (r != null && r != 'undefined' && r != "") {
                    value = encodeURIComponent(value);
                    var reg = new RegExp("(^|)" + name + "=([^&]*)(|$)");
                    var tmp = name + "=" + value;
                    if (url.match(reg) != null) {
                        r = url.replace(eval(reg), tmp);
                    } else {
                        if (url.match("[\?]")) {
                            r = url + "&" + tmp;
                        } else {
                            r = url + "?" + tmp;
                        }
                    }
                }
                return r;
            }
        });
    })(jQuery);
    function initialDeviceSwitch() {
        var pageinfo = $("#pageinfo");
        if (pageinfo.length == 0 && window.frames.length > 0) {
            pageinfo = $(window.frames[0].document).find("#pageinfo");
        }
        $(".viewSwitch").show();
        if (pageinfo.length == 0) {
            return;
        }
        var pageId = pageinfo.val();
        var pagedevice = pageinfo.attr("data-device");
        var pageType = pageinfo.attr("data-type");
        var pageModelId = pageinfo.attr("data-entityid");
        $(".deviceSwitch").find("div[data-device=" + pagedevice + "]").addClass("active");
        $(".deviceSwitch").find("div").not(".active").click(function () {
            var mobileUrl = "http://" + window.location.host;

            if (pagedevice == "pc") {
                mobileUrl = mobileUrl + "/prevmobilepage/" + pageId + window.location.search;
                mobileUrl = $.urlUpdateParams(mobileUrl, "pageType", pageType);
                mobileUrl = $.urlUpdateParams(mobileUrl, "pmId", pageModelId);
            } else if (pagedevice == "mobile") {
                switch (pageType) {
                    case "newsitem":
                        mobileUrl = mobileUrl + "/" + pageType + "/" + pageModelId + window.location.search;
                        break;
                    case "product":
                        mobileUrl = mobileUrl + "/" + pageType + "/" + pageModelId + window.location.search;
                        break;
                    default:
                        mobileUrl = mobileUrl + "/yibucategorypage/" + pageId + window.location.search;
                        break;
                }
            }
            window.location.href = $.urlUpdateParams(mobileUrl, "setprev", $(this).attr("data-device"));
        });
    }
    $(function () {
        if ($("#preMainFrame").length > 0) {
            $("#preMainFrame").load(initialDeviceSwitch);
        } else {
            initialDeviceSwitch();
        }
    });
</script>    
<div  id="view_layout_1_277067355" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent layout_Block2_Item0' style='border-style:none;'>
<style type="text/css">

	.header,.main-wrap .main,.footer { position:relative; clear:both; margin:0 auto; padding:0;}
	.main-wrap { clear:both; margin:0; padding:0; width:auto; }
	.main-wrap .main {}
	.main-wrap .main .content { width:100%;}
	body{
		background-color:;
	}
</style>


    <div style="*z-index:11;*position:relative;width:100%;height:704px;margin-left:auto;margin-right:auto;background-color:">
      <div class="header page_header yibuLayout_tempPanel" style="width:1000px;height:704px;background-color:;;">
<div class='runTimeflowsmartView'>
<?php get_search_form(); ?>
<div  id="view_image_37_277067355" class="yibuSmartViewMargin absPos"   >
<?php $general_options = get_option('ashuwp_basic');?>
<div class='yibuFrameContent overflow_hidden image_Style1_Item0' style='height:39px;width:224px;'>
<!-- 联系电话 -->
    <div class="megwh" style="height:100%; width:100%;">
        <a id="autosize_view_image_37_277067355" href="javascript:void(0);" target="_self"   style="cursor:default;"      >
            <input id="w_view_image_37_277067355" type="hidden" value="256" />
            <input id="h_view_image_37_277067355" type="hidden" value="40" />
            <input id="canadjustwidth_view_image_37_277067355" type="hidden" value="False" />
            <input id="canadjustheight_view_image_37_277067355" type="hidden" value="False" />
                <img  src="<?php echo $general_options['tel_pic'];?>"  alt="" style="border:none; position:relative;" />
        </a>
    </div>
</div>
<!-- 联系电话-end -->
</div>
<!-- logo-start -->
<div  id="view_image_50_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden image_Style1_Item0' style='height:121px;width:306px;border-style:none;'>    
<div class="megwh" style="height:100%; width:100%;">
        <a id="autosize_view_image_50_277067355" href="javascript:void(0);" target="_self"   style="cursor:default;"      >
            <input id="w_view_image_50_277067355" type="hidden" value="350" />
            <input id="h_view_image_50_277067355" type="hidden" value="200" />
            <input id="canadjustwidth_view_image_50_277067355" type="hidden" value="False" />
            <input id="canadjustheight_view_image_50_277067355" type="hidden" value="False" />
                <img  src="<?php echo $general_options['logo'];?>"  alt="" style="border:none; position:relative;" />
            
        </a>
    </div>
</div>
</div>
<!-- logo-end -->
<div  id="view_banner_55_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden banner_Style1_Item0 view_banner_55_277067355_Style1_Item0' style='height:50px;width:1000px;'>    
<div id="fullScreen_view_banner_55_277067355" class="w_container_wrap renderfullScreen" ></div>
<script>
    $(function () {
        setRenderFullScreen($('#view_banner_55_277067355'));
        
    });
</script>


<div class="flowsmartView isflowcontainer w_container_content" refarea="Area_0" id="flowsmartView_55" style=width:1000px;>
    <div  id="view_navigator_56_277067355" class="yibuSmartViewMargin absPos"   >
<!-- <div class='yibuFrameContent navigator_Style2_Item0 view_navigator_56_277067355_Style2_Item0'>  -->
<?php 
	wp_nav_menu(  
		array(  
		'theme_location'  => '', //指定显示的导航名，如果没有设置，则显示第一个  
		'menu'            => 'header-menu',  //指定调用菜单名
		'container'       => 'div', //最外层容器标签名  
		'container_class' => 'yibuFrameContent navigator_Style2_Item0 view_navigator_56_277067355_Style2_Item0', //最外层容器class名  
		'container_id'    => '',//最外层容器id值  
		'menu_class'      => '', //ul标签class  
		'menu_id'         => 'nav_view_navigator_56_277067355',//ul标签id  
		'echo'            => true,//是否打印，默认是true，如果想将导航的代码作为赋值使用，可设置为false  
		//'fallback_cb'     => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用  
		'before'          => '<h3>',//显示在导航a标签之前  
		'after'           => '</h3>',//显示在导航a标签之后  
		'link_before'     => '',//显示在导航链接名之后  
		'link_after'      => '',//显示在导航链接名之前  
		'items_wrap'      => '<ul id="%1$s">%3$s</ul>',  
		'depth'           => 0,////显示的菜单层数，默认0，0是显示所有层  
		'walker'          => ''// //调用一个对象定义显示导航菜单 ));  
		) 
	)
?> 
<script type="text/javascript">
	$('.w_nav_item').css("width","width:16.66%;");
</script> 


<!-- <input type="hidden" id="HeightVariablesStr_view_navigator_56_277067355" value="$height:50px;$Item_height:50px;$SubItem_height:50px;" /> -->
<script>
    $(function () {
        slideMenu("nav_" + 'view_navigator_56_277067355');
        
        var isDivider = true;

        //子导航下边框显示不出来的fix
        $("#nav_" + 'view_navigator_56_277067355').children("li").each(function () {
            var Li_height = $(this).height();
            $("li", this).height(Li_height);

            var child_li = $("li", this);
            var topborderwidth = $("a:first", child_li).css('border-top-width');
            topborderwidth = isNaN(parseInt(topborderwidth)) ? 0 : parseInt(topborderwidth);
            var bottomborderwidth = $("a:first", child_li).css('border-bottom-width');
            bottomborderwidth = isNaN(parseInt(bottomborderwidth)) ? 0 : parseInt(bottomborderwidth);
            var aheight = Li_height - topborderwidth - bottomborderwidth;
            $("a", child_li).height(aheight);
        });

        jQuery("#nav_" + 'view_navigator_56_277067355').children("li").each(function () {
            var topWidth = $(this).children("h3").children("a").css("border-top-width");
            var leftWidth = $(this).children("h3").children("a").css("border-left-width");
            var bottomWidth = $(this).children("h3").children("a").css("border-bottom-width");



            if (topWidth != "0" && topWidth != "0px") {
                isDivider = false;
                return false;
            }
            if (leftWidth != "0" && leftWidth != "0px") {
                isDivider = false;
                return false;
            }
            if (bottomWidth != "0" && bottomWidth != "0px") {
                isDivider = false;
                return false;
            }


            if ($(this).children("ul").length > 0) {
                var maxWidth = $(this).children("ul").width();
                $(this).children("ul").children("li").each(function () {

                    var a = $(this).children("a");
                    var currentWidth = GetCurrentStrWidth(a.html(), a.css("font-size")) + 20;
                    if (maxWidth < currentWidth)
                        maxWidth = currentWidth;
                });
                $(this).children("ul").css("width", maxWidth + "px");
            }
        });
        //if (isDivider)
        //    jQuery("#nav_" + 'view_navigator_56_277067355').children("li:last").children("h3").children("a").css("border-right-width", "0px");//去掉最后一项的分隔线

        if ("False" == "False") {
            jQuery("#" + 'view_navigator_56_277067355').css("z-index", "999999");
            if (jQuery("#" + 'view_navigator_56_277067355').parent().attr("class") != "runTimeflowsmartView") {//导航可能放在容器控件中了，需要把容器控件的z-index的值设大
                jQuery("#" + 'view_navigator_56_277067355').parent(".w_container_content").parent().parent().css("z-index", "999998");
            }
        }
        SetNavSelectedStyle("nav_" + 'view_navigator_56_277067355', 'nav');//选中当前导航
    })
</script>
<!-- </div> -->
</div>

</div>
<script type="text/javascript">
    function setLayoutHeight() {
        var bannerheight = $("#view_banner_55_277067355").css("height");
        $("#view_banner_55_277067355").children(".yibuFrameContent").css("height", bannerheight);
    };
</script>
</div>
</div>
<div  id="view_photoalbum_57_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden photoalbum_Style2_Item0 view_photoalbum_57_277067355_Style2_Item0' style='height:548px;width:1000px;'>
<div class="w_slider_2 renderfullScreen w_slider_2_view_photoalbum_57_277067355">
    <?php
		$args = array(
		  'post_type'=>'slider_type',
		  'orderby'=>array(
		        'ashuwp_slider_sort'=>'ASC'
		    ),
		  'showposts'=>6
		);
		query_posts($args);
	?>
	<?php if(have_posts()): ?>
		<div class="w_slider_img">
		  <ul>
		    <?php
			    while(have_posts()): the_post();
			    $slider_pic = get_post_meta($post->ID,'ashuwp_slider_pic',true);
			    $slider_link = get_post_meta($post->ID,'ashuwp_slider_link',true);
			    $slider_sort = get_post_meta($post->ID,'ashuwp_slider_sort',true);
			    $slider_des_tit = get_post_meta($post->ID,'ashuwp_slider_des_title',true);
			    $slider_des_con = get_post_meta($post->ID,'ashuwp_slider_des_content',true);
			    $slider_des_Eng = get_post_meta($post->ID,'ashuwp_slider_des_Eng',true);
		    ?>
		    <li style="background: url(<?php echo $slider_pic; ?>) center 0 no-repeat;">
		    	<div class="siteWidth">
		    		<p class="txt"   style="display:none;">
                        b<?php echo $slider_sort;?>
                        <span class="btn"></span>
                    </p>
                    <p class="txtDesc"   style="display: none;">
                        图片<?php echo $slider_sort;?>
                    </p>
                    <a target="" title="<?php the_title();?>"   href="javascript:void(0)"    ></a>
	    		</div>
		    </li>
		    <?php endwhile; ?>
		  </ul>
		</div>
    <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
    <!-- <a   style="display:block;"     class="prev" href="javascript:void(0)"></a>
    <a   style="display:block;"     class="next" href="javascript:void(0)"></a>
    <div class="w_slider_num"   style="display:block;"      ><ul></ul></div> -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        if ("fade"=="fold") {
            setRenderFullScreen($("#view_photoalbum_57_277067355"), "window");
        } else {
            setRenderFullScreen($("#view_photoalbum_57_277067355"), "auto");
        }
        $(".w_slider_2_view_photoalbum_57_277067355").slide({
            titCell: $(".w_slider_2_view_photoalbum_57_277067355 .w_slider_num ul"),
            mainCell: $(".w_slider_2_view_photoalbum_57_277067355 .w_slider_img ul"),
            effect: "fade",
            autoPlay: "true",
            autoPage: true,
            trigger: "click",
            interTime: "3000"
        });
    });


</script>
</div>
</div>
<div  id="view_line_58_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden line_Style2_Item0 view_line_58_277067355_Style2_Item0' style='height:102px;width:16px;'>
    <div class="w_line_2"></div>
</div>
</div>
<div  id="view_text_59_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden text_Style1_Item0' style='height:116px;width:482px;'>
<style type="text/css">
    #view_text_59_277067355_txt ul{ padding-left:20px;}
</style>
<div id='view_text_59_277067355_txt'   style="cursor:default; height:100%; width:100%;"  >
<?php
    while(have_posts()): the_post();
    $slider_des_tit = get_post_meta($post->ID,'ashuwp_slider_des_title',true);
    $slider_des_con = get_post_meta($post->ID,'ashuwp_slider_des_content',true);
    $slider_des_Eng = get_post_meta($post->ID,'ashuwp_slider_des_Eng',true);
?>
    <div class="editableContent " style="line-height:1.5;">
        <p style="line-height: 2.5em;"><strong style="color: rgb(23, 54, 93);"><span style="font-size: 36px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;"><?php echo $slider_des_tit;?></span></strong><br/></p>
        <p style="line-height: 3em;"><span style="font-size: 20px; font-family: 微软雅黑, &#39;Microsoft YaHei&#39;;"><?php echo $slider_des_con;?></span></p><p style="line-height: 2em;"><span style="font-family: arial, helvetica, sans-serif; font-size: 16px;"><?php echo $slider_des_Eng;?></span></p>
    </div>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>
<script>
    Pagination('view_text_59_277067355_txt', "首页", "尾页", "上一页", "下一页", textPageCallbackview_text_59_277067355);

    function textPageCallbackview_text_59_277067355() {

        $(".absPos").each(function () { $(this).removeAttr("oldbottom").removeAttr("expandh").removeAttr("oheight").removeAttr("cheight").css("min-height", '').css("height", '').css("top", '') });

        if ($("#view_text_59_277067355").parent(".w_tab_container_item ").length > 0) {
            $("#view_text_59_277067355").parent(".w_tab_container_item ").removeAttr("oldbottom").removeAttr("expandh").removeAttr("oheight").removeAttr("cheight").css("min-height", '').css("height", '').css("top", '');
        }
        if ($("#view_text_59_277067355").parents(".w_tab_container").length > 0) {
            $("#view_text_59_277067355").parents(".w_tab_container").removeAttr("oldbottom").removeAttr("expandh").removeAttr("oheight").removeAttr("cheight").css("min-height", '').css("height", '').css("top", '');
        }
        if ($("#view_text_59_277067355").parents(".w_tab").length > 0) {
            $("#view_text_59_277067355").parents(".w_tab").removeAttr("oldbottom").removeAttr("expandh").removeAttr("oheight").removeAttr("cheight").css("min-height", '').css("height", '').css("top", '');
        }

        
        yiburecomputeLayoutHeight();
        initScrollHeight_view_text_59_277067355();
    }
    function initScrollHeight_view_text_59_277067355() {
        var currentHeight = $("#view_text_59_277067355").height();
        var oldHeight = window["view_text_59_277067355" + "_height"];
        window["view_text_59_277067355" + "_height"] = currentHeight;
        if (oldHeight != undefined) {
            var subtract = currentHeight - oldHeight;
            if (subtract < 0) {
                
                if ($("#view_text_59_277067355").parents(".mainSamrtView").length > 0) {
                    $("#view_text_59_277067355").parents(".mainSamrtView").each(function () {
                        if ($(this).attr("style") != undefined && $(this).attr("style").toLowerCase().indexOf('height') > -1) {
                            var height = $(this).height();
                            var oheight = $(this).attr("oheight");

                            var expandh = $(this).attr("expandh");
                            if (oheight != undefined && expandh != undefined) {
                                oheight = parseInt(oheight);
                                expandh = parseInt(expandh);
                                expandh = expandh + subtract;
                                var newHeight = oheight + expandh;
                                $(this).height(newHeight);
                                $(this).attr("expandh", expandh);
                                if ($(this).children(".yibuFrameContent").length > 0) {
                                    if ($(this).children(".yibuFrameContent").attr("style") != undefined && $(this).children(".yibuFrameContent").attr("style").toLowerCase().indexOf('height') > -1) {
                                        $(this).children(".yibuFrameContent").height(newHeight);
                                    }
                                }
                            }
                        }
                        
                    });
                }
            }
        }
    }
    $(function () {
        window["view_text_59_277067355" + "_height"] = $("#view_text_59_277067355").height();
    });
</script>
</div>
</div>
</div>
</div>
</div>
<!-- 头部结束 -->


