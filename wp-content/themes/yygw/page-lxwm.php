<?php get_header();?>
    <div class="main-wrap clearfix" style="*z-index:10;*position:relative;width:100%;margin-left:auto;margin-right:auto;;background-color:">
        <div class="main clearfix page_main" style="width:1000px;">
            <div class="content yibuLayout_Body" style="min-height:100px;margin-left:auto;margin-right:auto;;background-color:" id="yibuLayout_center">
                <div  id="view_main_1_1266" class="mainSamrtView yibuSmartViewMargin"   >
<div class='yibuFrameContent main__Item0' style='height:559px;width:100%;border-style:none;'><div class='runTimeflowsmartView'><div  id="view_breadcrumb_6_1266" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden breadcrumb_Style1_Item0' style='height:28px;width:119px;'><div class="w_nav">    <a href="<?php echo home_url();?>" class="w_nav_item">首页</a>&nbsp;<i class="iconfont">&#xe6a7;</i>&nbsp;
     <span class="w_subnav_item"><?php the_title(); ?></span> 
</div>

</div>
</div>
<div  id="view_text_7_1266" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden text_Style1_Item0' style='height:121px;width:307px;'>
<style type="text/css">
    #view_text_7_1266_txt ul{ padding-left:20px;}
</style>
<div id='view_text_7_1266_txt'   style="cursor:default; height:100%; width:100%;"  >
    <?php $general_options = get_option('ashuwp_basic');
        //var_dump($general_options);
    ?>
        <div class="editableContent " style="line-height:1.5;">
            <p><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; color: rgb(0, 0, 0);"></span></p>
            <p style="line-height: 2em;">
            <span style="font-size: 14px;">
            <span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51); background: white;"><?php echo $general_options['org_name'];?></span>
            <span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51);"><br/> 
            </span>
            <span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51); background: white;">地址：<?php echo $general_options['org_address'];?></span>
            <span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51);"><br/> </span>
            <span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51); background: white;">电话：<?php echo $general_options['org_contact'];?> </span><span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51);"><br/> </span><span style="font-family: 微软雅黑, sans-serif; color: rgb(51, 51, 51); background: white;">邮箱：</span><span style="font-family: 微软雅黑, sans-serif; background: white;"><?php echo $general_options['org_email'];?></span></span></p><p><span style="font-family: 微软雅黑, &#39;Microsoft YaHei&#39;; font-size: 14px; color: rgb(0, 0, 0);"></span><br/></p><p><br/></p>
        </div>
</div>
<script>
    Pagination('view_text_7_1266_txt',"首页","尾页","上一页","下一页");
