<?php
//1. 先注册一个幻灯片文章类型
add_action('init', 'ashu_post_type');
function ashu_post_type() {
    register_post_type( 'slider_type',
        array(
            'labels' => array(
                'name' => '幻灯片',
                'singular_name' => '幻灯片',
                'add_new' => '添加',
                'add_new_item' => '添加新幻灯片',
                'edit_item' => '编辑新幻灯片',
                'new_item' => '新幻灯片'
            ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'menu_position' => 8,
        'supports' => array( 'title')
        )
    );
}
//2. 修改幻灯片文章列表
add_filter( 'manage_edit-slider_type_columns', 'slider_type_custom_columns' );
function slider_type_custom_columns( $columns ) {
    $columns = array(
        'title' => '幻灯片名',
        'linked' => '链接到',
        'thumbnail' => '幻灯片预览',
        'sort' => '排序',
        'date' => '日期',
    );
    return $columns;
}
add_action( 'manage_slider_type_posts_custom_column', 'slider_type_manage_custom_columns', 10, 2 );
function slider_type_manage_custom_columns( $column, $post_id ) {
    global $post;
    switch( $column ) {
        case "linked":
            if(get_post_meta($post->ID, "ashuwp_slider_link", true)){
                echo get_post_meta($post->ID, "ashuwp_slider_link", true);
            } else {echo '----';}
                break;
        case "thumbnail":
                $thumb_url = get_post_meta($post->ID, "ashuwp_slider_pic", true);
                //$ds_image = vt_resize( '',$ds_thumb , 95, 41, true );
                echo '<img src="'.$thumb_url.'" width="50" height="50" alt="" />';
                break;
        case "sort":
            if(get_post_meta($post->ID, "ashuwp_slider_sort", true)){
                echo get_post_meta($post->ID, "ashuwp_slider_sort", true);
            } else {echo '----';}
                break;
        default :
            break;
    }
}
//3. Ashuwp_framework框架配置代码，增加自定义字段
/******slider*******/
$slider_boxinfo = array('title' => '幻灯片设置', 'id'=>'sliderbox', 'page'=>array('slider_type'), 'context'=>'normal', 'priority'=>'low', 'callback'=>'');
$slider_metas[] = array(
  'name' => '输入链接地址',
  'desc' => '',
  'id' => 'ashuwp_slider_link',
  'size'=> 40,
  'std'=>'',
  'type' => 'text'
);
$slider_metas[] = array(
  'name' => '上传图片',
  'desc' => '',
  'std'=>'',
  'size'=>60,
  'button_label'=>'Upload',
  'id' => 'ashuwp_slider_pic',
  'type' => 'upload'
);
$slider_metas[] = array(
  'name' => '排序(必须为数字)',
  'desc' => '',
  'std'=>'',
  'size'=>60,
  //'button_label'=>'Upload',
  'id' => 'ashuwp_slider_sort',
  'type' => 'text'
);
$slider_metas[] = array(
  'name' => 'banner描述标题',
  'desc' => '',
  'std'=>'',
  //'size'=>60,
  //'button_label'=>'Upload',
  'id' => 'ashuwp_slider_des_title',
  'type' => 'text'
);
$slider_metas[] = array(
  'name' => 'banner描述内容',
  'desc' => '',
  'std'=>'',
  //'size'=>60,
  //'button_label'=>'Upload',
  'id' => 'ashuwp_slider_des_content',
  'type' => 'text'
);
$slider_metas[] = array(
  'name' => 'banner英文介绍',
  'desc' => '',
  'std'=>'',
  //'size'=>60,
  //'button_label'=>'Upload',
  'id' => 'ashuwp_slider_des_Eng',
  'type' => 'text'
);
$ashuwp_slider = new ashuwp_postmeta_feild($slider_metas, $slider_boxinfo);
?>