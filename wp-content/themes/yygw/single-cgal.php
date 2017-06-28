<?php get_header();?>
<div class="main-wrap clearfix" style="*z-index:10;*position:relative;width:100%;margin-left:auto;margin-right:auto;;background-color:">
        <div class="main clearfix page_main" style="width:1000px;">
            <div class="content yibuLayout_Body" style="min-height:100px;margin-left:auto;margin-right:auto;;background-color:;background-color:" id="yibuLayout_center">
                <div  id="view_productinfo_1_277330011" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent productinfo_ProductStyle1_Item0' style='height:500px;width:100%;border-style:none;'>
<div class="ibody" style="word-break: break-all;">
    <h1><?php the_title();?></h1>
    <p class="img">
        <img id="img" alt="DHY3" src="<?php echo get_post_meta($post->ID, 'upload_img', true);?>" title="DHY3"/>
    </p>
        <p class="price">现价：<span>¥<?php echo get_post_meta($post->ID, 'price_text', true);?></span></p>
    <p class="info">添加时间：<?php the_date("Y-m-d H:i:s");?></p>
        <div class="content_post">
            <?php the_content();?>
        </div>
    <p class="last-next">
<?php 
 $categories = get_the_category();
 // var_dump($categories);
 $categoryIDS = array();
 foreach ($categories as $category) {
 array_push($categoryIDS, $category->term_id);
 }
 $categoryIDS = implode(",", $categoryIDS);
 $prev_post = get_previous_post($categoryIDS);
 $next_post = get_next_post($categoryIDS);
// var_dump($categoryIDS);
 ?>
            <?php if($prev_post):?>
                    <a class="last" href='<?php echo get_permalink( $prev_post );?>'>上一个：<?php echo $prev_post->post_title;?></a>
                <?php else:?>
                    <a class="last">上一个：无</a>
                <?php endif;?>
                <!-- <div class="news_view_pagenprev">上一篇：无</div> -->
            <?php if($next_post):?>
                    <a class="next" href='<?php echo get_permalink( $next_post );?>'>下一个：<?php echo $next_post->post_title;?></a>
                <?php else:?>
                    <a class="next">下一个：无</a>
            <?php endif;?>
    </p>
</div>

<input type="hidden" id="product_template_sm_flag"/>
<script>
    $(function(){
        $('#view_productinfo_1_277330011').css({ 'height': '100%' }).children().first().css({ 'height': '100%' });
    });
</script></div>
</div>

            </div>
        </div>
    </div>
<?php get_footer();?>