</script>
</div>
</div>
<div  id="view_map_8_1266" class="yibuSmartViewMargin absPos"   >
<div class='yibuFrameContent overflow_hidden map_Style1_Item0' style='height:348px;width:777px;'>
<div id="view_map_8_1266_allmap" style="height: 348px; width: 777px;"></div>
<script type="text/javascript">
    var view_map_8_1266_ShowMapType="False";
    var view_map_8_1266_ShowNavigation="True";
    var view_map_8_1266_ShowMarker="True";
    var view_map_8_1266_toolBar;
    var view_map_8_1266_mapObj ;//= new AMap.Map("view_map_8_1266_allmap");
    var view_map_8_1266_marker = [{"AddressItemId":"3","Title":"","AddressName":"呼和浩特市玉泉区恒盛电子商务创业园区","ProvinceName":"呼和浩特市玉泉区恒盛电子商务创业园区","CityName":"呼和浩特市玉泉区恒盛电子商务创业园区","Content":"呼和浩特市玉泉区恒盛电子商务创业园区1701","DisplayOrder":1}];
    function view_map_8_1266_init(){
        view_map_8_1266_mapObj = new AMap.Map("view_map_8_1266_allmap",{resizeEnable: false,zoom:parseInt("13")});

        if(view_map_8_1266_ShowNavigation=="True"){
            view_map_8_1266_mapObj.plugin(["AMap.ToolBar"], function () {
                view_map_8_1266_toolBar = new AMap.ToolBar();
                view_map_8_1266_mapObj.addControl(view_map_8_1266_toolBar);
                view_map_8_1266_toolBar.show();
            });
        }
        if(view_map_8_1266_ShowMapType=="True"){
            view_map_8_1266_mapObj.plugin(["AMap.MapType"],function(){
                //地图类型切换
                var mapType= new AMap.MapType({
                    defaultType:0,//默认显示卫星图
                    showRoad:true
                });
                view_map_8_1266_mapObj.addControl(mapType);
            });
        }

        if(view_map_8_1266_marker!=null)
        {
            if(view_map_8_1266_marker.length>0){
                for (var i = 0; i < view_map_8_1266_marker.length; i++) {
                    view_map_8_1266_search(view_map_8_1266_marker[i].AddressName, view_map_8_1266_marker[i].CityName,
                        view_map_8_1266_marker[i].AddressItemId);
                }
            }
        }
    }

    function view_map_8_1266_search(addressname, cityname,addressItemId) {
        var MSearch;
        //加载地理编码插件
        view_map_8_1266_mapObj.plugin(["AMap.PlaceSearch"], function () {
            MSearch = new AMap.PlaceSearch({ //构造地点查询类
                pageSize:10,
                pageIndex:1,
                city:cityname //城市
            });
            //关键字查询
            MSearch.search(addressname, function(status, result){
                if (status === 'complete' && result.info === 'OK') {
                    view_map_8_1266_keywordSearch_CallBack(result,addressItemId);
                } else {
                    view_map_8_1266_geocoder(addressname, cityname,addressItemId);
                }
                view_map_8_1266_mapObj.setZoom(parseInt("13"));
            });
        });
    }

    function view_map_8_1266_geocoder(addressname, cityname,addressItemId ) {
        var MGeocoder;
        //加载地理编码插件
        view_map_8_1266_mapObj.plugin(["AMap.Geocoder"], function () {
            MGeocoder = new AMap.Geocoder({
                city: cityname, //城市，默认：“全国”
                radius: 3000
            });
            //返回地理编码结果
            //AMap.event.addListener(MGeocoder, "complete", geocoder_CallBack);
            //地理编码
            MGeocoder.getLocation(addressname, function(status, result){
                if(status === 'complete' && result.info === 'OK'){
                    view_map_8_1266_geocoder_CallBack(result,addressItemId);
                }
            });
        });
    }
    function view_map_8_1266_addmarker(i, d,itemId) {
        var lngX = d.location.getLng();
        var latY = d.location.getLat();
        var markerOption = {
            map: view_map_8_1266_mapObj,
            position: new AMap.LngLat(lngX, latY)
        };
        var mar = new AMap.Marker(markerOption);
        //marker.push(new AMap.LngLat(lngX, latY));
        //构建信息窗体中显示的内容
        var info = [];
        for (var i = 0; i < view_map_8_1266_marker.length; i++) {
            if(view_map_8_1266_marker[i].AddressItemId==itemId){
                info.push("<div style=\"padding:0px 0px 0px 4px;\"><b style=\"font-size:14px;\">" + view_map_8_1266_marker[i].Title + "</b>");
                info.push("" + view_map_8_1266_marker[i].Content + "</div></div>");
                continue;
            }
        }
        var infoWindow = new AMap.InfoWindow({
            content: info.join("<br/>")  //使用默认信息窗体框样式，显示信息内容
        });
        var fa=function(e){
            if(view_map_8_1266_ShowMarker=="True"){
                infoWindow.open(view_map_8_1266_mapObj, mar.getPosition());
            }
            view_map_8_1266_mapObj.setCenter(mar.getPosition());
        };
        AMap.event.addListener(mar, "click", fa) ;
    }

    //地理编码返回结果展示
    function view_map_8_1266_geocoder_CallBack(data,addressItemId) {
        var resultStr = "";
        //地理编码结果数组
        var geocode = new Array();
        geocode = data.geocodes;
        if (geocode.length > 0) {
            view_map_8_1266_addmarker(0, geocode[0],addressItemId);
        }
        view_map_8_1266_mapObj.setFitView();
    }
    function view_map_8_1266_keywordSearch_CallBack(data,addressItemId) {
        var poiArr = data.poiList.pois;
        var resultCount = poiArr.length;
        if (resultCount > 0) {
            for (var i = 0; i < resultCount; i++) {
                view_map_8_1266_addmarker(i, poiArr[i],addressItemId);
                break; // 只取第一条查询到的记录显示
            }
            view_map_8_1266_mapObj.setFitView();
        }
    }
    function view_map_8_1266_loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.setAttribute("id","ampId_gaode");
        script.src = "http://webapi.amap.com/maps?v=1.3&key=ff5fc22da04b9f6cccd6784d347dd7d7";
        if (script.readyState) { //IE
            script.onreadystatechange = function () {
                if (script.readyState == "loaded" ||script.readyState == "complete") {
                    script.onreadystatechange = null;
                    setTimeout(function(){
                        view_map_8_1266_init();
                    },2000);
                }
            };
        } else { //Others
            script.onload = function () {
                setTimeout(function(){
                    view_map_8_1266_init();
                },2000);
            };
        }
        var mapScript=document.getElementById("ampId_gaode");
        if(mapScript==null){
            document.body.appendChild(script);
        }else{
            setTimeout(function(){
                view_map_8_1266_init();
            },2000);
        }
    }
    $(function() {
        view_map_8_1266_loadScript();
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