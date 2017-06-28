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
        	    <div  id="view_main_1_277066966" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent main__Item0' style='height:299px;width:100%;'>
<div class='runTimeflowsmartView'>
<div  id="view_list_3_277066966" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden list_Style17_Item0 view_list_3_277066966_Style17_Item0' style='height:240px;width:797px;'>    
<div class="w-list" id="view_list_3_277066966_listdiv">
<ul class="w-list-container" id="view_list_3_277066966_listul">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
            <li class="w-list-item" style="width: 186px">
                <div class="w-list-pic">
                    <a href="<?php the_permalink(); ?>" target="_self">
                        <img alt="<?php the_title();?>" src="<?php echo get_post_meta($post->ID,"upload_img", true);?>" />
                    </a>
                </div>
                <div class="w-list-title">
                    <a href="<?php the_permalink(); ?>" target="_self">
                        <?php the_title();?>
                    </a>
                </div>
            </li>
    <?php endwhile; ?>
    <?php else : ?>
        暂无内容显示
    <?php endif;?>
</ul>
    <!-- 分页代码 -->
    <style type="text/css">
        #pager ul li span{
            display: inline-block;
        }
        #pager ul li span.current{
            border: 1px solid #2489ce;
        }
        
    
    </style>
    <div class="posts-nav pager f_clearfix" id="pager">
        <!-- <li class="current-page"> -->
        <ul style="margin-top:5px;">
            <li>
                <?php echo paginate_links(array(
                    'prev_next'          => 1,
                    'before_page_number' => '',
                    'mid_size'           => 2,
                    // 'before_page_number' => '<li class="current-page">',
                    // 'after_page_number'  => '</li>'
                ));?>
            </li>
        </ul>
        <!--  </li> -->
    </div>
    <!-- <ul class="w-list-container" id="view_list_3_277066966_listul">
        <li class="w-list-item" style="width: 186px">
            <div class="w-list-pic">
                <a href="/DHY4" target="_self">
                    <img alt="DHY4" src="http://img.wezhan.cn/content/sitefiles/42981/images/3915559_8.jpeg" />
                </a>
            </div>
            <div class="w-list-title">
                <a href="/DHY4" target="_self">
                    DHY4
                </a>
            </div>
        </li>
    </ul> -->
</div>
<script type="text/javascript">
    //防止分页报错
    var list_3 = null;
    $(document).ready(function () {
        var itemCount=4;
        if(itemCount>0){
            jQuery("#view_list_3_277066966_listdiv").slide({ mainCell: ".w-list-container", autoPlay: false, effect: "leftMarquee", vis:4,interTime: 10, pnLoop: false,opp:false, trigger: "click" });
        }
    });
</script>
</div>
</div>
<div  id="view_breadcrumb_5_277066966" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden breadcrumb_Style1_Item0' style='height:22px;width:200px;'><div class="w_nav">    <a href="<?php echo home_url(); ?>" class="w_nav_item">首页</a>&nbsp;<i class="iconfont">&#xe6a7;</i>&nbsp;
     <span class="w_subnav_item"><?php single_cat_title(); ?></span> 
</div>

</div>
</div>
<?php get_sidebar();?>
</div></div>
</div>

        	</div>
        </div>
    </div>
<?php get_footer();?>