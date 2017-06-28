<?php
	require get_template_directory() . '/ashuwp_framework/ashuwp_framework_core.php'; //加载ashuwp_framework框架
	//require get_template_directory() . '/ashuwp_framework/config-example.php'; //加载配置数据，config-example.php为配置范例。
	//wordpress注册菜单
	if(function_exists('register_nav_menus')){
		register_nav_menus(
			array(
				'header-menu' => __( '导航自定义菜单' ),  
				//'footer-menu' => __( '页角自定义菜单' ),  
				'sider-menu' => __('侧边栏菜单')
			)
		);  
	}

	// 引入banner设置文件
	require get_template_directory().'/inc/banner.php';
	// 页面添加摘要功能
	function my_init() {
     add_post_type_support('page', array('excerpt'));
	}
	add_action('init', 'my_init');

	/**
	 * 自定义 WordPress 后台底部的版权和版本信息
	 * https://www.wpdaxue.com/change-admin-footer-text.html
	 */
	add_filter('admin_footer_text', 'left_admin_footer_text'); 
	function left_admin_footer_text($text) {
		// 左边信息
		$text = '<span id="footer-thankyou">友云官网管理平台</span>'; 
		return $text;
	}
	add_filter('update_footer', 'right_admin_footer_text', 11); 
	function right_admin_footer_text($text) {
		// 右边信息
		$text = "友云版权所有";
		return $text;
	}

	/**
	 * 去掉仪表盘“概况”下的WordPress版本信息
	 * https://www.wpdaxue.com/remove-dash-wordpress-version.html
	 */
	add_filter('gettext', 'remove_admin_stuff', 20, 3);
	function remove_admin_stuff( $translated_text, $untranslated_text, $domain ) {
		$custom_field_text = 'You are using <span class="b">WordPress %s</span>.';
		if (!current_user_can( 'update_core') && is_admin() && $untranslated_text === $custom_field_text) {
			return '';
		}
		return $translated_text;
	}

	// 添加基本设置页面
	require get_template_directory().'/inc/basic.php';

	// 添加后台链接功能
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );

	// 面包屑导航
	/**
	 * WordPress 添加面包屑导航 
	 * https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
	 */
	function wpmomo_breadcrumb_html($post_id,$separator){
		$path[] = wpmomo_breadcrumb_output( home_url('/'), '首页');
		if( get_post_type($post_id)=='post' ) {
			$cats_id = array();
			$categories = get_the_category($post_id);
			if($categories){
				foreach($categories as $category) {
					if(!in_array($category->term_id,$cats_id)){
						if ( $category->parent ){
							$path[] = wpmomo_get_category_parents( $category->parent, $separator );
							$cats_id[] = $category->parent;
						}
						$path[] = wpmomo_breadcrumb_output( get_category_link( $category->term_id ), $category->name);
						$cats_id[] = $category->term_id;
					}
				}
			}
		}
		if( is_singular() && !is_single() && !is_page() ){
			$post_type = get_post_type();
			$post_type_obj = get_post_type_object( $post_type );
			$path[] = wpmomo_breadcrumb_output( get_post_type_archive_link( $post_type ), $post_type_obj->labels->singular_name);
		}
			$path[] = wpmomo_breadcrumb_output( get_permalink($post_id), get_the_title($post_id));
			echo join( $separator ,$path);
	}
	function wpmomo_get_category_parents( $id, $separator='', $visited = array() ) {
		$chain = '';
		$parent = get_term( $id, 'category' );
		if ( is_wp_error( $parent ) )
			return $parent;
			$name = $parent->name;
			if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
				$visited[] = $parent->parent;
				$chain .= wpmomo_get_category_parents( $parent->parent, $separator, $visited );
			}
			$chain .= wpmomo_breadcrumb_output( get_category_link( $parent->term_id ), $name);
			return $chain;
		}
	function wpmomo_breadcrumb_output($url,$name){
		return '<span">'.$name.'';
	}

	// 后台添加新模块
	$up_conf = array(
	  'title' => '添加内容',
	  'id'=>'example_box',
	  'page'=>array('page','post'),
	  'context'=>'normal',
	  'priority'=>'low'
	);

	$ashu_meta = array();

	$ashu_meta[] = array(
	  'name' => '价格：',
	  'id'   => 'price_text',
	  'desc' => '请填写商品价格（只填写数字）！',
	  'std'  => '0',
	  'type' => 'text'
	);

	// $ashu_meta[] = array(
	//   'name' => '上传图片：',
	//   'id'   => 'upload_img',
	//   'desc' => '上传图片',
	//   'std'  => '',
	//   'button_text' => 'Upload',
	//   'type' => 'upload'
	// );
	$new_box = new ashuwp_postmeta_feild($ashu_meta, $up_conf);

	$img_conf = array(
	  'title' => '图片上传',
	  'id'=>'upload_images',
	  'page'=>array('page','post'),
	  'context'=>'normal',
	  'priority'=>'low'
	);

	$ashu_option = array();

	// $ashu_meta[] = array(
	//   'name' => '价格：',
	//   'id'   => 'price_text',
	//   'desc' => '请填写商品价格（只填写数字）！',
	//   'std'  => '0',
	//   'type' => 'text'
	// );

	$ashu_option[] = array(
	  'name' => '上传图片：',
	  'id'   => 'upload_img',
	  'desc' => '上传图片',
	  'std'  => '',
	  'button_text' => 'Upload',
	  'type' => 'upload'
	);
	$new_option = new ashuwp_postmeta_feild($ashu_option, $img_conf);

	// $qyzi_conf = array(
	//   'title' => '企业资质',
	//   'id'=>'upload_aptitude',
	//   'page'=>array('page','post'),
	//   'context'=>'normal',
	//   'priority'=>'low'
	// );

	// $qyzi_option = array();

	// // $ashu_meta[] = array(
	// //   'name' => '价格：',
	// //   'id'   => 'price_text',
	// //   'desc' => '请填写商品价格（只填写数字）！',
	// //   'std'  => '0',
	// //   'type' => 'text'
	// // );

	// $qyzi_option[] = array(
	//   'name' => '上传图片：',
	//   'id'   => 'upload_zzimg',
	//   'desc' => '上传图片',
	//   'std'  => '',
	//   'button_text' => 'Upload',
	//   'type' => 'upload'
	// );
	// $qyzi_option[] = array(
	// 	'name' => '描述：',
	// 	'id'   => 'img_desc',
	// 	'desc' => '',
	// 	'std'  => '',
	// 	// 'button_text' => 'Upload',
	// 	'type' => 'text'
	// );
	$webinfo_set = array(
	    'title' => '企业资质',
	    'id'=>'qiye_aptitude',
	    'page'=>array('page','post'),
	    'context'=>'normal',
	    'priority'=>'low',
	    // 'tab'=>true
	  );

	$qyzi_option[] = array(
	  'name' => '企业资质',
	  'id'   => 'upload_aptitude',
	  'desc' => '企业资质上传，描述.',
	  'std'  => '',
	  'subtype' => array(
	    array(
	      'name' => '上传图片：',
	      'id'   => 'upload_zzimg',
	      'desc' => '上传图片',
	      'std'  => '',
	      'button_text' => 'Upload',
	      'type' => 'upload'
	    ),
	    array(
	      'name' => '描述：',
	      'id'   => 'img_desc',
	      'desc' => '',
	      'std'  => '',
	      'type' => 'text'
	    ),
	  ),
	  'multiple' => true,
	   'type' => 'group'
	);
	$new_Credentials = new ashuwp_postmeta_feild($qyzi_option,$webinfo_set);


	// 搜索关联性
	if(is_search()){
		add_filter('posts_orderby_request', 'search_orderby_filter');
	}
	function search_orderby_filter($orderby = ''){
	    global $wpdb;
	    $keyword = $wpdb->prepare($_REQUEST['s']);
	    return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC,{$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
	}

	// 搜所分类
	// cat
	// function return_only_selected_category() {
	//     if ( isset($_REQUEST['s']) && isset($_REQUEST['cat']) ){ //若为搜索页面，且有cat值传入
	//         global $wp_query;
	//         $desired_cat = $_REQUEST['cat']; //要搜索的分类
	//         $excluded = get_categories("hide_empty=false&exclude={$desired_cat}"); //要排除的分类
	//         $wp_query->query_vars['cat'] = "-{$excluded}"; //除了要搜索的，其它都排除
	//         //还可添加其它条件，比如要搜索的文章类型$wp_query->query_vars['post_type'] ="product";
	//     }
	// }
	// add_filter('pre_get_posts', 'return_only_selected_category');

	// 设置分页显示文章条数
	function custom_posts_per_page($query){
		if(is_home()){
		    $query->set('posts_per_page',4);//首页每页显示4篇文章
		}
	    if(is_search()){
	        $query->set('posts_per_page',-1);//搜索页显示所有匹配的文章，不分页
	    }
	    if(is_category()){
	    	if(is_category('cgal')){
	    		$query->set('posts_per_page',4);//category每页显示4篇文章
	    	}elseif(is_category('ygfc')){
	    		$query->set('posts_per_page',5);//category每页显示5篇文章
	    	}else{
	    		$query->set('posts_per_page',8);//category每页显示8篇文章
	    	} 
		}//endif
	}//function
	 
	//this adds the function above to the 'pre_get_posts' action    
	add_action('pre_get_posts','custom_posts_per_page');


	// 自定义后台登录页面的logo
	function my_custom_login_logo() {
		echo '<style type="text/css">
				.login h1 a { 
				background-image:url('.get_bloginfo('template_directory').'/assets/images/admin_logo.png) !important; 
				width:191px;
				height:60px;
				background-size:100% auto;
				}

				</style>';
	}
	add_action('login_head', 'my_custom_login_logo');
	// 自定义后台登录页面的logo链接  自定义logo提示信息
	add_filter('login_headerurl', create_function(false,"return get_bloginfo('url');"));
	add_filter('login_headertitle', create_function(false,"return get_bloginfo('name');"));


?>