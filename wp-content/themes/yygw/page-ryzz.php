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
        	    <div id="view_main_1_277066963" class="mainSamrtView yibuSmartViewMargin">
<div class="yibuFrameContent main__Item0" style="height:450px;width:100%;">
<div class="runTimeflowsmartView">
<div id="view_text_3_277066963" class="yibuSmartViewMargin absPos" oldbottom="447">
<div class="yibuFrameContent text_Style1_Item0">
<style type="text/css">
    #view_text_3_277066963_txt ul{ padding-left:20px;}
</style>
        <?php 
            $post_question = get_post_meta($post->ID,"upload_aptitude", true);
            // var_dump($post_question);exit;
        ?>
        <!-- <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?> -->
		<div id="view_text_3_277066963_txt" style="cursor:default; height:100%; width:100%;">
		    <div class="editableContent content_post" style="line-height:1.5;">
                <div style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/zizhibg.jpg) ;margin: 0 auto;width:369px;height:70px;text-align:center;font-size: 36px;font-weight: bold;line-height: 65px;letter-spacing: 8px;color:#E90B0A;"><?php the_title(); ?></div>
                <ul style="margin-top: 20px;width:100%;height:100%;" class="ryzz_flo">
                    <?php foreach ($post_question as $key => $value) { ?>
                        <li style="width:50%;height:250px;float: left;margin-top: 20px;">
                            <div style="width:100%;height:200px;border: 0px solid #de54d6;text-align: center;">
                                <img src="<?php echo $value['upload_zzimg'];?>" height='100%'>
                            </div>   
                            <div style="height:48px;width:50%;margin:0 auto;text-align: center;font-size: 16px;font-weight: bold;color:#707070;"><?php echo $value['img_desc']?></div>   
                        </li>
                    <?php }?>
                </ul>
		    	 <!-- <?php the_content(); ?> -->
		    </div>
		</div>
		<!-- <?php endwhile; ?>
		<?php else : ?>
			暂无内容显示
		<?php endif; ?> -->
<script>
    Pagination('view_text_3_277066963_txt',"首页","尾页","上一页","下一页");
</script>
</div>
</div>
<div id="view_breadcrumb_5_277066963" class="yibuSmartViewMargin absPos" oldbottom="37">
<div class="yibuFrameContent breadcrumb_Style1_Item0"><div class="w_nav">    <a href="<?php echo home_url(); ?>" class="w_nav_item">首页</a>&nbsp;<i class="iconfont">&#xe6a7;</i>&nbsp;
     <span class="w_subnav_item"><?php the_title(); ?></span> 
</div>

</div>
</div>
<?php get_sidebar();?>
</div>
</div>
</div>

        	</div>
        </div>
    </div>
<?php get_footer();?>