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
                <div id="view_main_1_277066965" class="mainSamrtView yibuSmartViewMargin">
<div class="yibuFrameContent main__Item0" style="height:304px;width:100%;">
<div class="runTimeflowsmartView">
<div id="view_list_3_277066965" class="yibuSmartViewMargin absPos" oldbottom="227">
<div class="yibuFrameContent list_Style2_Item0 view_list_3_277066965_Style2_Item0 "><!--list-->
<style type="text/css">
    /*.view_list_3_277066965_Style2_Item0 ul{ padding-left:20px;}*/
    #style_decoration:hover{
        text-decoration: underline;
    }
</style>
    <ul>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            
                <li class="w_list_item">
                    <span class="w_list_date">
                    <?php the_time('Y-m-d'); ?>
                    </span>
                    <i class="iconfont w_button_icon" style="font-size:100%">&#xe6a7;</i>
                    <a href="<?php the_permalink(); ?>" target="_self" id = "style_decoration"><?php the_title(); ?></a>
                </li>
            
        <?php endwhile; ?>
        <?php else : ?>
            暂无内容显示
        <?php endif; ?>
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
    <!-- <div class="pager f_clearfix" id="pager"> -->
        <!-- <ul style="margin-top:5px;">
            <li class="current-page">
                <span>1</span>
            </li>
            <li class="individual-page">
                <a href="javascript:TurnPageSmartView(277066970,'view_list_3_277066970',false,2,false,'','&quot;undefined&quot;','','false',list_3)">
                    2
                </a>
            </li>
            <li class="next-page">
                <a href="javascript:TurnPageSmartView(277066970,'view_list_3_277066970',false,2,false,'','&quot;undefined&quot;','','false',list_3)">下一页
                </a>
            </li>
        </ul>
        <script type="text/javascript">list_3=null;</script>
    </div> -->
    <!-- 分页代码 -->
<script type="text/javascript">
    //防止分页报错
    var list_3 = null;
    $(function () {
        var hoverIcon = "";
        if (hoverIcon != "") {
            var obj = $("#view_list_3_277066965").find(" li i");
            obj.unbind("hover");
            obj.hover(function () {
                $(this).html(hoverIcon);
            },
            function () {
                $(this).html(" ");
            });
        }
    });

</script></div>
</div>
<div id="view_breadcrumb_5_277066965" class="yibuSmartViewMargin absPos" oldbottom="33">
<div class="yibuFrameContent overflow_hidden breadcrumb_Style1_Item0" style="height:22px;width:200px;">
<div class="w_nav">    
<a href="<?php echo home_url(); ?>" class="w_nav_item">首页</a>&nbsp;<i class="iconfont">&#xe6a7;</i>&nbsp;
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