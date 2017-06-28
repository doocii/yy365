<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div  id="view_search_36_277067355" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden search_Style1_Item0 view_search_36_277067355_Style1_Item0' style='height:38px;width:310px;'><!--w_search-->
<!--fontfamily_select-->
<div style="position: absolute; top: 0px; filter: alpha(opacity=0);opacity:0;background-color: #777; z-index: 2; left: 0px; display:none; width: 100%; height: 100%;">
</div>
<div>
<form id="searchform" name="searchform" method="get" action="<?php bloginfo('home'); ?>/" >	
    <div class="w_search_select">
        <span class="w_search_select_txt">全部</span>
        <ul class="w_search_select_list" style="background-color: #f0f0f0;">
            <!-- <li id="0">全部</li>
            <li id="1">新闻</li>
            <li id="2">产品</li> -->
            <li id="0">全部</li>
            <?php
				$args=array('hide_empty' =>'0', 'parent' => 0 );
				$cat_arg_parent=get_categories($args);//获取一级分类目录
				foreach($cat_arg_parent as $category) {   //一级分类循环开始
					// if($category->term_id == 7){
                    //svar_dump($category);
						$cat_id_parent = $category->term_id;//获取分类ID
					  	$cat_name_parent = $category->name;//获取分类名称
					  	echo '<li id = "'.$cat_id_parent.'">'.$cat_name_parent.'</li>';
					// }elseif($category->term_id == 6){
					// 	$cat_id_parent = $category->term_id;//获取分类ID
					//   	$cat_name_parent = "产品";//获取分类名称
					//   	echo '<li id = "'.$cat_id_parent.'">'.$cat_name_parent.'</li>';
					// }
				}
			?>
        </ul>
        <input type="hidden" id="cat" name="cat" value="0" />
    </div> 
    
    <!--/fontfamily_select-->
    <!-- <input type="text" class="w_search_input" placeholder="请输入关键字" /> -->
    <input type="text" name="s" id="s" maxlength="34" class="w_search_input" value="" placeholder="请输入关键字" />
    <button class="w_search_btn" type="submit">
        <i class="iconfont">&#xe614;</i>
    </button>
</div>
</form>
<!--/w_search-->
<script typeof="text/javascript">
    $(function () {
        var htmlzindex = $("#view_search_36_277067355").css("z-index");
        var hoverIcon = "";
        var bannerindex = $("#view_search_36_277067355").parents("[id^=view_banner]").css("z-index");
        $('#view_search_36_277067355 .w_search_select').click(function () {
            $(this).children("ul.w_search_select_list").toggle(); if ($(this).children("ul.w_search_select_list").css("display") == "none") { $("#view_search_36_277067355").css("z-index", htmlzindex).parents("[id^=view_banner]").css("z-index", bannerindex); } else { $("#view_search_36_277067355").css("z-index", "9999999").parents("[id^=view_banner]").css("z-index", "9999999"); };
        });
        $('#view_search_36_277067355 .w_search_select').mouseenter(function () {
            $(this).children("ul.w_search_select_list").show(); $("#view_search_36_277067355").css("z-index", "9999999").parents("[id^=view_banner]").css("z-index", "9999999");
        });
        $('#view_search_36_277067355 .w_search_select').mouseleave(function () {
            $(this).children("ul.w_search_select_list").hide(); $("#view_search_36_277067355").css("z-index", htmlzindex).parents("[id^=view_banner]").css("z-index", bannerindex);
        });
        $("#view_search_36_277067355 .w_search_select_list li").click(function () {
            var textvalue = $(this).text();
            var type = $(this).attr("id");
            $(this).parent().siblings(".w_search_select_txt").text(textvalue);
            $("#view_search_36_277067355 #cat").val(type);
        });
        if (hoverIcon != "") {
            var obj = $("#view_search_36_277067355").find(".w_search_btn i");
            obj.unbind("hover");
            obj.hover(function () {
                $(this).html(hoverIcon);
            },
            function () {
                $(this).html("");
            });
        }

        $("#view_search_36_277067355 .w_search_btn").click(function () {
            if ("False".toLocaleLowerCase() != "true") {
                var keyword = $("#view_search_36_277067355").find(".w_search_input").val();
                var searchCategory = "";
                var cate = $("#view_search_36_277067355").find("#cat").val();
                if (cate == "")
                    cate = 0;
                var catename = $("#view_search_36_277067355").find("span.w_search_select_txt").text();
                searchCategory = cate + "|" + catename;
                //新版本重新获取searchCategory
                if (cate == 1) {

                }
                if ("" == "product" || ("" == "all" && "on" != "on")) {
                    if (cate == 1) {
                        searchCategory = "ProductResultTemplate";
                    } else {
                        searchCategory = "ArticleResultTemplate";
                    }
                } else if ("" == "news" || ("" == "all" && "on" == "on")) {
                    if (cate == 1) {
                        searchCategory = "ArticleResultTemplate";
                    } else {
                        searchCategory = "ProductResultTemplate";
                    }
                }
                if (keyword.replace(/(^\s*)|(\s*$)/g, "") == "") {
                    if ("2" == "1") {
                        alert("Search keywords cannot be empty");
                        return false;
                    } else {
                        alert("搜索关键字不能为空");
                        return false;
                    }
                    return;
                }
                if ("False".toLocaleLowerCase() == "false") {
                	return true;
                     //window.location.href = "/searchresultlist?keyword=" + keyword + "&searchCategory=" + searchCategory + "&htmlSmartId=0&isshowsearch=False";
                } else {
                    if ("False".toLocaleLowerCase() != "true") {
                        //老版本当前页显示
                        TurnPageSmartView("277067355", "", "False", "1", "", "", cate + "|" + catename, keyword, "false");
                    } else {
                        //新版本（精简）
                        TurnNewPageSmartView("277067355", "", "False", keyword, "false");
                    }
                }
            }
        });
        $("#view_search_36_277067355 .w_search_input").keydown(function (e) {
            if (e.keyCode == 13) {
                $("#view_search_36_277067355 .w_search_btn").click();
            }
        })
        $("#view_search_36_277067355 .yibuFrameContent").removeClass("overflow_hidden");
    });

</script>
</div>
</div>