<?php get_header();?>
    <div class="main-wrap clearfix" style="*z-index:10;*position:relative;width:100%;margin-left:auto;margin-right:auto;;background-color:">
        <div class="main clearfix page_main" style="width:1000px;">
        	<div class="content yibuLayout_Body" style="min-height:100px;margin-left:auto;margin-right:auto;;background-color:;background-color:" id="yibuLayout_center">
        	    <div  id="view_newsinfo_1_277330010" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent newsinfo_NewsStyle1_Item0' style='width:100%;'>
     <!--page_wrap-->
<div class="page_wrap ibody">
	<!--news_view_wrap-->
	<div class="news_view_wrap">
		<!--news_view_header-->
		<div class="news_view_header">
          <h1 class="news_view_title"><?php the_title();?></h1>
			<div class="news_view_infobar">
            	<?php the_time("Y-m-d"); ?>
			</div>
		</div>
		<!--/news_view_header-->
		<!--news_view_main-->
		<div class="news_view_main">
			<!--news_view_content-->
			<div class="news_view_content" style="word-break: break-all;">
        		<?php the_content();?>
				<!-- <div class="qrcode" style="display:none;"></div> -->
			</div>
      <div class='pagination'></div>
			<!--/news_view_content-->
			<!--news_view_pagebar-->
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
			<div class="new_view_pagebar">
			 
			 	<?php if($prev_post):?>
					<div class="news_view_pagenprev">上一篇：<a href="<?php echo get_permalink( $prev_post );?>"><?php echo $prev_post->post_title;?></a></div>
				<?php else:?>
					<div class="news_view_pagenprev">上一篇：无</div>
				<?php endif;?>
				<!-- <div class="news_view_pagenprev">上一篇：无</div> -->
				<?php if($next_post):?>
					<div class="news_view_pagennext">下一篇：<a href="<?php echo get_permalink( $next_post );?>"><?php echo $next_post->post_title;?></a></div>
				<?php else:?>
					<div class="news_view_pagennext">下一篇：无</div>
				<?php endif;?>
			</div>
			<!--/news_view_pagebar-->
		</div>
		<!--/news_view_main-->
	</div>
	<!--/news_view_wrap-->
</div>
<!-- <input type="hidden" id="news_template_content_sm" /> -->
<!--/page_wrap-->
<script>
var _current_page;
var contents;
$(function () {
     $('#view_newsinfo_1_277330010').css({'height':'100%'}).children().first().css({'height':'100%'});
    // $(".yibuTemplateBody").css("height","");
    if ($(".news_view_content").html() != null) {
        contents = $(".news_view_content").html().split('_ueditor_page_break_tag_');
        var length = contents.length;
        if (length != 1) {
            $(".pagination").append("<span id='pre_page'>上一页</span>");
            for (var i = 0; i < length; i++) {
                $(".pagination").append("<a class='page' id=" + i + ">" + (i + 1) + "</a>");
            }
            $(".pagination").append("<span id='post_page'>下一页</span>");
            _current_page = $(".page").first();
            $(".page").first().addClass("hover");
            init();
        }
        $(".news_view_content").html(contents[0]);
    }
});

function init() {
    $(".page").click(function () {
        $(".page").removeClass("hover");
        $(".news_view_content").html(contents[$(this).attr('id')]);
        $(this).addClass("hover");
        _current_page = $(".hover");
    });
    $("#pre_page").click(function () {
        _current_page.prev().click();
    });
    $("#post_page").click(function () {
        _current_page.next().click();
    });
}
</script>
<style>
/*- Pagination -*/
.pagination { padding:10px 0; font-size: 13px; color:#48B9EF; text-align:center;}
.pagination a { margin:0px 3px; padding:2px 5px; border:1px solid #DDD; text-decoration:none;cursor:pointer;}
.pagination a:hover,.pagination a:active { border:1px solid #4B90CE;}
.pagination .hover { padding:2px 5px; border:1px solid #4B90CE; background:#4B90CE; color:#FFF; font-weight:700;}
.pagination span{margin:0px 3px; padding:2px 5px; border:1px solid #DDD;cursor:pointer}
</style>
      </div>
</div>

        	</div>
        </div>
    </div>
<?php get_footer();?>