<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
    <div class="main-wrap clearfix" style="*z-index:10;*position:relative;width:100%;margin-left:auto;margin-right:auto;;background-color:">
        <div class="main clearfix page_main" style="width:1000px;">
        	<div class="content yibuLayout_Body" style="min-height:100px;margin-left:auto;margin-right:auto;;background-color:" id="yibuLayout_center">
        	    <div  id="view_main_1_277067346" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent main__Item0' style='height:498px;width:100%;'><div class='runTimeflowsmartView'><div  id="view_breadcrumb_5_277067346" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden breadcrumb_Style1_Item0' style='height:31px;width:131px;'><div class="w_nav">    <a href="<?php echo home_url(); ?>" class="w_nav_item">首页</a>&nbsp;<i class="iconfont">&#xe6a7;</i>&nbsp;
     <span class="w_subnav_item"><?php single_cat_title(); ?></span> 
</div>
</div>
</div>
<div  id="view_photoalbum_7_277067346" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden photoalbum_Style4_Item0 view_photoalbum_7_277067346_Style4_Item0' style='height:455px;width:803px;'><div class="w_slider w_slider_4_7">
    <div class="w_slider_img">
        <ul>
            <?php if (have_posts()) : 
                $args=array(     
                    'cat' => 1,   // 分类ID     
                    'posts_per_page' => 5, // 显示篇数     
                );     
                query_posts($args);
                //var_dump(query_posts($args));
            ?>
            <?php while (have_posts()) : the_post(); ?>
            <li>
                <a href="javascript:void(0)"   target="_self"           >
                    <img title="<?php the_title();?>" src="<?php echo get_post_meta($post->ID,"upload_img", true);?>" alt="<?php the_title();?>" />
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div class="w_slider_num">
        <ul>
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="javascript:void(0)"   target="_self">
                        <img title="8" class="lazyload" src="http://img.wezhan.cn/transparent.gif" data-original="<?php echo get_post_meta($post->ID,"upload_img", true);?>" onload="DynamicLoad(this)" alt="<?php the_title();?>" />
                    </a>
                </li>
            <?php endwhile; ?>
            <?php endif;wp_reset_query(); ?>
        </ul>
    </div>
    <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
    <a   style="display:none;"   class="prev" href="javascript:void(0)"></a>
    <a   style="display:none;"   class="next" href="javascript:void(0)"></a>

</div>

<script type="text/javascript">
    var itemheight = parseInt($($(".w_slider_4_7").parent()).css("height"));
    var numheight = itemheight * 0.3;


    $(".w_slider_4_7 .w_slider_img ul li img").css("height", itemheight - numheight - 12);
    $(".w_slider_4_7 .w_slider_img ul li").css("height", itemheight - numheight - 12);
    $(".w_slider_4_7 .w_slider_num ul li img").css("height", numheight - 12);
    $(".w_slider_4_7").css("width", parseInt($($(".w_slider_4_7").parent()).css("width")) - 4);
    $(".w_slider_4_7 .w_slider_num ul li img").css("width", parseInt(parseInt($($(".w_slider_4_7").parent()).css("width")) / parseInt("5") - 10));

    $(".w_slider_4_7").slide({
        titCell: $(".w_slider_4_7 .w_slider_num ul li"),
        mainCell: $(".w_slider_4_7 .w_slider_img ul"),
        autoPlay: "true",
        effect: "fade",
        interTime: "2000"
    });
</script></div>
</div>
<?php get_sidebar();?>
</div></div>
</div>

    	</div>
    </div>
</div>
<?php get_footer();?>