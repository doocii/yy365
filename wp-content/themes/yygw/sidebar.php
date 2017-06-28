<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div id="view_navigator_8_277066963" class="yibuSmartViewMargin absPos" style="z-index: 999999;" oldbottom="302">
<!--  <div class="yibuFrameContent overflow_hidden navigator_Style4_Item0 view_navigator_8_277066963_Style4_Item0" style="height: 289px; width: 191px; overflow: visible;"> --><!--nav -->
<?php 
		wp_nav_menu(  
			array(  
			'theme_location'  => 'sider-menu', //指定显示的导航名，如果没有设置，则显示第一个  
			'menu'            => '子导航',  //指定调用菜单名
			'container'       => 'div', //最外层容器标签名  
			'container_class' => 'yibuFrameContent overflow_hidden navigator_Style4_Item0 view_navigator_8_277066963_Style4_Item0 view_navigator_9_277066965_Style4_Item0', //最外层容器class名  
			'container_id'    => '',//最外层容器id值  
			'menu_class'      => '', //ul标签class  
			'menu_id'         => 'nav_view_navigator_6_37676 nav_view_navigator_9_277066965',//ul标签id  
			'echo'            => true,//是否打印，默认是true，如果想将导航的代码作为赋值使用，可设置为false  
			//'fallback_cb'     => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用  
			'before'          => '<h3>',//显示在导航a标签之前  
			'after'           => '</h3>',//显示在导航a标签之后  
			'link_before'     => '',//显示在导航链接名之后  
			'link_after'      => '',//显示在导航链接名之前  
			'items_wrap'      => '<ul id="%1$s" styleitem="Style4">%3$s</ul>',  
			'depth'           => 0,////显示的菜单层数，默认0，0是显示所有层  
			'walker'          => ''// //调用一个对象定义显示导航菜单 ));  
			) 
		)
	?> 
<script type="text/javascript">
	$(".view_navigator_8_277066963_Style4_Item0").css({"height":"289px","width":"191px","overflow":"visible"});
	$(".view_navigator_8_277066963_Style4_Item0 li a").css("width","171px");
</script>
<!--/nav-->

<!-- <input id="HeightVariablesStr_view_navigator_8_277066963" value="$Item_height:48.17px;$SubItem_height:48.17px;" type="hidden"> -->
<script>
    $(function () {
        jQuery("#nav_" + 'view_navigator_8_277066963').parent("div").css("overflow", "visible");
        // jQuery("#nav_" + 'view_navigator_8_277066963').children("li:last").children("h3").children("a").css("border-bottom-width", "0px");//去掉最后一项的分隔线

        var isDivider = true;
        jQuery("#nav_" + 'view_navigator_8_277066963').children("li").each(function () {
            var topWidth = $(this).children("h3").children("a").css("border-top-width");
            var leftWidth = $(this).children("h3").children("a").css("border-left-width");
            var rightWidth = $(this).children("h3").children("a").css("border-right-width");
            if (topWidth != "0" && topWidth != "0px") {
                isDivider = false;
                return false;
            }
            if (leftWidth != "0" && leftWidth != "0px") {
                isDivider = false;
                return false;
            }
            if (rightWidth != "0" && rightWidth != "0px") {
                isDivider = false;
                return false;
            }
            if ($(this).children("ul").length > 0) {
                var maxWidth = $(this).children("ul").width();
                $(this).children("ul").children("li").each(function () {
                    var a = $(this).children("a");
                    var currentWidth = GetCurrentStrWidth(a.html(), a.css("font-size")) + 46;

                    if (maxWidth < currentWidth)
                        maxWidth = currentWidth;
                });
                $(this).children("ul").css({ "width": maxWidth + "px", "left": "-" + maxWidth + "px" });
            }
        });
        //if (isDivider)
        //    jQuery("#nav_" + 'view_navigator_8_277066963').children("li:last").children("h3").children("a").css("border-bottom-width", "0px");//去掉最后一项的分隔线
        if ("False" == "False") {
            jQuery("#" + 'view_navigator_8_277066963').css("z-index", "999999");
            if ("False" == "False" && jQuery("#" + 'view_navigator_8_277066963').parent().attr("class") != "runTimeflowsmartView") {//导航可能放在容器控件中了，需要把容器控件的z-index的值设大
                jQuery("#" + 'view_navigator_8_277066963').parent(".w_container_content").parent().parent().css("z-index", "999998");
            }
        }
        SetNavSelectedStyle("nav_" + 'view_navigator_8_277066963', 'vnav');//选中当前导航
    })

</script>
<!-- </div> -->
</div>
